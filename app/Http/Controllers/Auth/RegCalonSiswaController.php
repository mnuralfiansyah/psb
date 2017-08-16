<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Models\Siswa;
use App\Models\CalonSiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegCalonSiswaController extends Controller
{
    use RegistersUsers;
	
	protected $redirectTo = '/home';
	
	public function __construct()
    {
        $this->middleware('guest');
    }
	
	public function register(Request $request)
    {
		$this->validasi($request);
		
		if($this->CheckCalonSiswa($request->nisn))
		{
			return redirect(route('calonsiswa.login'))->with('Warning','Anda Sudah Daftar');
		}
		
		if(!$this->InputCalonSiswa($request))
		{
			return redirect(route('calonsiswa.reg'))->with('Warning','Kesalahan Input');
		}
		
		if($this->login_calon($request))
		{
			return redirect()->intended(route('calonsiswa.dashboard'));
		}
		
		return redirect(route('calonsiswa.reg'))->with('Warning','Kesalahan Sistem');
	}	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => 'required',
            'nisn' => 'required',
			'tahun' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function InputCalonSiswa($data)
    {
		return CalonSiswa::create([
            'nama' => $data->nama,
            'nisn' => $data->nisn,
			'tahun' => $data->tahun,
            'password' => bcrypt($data->password),
        ]);
		
    }
	
	protected function validasi($request)
	{
		$this->validate($request, [
		'nisn' => 'required',
		'password' => 'required|min:6'		
		]);
	}
	
	
	protected function CheckCalonSiswa($nisn)
	{
		if(CalonSiswa::select('*')->where('nisn', $nisn)->first())
		{
			return true;
		}
		
		return false;
	}
	
	protected function CheckSiswa($nisn)
	{
		if(Siswa::select('*')->where('nisn', $nisn)->first())
		{
			return true;
		}
	}
	
	
	protected function login_calon($request)
	{
		if(Auth::guard('calonsiswa')->attempt(['nisn' => $request->nisn, 'password' => $request->password], $request->remember))
		{
			return true;
		}
		
		return false;
	}
	
	
	
	
	
}
