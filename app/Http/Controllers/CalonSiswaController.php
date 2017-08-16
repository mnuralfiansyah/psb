<?php

namespace App\Http\Controllers;

use App\Fungsi\FungsiCalonSiswa;

class CalonSiswaController extends Controller
{
	
	public function __construct()
    {
        $this->middleware('auth:calonsiswa');
    }
	
    public function index()
	{
		return $this->tampil()->with('calonsiswa',$this->fungsi()->data_CalonSiswa());
	}
	
	protected function tampil()
	{
		return view('calonsiswa.index');
	}

	protected function fungsi()
	{
		return $this->fungsi = new FungsiCalonSiswa();		
	}
}