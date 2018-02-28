<?php

namespace App\Http\Controllers;

use Log;
use Auth;
use App\User;
use DataTables;
use App\InsuranceRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
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
    
    public function manageUsers(){
    	return view('admin.users');
    }

    public function getUsers(){
        $all_users = User::select();
        return DataTables::of($all_users)->addColumn('action', function ($user){
            return '<a href="/users/'.$user->id.'/edit" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> Details</a>';
        })->make(true);
    }

    public function allInsuranceRequests(){
    	return view('admin.requests');
    }

    public function allInsRequestsData(){
        $all_requests = InsuranceRequest::select();
        return DataTables::of($all_requests)->addColumn('action', function ($request){
            return '<a href="/insurance-request/'.$request->id.'" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> Details</a>';
        })->make(true);
    }

    public function statistics(){
        return view('admin.stats');
    }

    public function showUser($id){
        $user = User::find($id);
        return view('admin.show_user',compact('user'));
    }
}
