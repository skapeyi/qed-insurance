<?php

namespace App\Http\Controllers;

use DB;
use Log;
use Auth;
use Mail;

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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function paymentSuccessful(){
      Log::info($request);
      $yo_request = new YoAPI(env('YO_API_USERNAME'), env('YO_API_PASSWORD'), env('YO_API_URL'));
      $yo_request->public_key_file = base_path("/app/Library/YoPayments/Yo_Uganda_Public_Certificate.crt");
      $api_response = $yo_request->receive_payment_notification();
      if($api_response['is_verified']){
        $payment = Payment::where(['internal_reference' => '$api_response['external_ref']'])->first();
        $payment->status = "SUCCEEDED";
        $payment->save();
        //Send user email notification
      }else{
        return response()->json("FAILED", 401);
      }
    }

    public function paymentFailed(){
      Log::info($request);
      $yo_request = new YoAPI(env('YO_API_USERNAME'), env('YO_API_PASSWORD'), env('YO_API_URL'));
      $yo_request->public_key_file = base_path("/app/Library/YoPayments/Yo_Uganda_Public_Certificate.crt");
      $api_response = $yo_request->receive_payment_failure_notification();
      if($api_response['is_verified']){
        $payment = Payment::where('internal_reference',$api_response['failed_transaction_reference'])->first();
        $payment->status = 'FAILED';
        $payment->save();
        return response()->json("OK", 200);
      }else{
        return response()->json("FAILED", 401);
      }
    }
}
