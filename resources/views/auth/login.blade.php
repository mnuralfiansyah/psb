@extends('layouts.app')
<nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{Session::get('navbar')}}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
							 <li><a href="{{ route('calonsiswa.login')}}">Login Calon Siswa</a></li>
                            <li><a href="{{ route('siswa.login') }}">Login Siswa</a></li>
                            <li><a href="#{{--- route('guru.login') ---}}">Login Guru</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
@section('content')
<div class="container">
<br><br><br>
    <div class="row">
        <div class="col-xs-offset-2 col-xs-2">
				<div class="panel panel-default">
					<div class="panel-heading">Registerasi Calon Siswa</div>
					<div class="panel-body">
						<a href="{{ route('calonsiswa.reg')}}">Klik Disini</a>
					</div>
				</div>
		</div>
		
		<div class="col-xs-offset-1 col-xs-2">
				<div class="panel panel-default">
					<div class="panel-heading">Login Calon Siswa</div>
					<div class="panel-body">
						<a href="{{ route('calonsiswa.login')}}">Klik Disini</a>
					</div>
				</div>
		</div>
		
		<div class="col-xs-offset-1 col-xs-2">
				<div class="panel panel-default">
					<div class="panel-heading">Register</div>
					<div class="panel-body">
						<a href="{{ route('calonsiswa.login')}}">Klik Disini</a>
					</div>
				</div>
		</div>
    </div>
<br><br>	
	<div class="row">
        <div class="col-xs-offset-2 col-xs-2">
				<div class="panel panel-default">
					<div class="panel-heading">Registerasi Ulang Siswa</div>
					<div class="panel-body">
						<a href="{{ route('siswa.reg')}}">Klik Disini</a>
					</div>
				</div>
		</div>
		
		<div class="col-xs-offset-1 col-xs-2">
				<div class="panel panel-default">
					<div class="panel-heading">Login Siswa</div>
					<div class="panel-body">
						<a href="{{ route('siswa.login')}}">Klik Disini</a>
					</div>
				</div>
		</div>
		
		<div class="col-xs-offset-1 col-xs-2">
				<div class="panel panel-default">
					<div class="panel-heading">Register</div>
					<div class="panel-body">
						<a href="{{ route('calonsiswa.login')}}">Klik Disini</a>
					</div>
				</div>
		</div>
    </div>
</div>
@endsection
