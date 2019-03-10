<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Mail\EmailVerification;
use Carbon\Carbon;
use Validator;
use Session;
use Hash;
use Mail;
session_start();
class RegisterController extends Controller
{
    public function index()
    {
    	return view('register');
    }

    public function submit(Request $request)
    {
    	// echo "<h5> Request Only Method </h5>";
    	// print_r($request->only('name','email','password'));
    	// echo "<h5> Request Except Method (Return without name)</h5>";
    	// print_r($request->except('name'));

    	//print_r(request()->input());

    	// $this->validate($request,[
    	// 	'name' => 'required|min:5', 
    	// 	'email' => 'required',
    	// 	'password' => 'required|min:6',
    	// 	//'email' => 'required',
    	// ],[
    	// 	'name.required' =>'The name field is empty!!!',
    	// 	'name.min' =>'The name minimum 5 character !!!',
    	// 	'email.required' =>'The email field is empty!!!',
    	// 	'password.min' =>'The password min 6 digit!!!',
    	// ]);

    	$check = Validator::make($request->all(),[
            'name' => 'required|min:5', 
			'user_name' => 'required|min:4', 
    		'email' => 'required',
    		'password' => 'required|min:6',
    		'image' => 'required|image|max:2040',
    	],[
    		'name.required' =>'The name field is empty !!!',
    		'name.min' =>'The name minimum 5 character !!!',
    		'email.required' =>'The email field is empty !!!',
    		'password.min' =>'The password min 6 digit !!!',
    		'image.required' =>'Upload your Photo !!!',
    		'image.image' =>'file type must be image !!!',
    	]);

    	if ($check->fails()) {
    		return redirect()->back()->withErrors($check)->withInput();
    	}

    	$image = $request->file('image');
    	$path = str_random(5).'.'.$image->getClientOriginalExtension();
    	if ($image->isValid()) {
    		$img_success = $image->storeAs('user_img',$path);
    	}
        $user_id = User::max('user_id') + 1;
        if ($user_id == 1) {
            $user_id = 101;
        }
    	if ($img_success) {
    		$data = array();
            $data['user_id'] = $user_id;
            $data['name'] = $request->name;
            $data['user_name'] = $request->user_name;
            $data['email'] = $request->email;
            $data['password'] = Hash::make($request->password);
            $data['image'] = 'Images/user_img/'.$path;
            $data['email_verification_token'] = str_random(30);

            $result = User::insert($data);
            if ($result) {
                Mail::to($request->email)->send(new EmailVerification($data));
                return redirect()->back();
            }
    		
    	}
    }



    public function verified($token)
    {
        $check = User::where('email_verification_token', $token)->first();
        if (isset($check)) {
            $data = array();
            $data['email_verification_token'] = '';
            $data['email_verified'] = 1;
            $data['email_verified_at'] = Carbon::now();
            User::where('email_verification_token', $token)->update($data);
            return redirect(route('login'));
        }else{
            echo "Fail";
        }
    }


}
