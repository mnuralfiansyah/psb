<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegCalonSiswaController extends Controller
{
    public function index()
	{
		return view('calonsiswa.reg');	
	}
}
