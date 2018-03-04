<?php

namespace App\Http\Controllers;

use DB;
use Log;
use Auth;
use Mail;
use DataTables;
use App\Payment;
use App\InsuranceRequest;
use App\Library\YoPayments\YoAPI;
use App\Http\Requests\PaymentRequest;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole('Staff')){
          return view('payments.index');
        }
        else{
          flash("Ooops, contact your system admin to get permissions to view that section")->warning();
          return redirect()->back();
        }
    }

    public function getPayments(){
      return DataTables::of(Payment::all())->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $ins = InsuranceRequest::find($id);
        if($ins->amount > 0){
            $payments = Payment::where(['insurance_request_id' => $id])->paginate(5);
            return view('payments.create',compact('payments','ins'));
        }else{
            flash('Please wait until your application is reviewed and amount for you to pay is set for you to proceed')->warning();
            return redirect()->back();
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentRequest $request)
    {
        $payment = new Payment();
        $payment->amount = $request->amount;
        $payment->phone_number = $request->tel;
        $payment->created_by = Auth::user()->id;
        $payment->narrative = "Payment for insurance request ".$request->ref;
        $payment->insurance_request_id = $request->req_id;
        $payment->internal_ref = $request->ref.'_'.date("YmdHis").rand(1,100);
        $payment->status = "Pending";
        try{
            if($payment->save()){
                //set up to variable to send to yo!
                $yo_payment = new YoAPI(env('YO_API_USERNAME'), env('YO_API_PASSWORD'), env('YO_API_URL'));
                $yo_payment->set_instant_notification_url(env('YO_INSTANT_NOTIFICATION_URL'));
                $yo_payment->set_failure_notification_url(env('YO_FAILURE_NOTICATION_URL'));
                $yo_payment->set_external_reference($payment->internal_ref);
                $yo_payment->set_nonblocking("TRUE");

                //hit the yo api and get back an external ref and save it
                $response = $yo_payment->ac_deposit_funds($payment->phone_number, $payment->amount, $payment->narrative);
                if(isset($response['TransactionReference'])){
                    $payment->external_ref = $response['TransactionReference'];
                    $payment->save();
                }else{
                    flash("Error while processing at the payment provider, please try again later!");
                }
                flash("Check your handset to complete the payment.");
                return redirect()->back();
            }
        }catch(Exception $e){
            Log::info($e);
            flash('Error while processing, please try again later!');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function paymentSuccessfull(Request $request){
      Log::info($request);
      $yo_request = new YoAPI(env('YO_API_USERNAME'), env('YO_API_PASSWORD'), env('YO_API_URL'));
      $yo_request->public_key_file = base_path("/app/Library/YoPayments/Yo_Uganda_Public_Certificate.crt");
      $api_response = $yo_request->receive_payment_notification();
      if($api_response['is_verified']){
        $payment = Payment::where(['internal_ref' => '$api_response["external_ref"]'])->first();
        $payment->status = "SUCCEEDED";
        $payment->save();
        //Send user email notification
        return response()->json('OK',200);
      }else{
        return response()->json("FAILED", 401);
      }
    }

    public function paymentFailed(Request $request){
      Log::info($request);
      $yo_request = new YoAPI(env('YO_API_USERNAME'), env('YO_API_PASSWORD'), env('YO_API_URL'));
      $yo_request->public_key_file = base_path("/app/Library/YoPayments/Yo_Uganda_Public_Certificate.crt");
      $api_response = $yo_request->receive_payment_failure_notification();
      if($api_response['is_verified']){
        $payment = Payment::where('internal_ref',$api_response['failed_transaction_reference'])->first();
        $payment->status = 'FAILED';
        $payment->save();
        return response()->json("OK", 200);
      }else{
        return response()->json("FAILED", 401);
      }
    }
}
