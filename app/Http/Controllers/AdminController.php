<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function manageUsers(){
    	return view('admin.users');
    }

    public function allInsuranceRequests(){
    	return view('admin.Requests');
    }
}
