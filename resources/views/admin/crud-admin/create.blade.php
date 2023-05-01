@extends('admin.layouts.main')
@section('container')


    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Admin</h1>
  </div>    
<div class="col-lg-7">
    <form action="/admin/tambah" method="post" enctype="multipart/form-data">
        @csrf
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" autofocus value="{{ old('username') }}">
      @error('username')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" autofocus value="{{ old('password') }}">
      @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>
    <div class="mb-3">
        <label for="level" class="form-label">Level</label>
        <select class="form-select" name="level" id="level">
            <option value="admin">Admin</option>
            <option value="super_admin">Super Admin</option>
        </select>
    </div>
    </div>
    <button type="submit" class="btn btn-primary mb-5" onclick="return confirm('Yakin ingin ditambahkan ?')">Tambah</button>
  </form>
</div>

@endsection