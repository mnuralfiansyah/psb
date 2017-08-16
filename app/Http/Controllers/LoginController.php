<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
	{
		return view('login.login')->with('title', 'PSB Login')
								  ->with('navbar','Sekolah Tinggi Informatika');
	}
	
	public function login(Request $request)
	{
		return $request->nisn;
	}
	
	public function reg()
	{
		return view('login.reg')->with('title', 'PSB Registerasi')
								->with('navbar','Penerimaan Siswa Baru');
	}
}
