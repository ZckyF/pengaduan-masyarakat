@extends('admin.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" style="color: var(--bs-emphasis-color)">Data Admin</h1>
  </div>

  @if (session('success'))
  <div class="alert alert-success alert-dismissible fade show col-md-9" role="alert">
        {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  
  @if (session('error'))
  <div class="alert alert-danger alert-dismissible fade show col-md-9" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif




  @if (count($users) > 0)
  <div class="table-responsive col-lg-9">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Username</th>
          <th scope="col">Level</th>
          <th scope="col">Tanggal Dibuat</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>

        <a href="/admin/tambah/create" class="btn btn-primary m-4 py-2 px-4">Tambah Data Admin</a>
        {{-- <form method="GET" action="/admin/list" class="mb-3">
          <div class="row g-2 mt-4 mb-3 align-self-end align-items-end d-flex">
            <div class="col-md-2  mx-3">
            <div class="form-group ">
                <select class="form-control mx-3" id="level" name="level">
                    <option value="">Semua</option>
                    <option value="admin" {{ request('level') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="super_admin" {{ request('level') == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                </select>
              </div>
            </div>
            <div class="col-md">
              <button type="submit" class="btn btn-primary">Tampilkan</button>
            </div>
          
        </div>
      </form> --}}
        @foreach ($users as $user)

          <td>{{ $loop->iteration }}</td>
          <td>{{ $user->username }}</td>
          <td>{{ $user->level }}</td>
          <td>{{ $user->created_at }}</td>
          <td>
            <a href="/admin/tambah/{{ $user->id }}/edit" class="badge bg-info" ><span data-feather="eye"></span></a>

            <form action="/admin/tambah/{{ $user->id }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Yakin ingin menghapus admin ini')"><span data-feather="x-circle"></span></button>

            </form>
          </td>
        </tr>
            
        @endforeach
      
      </tbody>
    </table>
  </div>

  @else
  <h3 class="text-center fs-4">Tidak ada</h3>
@endif


  <div class="d-flex justify-content-start mt-3">
    {{ $users->links() }}
  </div>
@endsection