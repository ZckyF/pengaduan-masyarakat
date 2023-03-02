@extends('layouts.loginRegister')
@section('container')
     <div class="login-form">
<form action="" method="post">
    <div class="avatar">
        <img src="{{ asset('img/avatar.png') }}" alt="Avatar">
    </div>
    <h2 class="text-center">Form login</h2>
    <div class="form-group">
        <input type="text" class="form-control" name="user" placeholder="Username" required="required">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="pass" placeholder="Password" required="required">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary btn-lg btn-block" value="login" name="tombol">
    </div>
    <div class="bottom-action clearfix">
        <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
        <a href="#" class="float-right">Forgot Password?</a>
    </div>
</form>

<p class="text-center small">Belum punya akun ? <a href="/register" class="text-primary">Registrasi</a></p>
@endsection


 
