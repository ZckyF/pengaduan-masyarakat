@extends('layouts.loginRegister')
@section('container')

<div class="login-form">
    <form action="" method="post">
		<div class="avatar">
			<img src="img/avatar.png" alt="Avatar">
		</div>
        <h2 class="text-center">Form Pendaftaran</h2>
         <div class="form-group">
        	<input type="hidden" name="kode" value="">
        </div>
        {{-- <div class="form-group">
        	<input type="text" class="form-control" name="nama_user" placeholder="nama lengkap" required="required">
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="email" required="required">
        </div> --}}

        <div class="form-group">
        	<input type="text" class="form-control" name="user" placeholder="username" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="pass1" placeholder="password" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="pass2" placeholder="ulangi password" required="required">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary btn-lg btn-block" value="DAFTAR" name="tombol">
        </div>
    </form>

    <p class="text-center small">Sudah punya akun ? <a href="/login" class="text-primary">Login</a></p>
@endsection