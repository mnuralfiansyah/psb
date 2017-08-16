<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('loginsiswa', 'LoginController@index');
//Route::post('loginsiswa/login', 'LoginController@login');
//Route::get('regsiswa', 'LoginController@reg');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('siswa')->group( function() {
	Route::get('/', 'SiswaController@index')->name('siswa.dashboard');
	Route::get('/register', 'RegSiswaController@index')->name('siswa.reg');
	Route::post('/register', 'Auth\RegSiswaController@register')->name('siswa.reg.submit');	
	Route::get('/login', 'Auth\SiswaLoginController@ShowLoginForm')->name('siswa.login');
	Route::post('/login', 'Auth\SiswaLoginController@login')->name('siswa.login.submit');		
	Route::get('/logout', 'Auth\SiswaLogoutController@logout')->name('siswa.logout');
});

Route::prefix('calonsiswa')->group( function() {
	Route::get('/', 'CalonSiswaController@index')->name('calonsiswa.dashboard');
	Route::get('/register', 'RegCalonSiswaController@index')->name('calonsiswa.reg');
	Route::post('/register', 'Auth\RegCalonSiswaController@register')->name('calonsiswa.reg.submit');	
	Route::get('/login', 'Auth\CalonSiswaLoginController@ShowLoginForm')->name('calonsiswa.login');
	Route::post('/login', 'Auth\CalonSiswaLoginController@login')->name('calonsiswa.login.submit');	
	Route::get('/logout', 'Auth\CalonSiswaLogoutController@logout')->name('calonsiswa.logout');

});

Route::get('tes', 'Auth\RegSiswaController@CheckCalonSiswa');


