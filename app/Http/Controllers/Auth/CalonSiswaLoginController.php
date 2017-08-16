<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalonSiswaLoginController extends Controller
{
    	public function __construct()
	{
		$this->middleware('guest:siswa');
	}
	
    public function ShowLoginForm()
	{
		return view('calonsiswa.login');
	}
	
	public function login(Request $request)
	{
		//validate form data
		$this->validasi($request);
				
		//attemp to user log in
		if($this->login_CalonSiswa($request))
		{
			//if success
			return redirect()->intended(route('siswa.dashboard'));
		}

		//if unseccess
		return redirect()->back()->withInput($request->only('nisn','remember'));
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	protected function login_CalonSiswa($request)
	{
		if(Auth::guard('calonsiswa')->attempt(['nisn' => $request->nisn, 'password' => $request->password], $request->remember))
		{
			return true;
		}
		return false;
	}
	
	
	
	protected function validasi($request)
	{
		$this->validate($request, [
		'nisn' => 'required',
		'password' => 'required|min:6'		
		]);
	}	
}
