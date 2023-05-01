@extends('admin.layouts.main')
@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Update Admin</h1>
    </div>    

    <div class="col-lg-7">
        <form action="/admin/tambah/{{ $admin->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') ?? $admin->username }}" autofocus>
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="level" class="form-label">Level</label>
                <select class="form-select" name="level" id="level">
                    <option value="admin" @if ($admin->level == 'admin') selected @endif>Admin</option>
                    <option value="super_admin" @if ($admin->level == 'super_admin') selected @endif>Super Admin</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin ingin melakukan update ?')">Update</button>
        </form>
    </div>

@endsection

