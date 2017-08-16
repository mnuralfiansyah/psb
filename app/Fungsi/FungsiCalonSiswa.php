<?php
 namespace App\Fungsi;
 
use Auth;
use App\Models\CalonSiswa;
 
 Class FungsiCalonSiswa
 {
	 public static function data_CalonSiswa()
		{
			$calon = Auth::id();
			$calonsiswa = CalonSiswa::select('*')->where('id',$calon)->first();
			
			return $calonsiswa;
		}
 }		