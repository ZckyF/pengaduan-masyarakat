@extends('layouts.loginRegister')
@section('container')
<div class="container mt-5">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-6 col-md-8 col-sm-10">
        <div class="card">
          <div class="card-header">
            <h3 class="text-center">Login</h3>
          </div>
          <div class="card-body">
            <form>
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Enter username">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password">
              </div>
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="rememberMe">
                <label class="form-check-label" for="rememberMe">Remember me</label>
              </div>
              <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
          </div>
          <div class="card-footer">
            <p class="text-center">Tidak Memilik Akun ? <a href="/register">Register</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection


 
