<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiswaLoginController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest:siswa');
	}
	
    public function ShowLoginForm()
	{
		return view('auth.siswalogin');
	}
	
	public function login(Request $request)
	{
		//validate form data
		
		$this->validate($request, [
		'nisn' => 'required',
		'password' => 'required|min:6'		
		]);
		
		//attemp to user log in
		if(Auth::guard('siswa')->attempt(['nisn' => $request->nisn, 'password' => $request->password], $request->remember))
		{
			//if success
			return redirect()->intended(route('siswa.dashboard'));
		}

		//if unseccess
		return redirect()->back()->withInput($request->only('nisn','remember'));
	}
	
	public function logout()
	{
		return view('welcome');
		//dd(Auth::guard('siswa')->logout());
		//return 'berhasil';
	}
}
