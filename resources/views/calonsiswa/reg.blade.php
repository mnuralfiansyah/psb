 @extends('layouts.app')

@section('content')
@if (session('Warning'))
    <div class="alert alert-danger">
        {{ session('Warning') }}
    </div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registerasi Calon Siswa</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('calonsiswa.reg.submit') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nisn') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">NISN</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="nisn" value="{{ old('nisn') }}" required autofocus> 
                            </div>
                        </div>
						
						<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nama</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required autofocus> 
                            </div>
                        </div>
						
						<div class="form-group{{ $errors->has('tahun') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Tahun</label>
                            <div class="col-md-6">
                                <select name="tahun">
									<option value="">--Pilih Tahun</option>
									@php for($a=1;$a<=9;$a++)
									{
									@endphp
									<option value="201{{$a}}">201{{$a}}</option>
									@php
									}
									@endphp
								</select>
                            </div>
                        </div>
						
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Daftar 
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
