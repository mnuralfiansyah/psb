<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegSiswaController extends Controller
{
    public function index()
	{
		return view('auth/regsiswa');
	}
}
