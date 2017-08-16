<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalonSiswaLogoutController extends Controller
{
    public function logout()
	{
		if(Auth::guard('calonsiswa')->logout());
		{		
			return redirect()->intended(route('calonsiswa.login'));
		}
	}
}
