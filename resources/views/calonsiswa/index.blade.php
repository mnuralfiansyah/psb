<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{Session::get('title')}} </title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>

<body>
	 <div class="container">
		<div class="row">
			<div class="col-md-offset-1 col-md-2">
				Nama 
			</div>
			<div class="col-md-2">
			{{ $calonsiswa->nama}}
			</div>
		</div>
		
		<div class="row">
			<div class="col-xs-offset-1 col-xs-2">
				NISN	 
			</div>
			<div class="col-xs-2">
			{{ $calonsiswa->nisn}}
			</div>
		</div>
		
		<div class="row">
			<div class="col-xs-offset-1 col-xs-2">
				Tahun 
			</div>
			<div class="col-xs-2">
			{{ $calonsiswa->tahun}}
			</div>
		</div>
		
	 </div>
 
	<a href="{{ route('calonsiswa.logout')}}">Logout</a>
</body>	