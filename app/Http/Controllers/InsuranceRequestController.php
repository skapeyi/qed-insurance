<?php

namespace App\Http\Controllers;

use Log;
use Mail;
use Auth;
use DataTables;
use App\User;
use App\InsuranceRequest;
use App\InsuranceRequestUpdate;
use App\Http\Requests\GetInsuranceRequest;
use App\Mail\InsuranceRequestStatusChanged;
use Illuminate\Http\Request;


class InsuranceRequestController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myRequests = InsuranceRequest::where(['user_id' => Auth::user()->id])->get();
        return view('insurance-requests.index');
    }

    public function getMyRequests(){
        return DataTables::of(InsuranceRequest::where(['user_id' => Auth::user()->id]))->addColumn('action', function ($request){
            return '<a href="/insurance-request/'.$request->id.'" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> Details</a>';
        })->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('insurance-requests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GetInsuranceRequest $request)
    {     
        $ins = new InsuranceRequest();
        $ins->ref_no = $this->randomString();
        $ins->name = $request->name;
        $ins->address = $request->address;
        $ins->insurance_period_start = $request->insurance_period_start;
        $ins->insurance_period_end = $request->insurance_period_end;
        $ins->reg_number = $request->reg_number;
        $ins->reg_owner = $request->reg_owner;
        $ins->make = $request->make;
        $ins->color = $request->color;
        $ins->cubic_capacity = $request->cubic_capacity;
        $ins->tonnage = $request->tonnage;
        $ins->year_of_manufacture  = $request->year_of_manufacture;
        $ins->engine_no = $request->engine_no;
        $ins->chasis_no = $request->chasis_no;
        $ins->seating_capacity = $request->seating_capacity;
        $ins->use = $request->use;
        $ins->statutory = $request->statutory;
        $ins->third_party_property_damage = $request->third_party_property_damage;
        $ins->third_party_property_damage_limit = $request->third_party_property_damage;
        $ins->user_id = Auth::user()->id;
        $ins->acknowledgement = 1;
        $ins->status = "Pending";

        // Process the files......
        if($request->hasFile('log_book')){
          $log_book = $request->file('log_book');
          $ins->log_book_url = "uploads/".$ins->ref_no.'_'.$log_book->getClientOriginalName();
          $log_book->move('uploads',$ins->ref_no.'_'.$log_book->getClientOriginalName());
        }
        if($request->hasFile('your_id')){
          $your_id = $request->file('your_id');
          $ins->id_doc_url = "uploads/".$ins->ref_no.'_'.$your_id->getClientOriginalName();
          $your_id->move('uploads',$ins->ref_no.'_'.$your_id->getClientOriginalName());
        }

        try{
            if($ins->save()){
                flash("Your request has been saved, we will contact you with further details")->success();
                //Send email before redirecting....
                return redirect('/insurance-request');
            }
        }catch(Exception $e){
            Log::info($e);
            flash("Error while saving, please concact system admin!")->error();
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
        $ins = InsuranceRequest::find($id);
        $ins_updates = InsuranceRequestUpdate::where(['insurance_request_id' =>  $id])->orderBy('created_at','DESC')->get();
        return view('insurance-requests.show', compact('ins','ins_updates'));
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

    public function myRequests(Request $request){

    }

    public function requestUpdate(Request $request){
      if(Auth::user()->hasRole('Staff')){
        $ins = InsuranceRequest::find($request->_ins_req);
        $ins->status = $request->status;
        $ins->save();
        $update = new InsuranceRequestUpdate();
        $update->insurance_request_id = $request->_ins_req;
        $update->created_by = Auth::user()->id;
        $update->update = 'The status of your request has changed!';
        //send mail
        $mailer = new InsuranceRequestStatusChanged();
        $customer = User::find($ins->user_id);
        $mailer->name = $customer->name;
        $mailer->ref_no = $ins->ref_no;
        Mail::to($customer->email)->send($mailer);
        $update->save();

        flash('Update saved!')->success();
      }
      if(isset($request->update)){
        $update = new InsuranceRequestUpdate();
        $update->insurance_request_id = $request->_ins_req;
        $update->created_by = Auth::user()->id;
        $update->update = $request->update;
        $update->save();
        flash('Update saved');
      }
      return redirect()->back();
    }

    public function randomString($length = 9) {
	     $str = "";
	     $characters = array_merge(range('A','Z'),range('0','9'));
	     $max = count($characters) - 1;
	     for ($i = 0; $i < $length; $i++) {
		       $rand = mt_rand(0, $max);
		       $str .= $characters[$rand];
	      }
	      return $str;
    }
}
