<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(Request $request)
    {
    	if ($request->isMethod('post'))
    	{
    		$data = $request->input();
    		if (Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'admin'=>'1']))
    		{
    			// $user_data = User::where(['email'=>Auth::user()->email])->first();
    			return view('/admin/dashboard');
    		}
    		else
    		{
    			return redirect('/admin')->with('flash_message_error','Invalid Username or Password');
    		}
    	}
    	return view('admin.admin_login');
    }

    public function dashboard()
    {
    	return view('admin.dashboard');
    }

    public function settings()
    {
    	// $user_data = User::where(['email'=>Auth::user()->email])->first();
    	return view('admin.settings');
    }

    public function checkPassword(Request $request)
    {
    	$data = $request->all();
    	$current_password = $data['current_pwd'];
    	$check_password = User::where(['admin'=>'1'])->first();
    	if (Hash::check($current_password,$check_password->password))
    	{
    		die('true');
    	}
    	else
    	{
    		die('false');
    	}
    }

    public function updatePassword(Request $request)
    {
    	if ($request->isMethod('post'))
    	{
    		$data = $request->all();
    		$check_password = User::where(['email'=>Auth::user()->email])->first();
    		$current_password = $data['current_pwd'];
    		if (Hash::check($current_password,$check_password->password))
    		{
    			$password = bcrypt($data['new_pwd']);
    			User::where('id',$check_password->id)->update(['password'=>$password]);
    			return redirect('/admin/settings')->with('flash_message_success','Password Updated Successfully');
    		}
    		else
    		{
    			return redirect('/admin/settings')->with('flash_message_error','Incorrect Current Password');
    		}
    	}
    }

    public function logout()
    {
    	Session::flush();
    	return redirect('/admin')->with('flash_message_success','Logout Successfully');
    }
}
