<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiswaLogoutController extends Controller
{
    public function logout()
	{
		Auth::guard('siswa')->logout();
		//Auth::guard('calonsiswa')->logout();
		
		return redirect()->intended(route('siswa.login'));
	}
}
