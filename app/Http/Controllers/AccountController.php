<?php

namespace App\Http\Controllers;

use Log;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;

class AccountController extends Controller
{
	public function myProfile(){
		$user = Auth::user();
		return view('account.profile', compact('user'));
	}

	public function updateProfile(UpdateProfileRequest $request){
		$user = Auth::user();
		if(isset($request->name)){
			$user->name = $request->name;
		}
		if(isset($request->phone)){
			$user->phone = $request->phone;
		}
		if(isset($request->address)){
			$user->address = $request->address;
		}
		try {
			if($user->save()){
				flash('Updated Profile')->success();
				return redirect()->back();
			}
		} catch (Exception $e) {
			Log::info($e);
			flash("Error while saving, please contact your system administrator")->error();
		}
	}

	public function changePassword(){
		return view('account.changepassword');
	}

	public function updatePassword(ChangePasswordRequest $request){
		Log::info($request);
		if (Auth::attempt(['email' => Auth::user()->email, 'password' => $request->old])) {
					$user = Auth::user();
			$user->password = bcrypt($request->new);
			try {
				if($user->save()){
					flash('Successfully changed the password')->success();
					return redirect()->back();
				}
			} catch (Exception $e) {
				Log::info($e);
				flash("Error while saving, please contact your system administrator")->error();
				return redirect()->back();
			}

			}
			else{
				flash("Incorrect old password")->error();
				return redirect()->back();
			}
	}
}
