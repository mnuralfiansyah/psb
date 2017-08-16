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

class RegSiswaController extends Controller
{
     /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


	
	 public function register(Request $request)
    {
		$this->validasi($request);
		
		if($this->CheckSiswa($request->nisn))
		{
			return redirect(route('siswa.login'))->with('Warning','Anda Sudah Daftar Ulang');
		}
		
		if($this->CheckCalonSiswa($request->nisn))
		{
			return redirect(route('siswa.reg'))->with('Warning','Anda Tidak Lulus Atau Anda Tidak Mendaftar');
		}
		
		if($this->login_calon($request))
		{
			return redirect(route('siswa.reg'))->with('Warning','Password Salah');
		}

				
		if(!$this->PindahKeSiswa($this->data_CalonSiswa($request)))
		{
			return 'masih ada yang salah';			
		}
		
		if(Auth::guard('siswa')->attempt(['nisn' => $request->nisn, 'password' => $request->password], $request->remember))
		{
			return redirect()->intended(route('siswa.dashboard'));
		}
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
	 

	 
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
    protected function create(array $data)
    {
        return Siswa::create([
            'nama' => $data['nama'],
            'nisn' => $data['nisn'],
			'tahun' => $data['tahun'],
            'password' => bcrypt($data['password']),
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
		if(CalonSiswa::select('*')->where('nisn', $nisn)->where('status',1)->first())
		{
			return false;
		}
		
		return true;
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
			return false;
		}
		
		return true;
	}
	
	protected function data_CalonSiswa($request)
	{
		$siswa = CalonSiswa::select('*')->where('nisn', $request->nisn)->first();
		return $siswa;
	}
	
	
	protected function PindahKeSiswa($data)
    {
		return Siswa::create([
            'nama' => $data->nama,
            'nisn' => $data->nisn,
			'tahun' => $data->tahun,
            'password' => $data->password,
        ]);
		
    }
}
