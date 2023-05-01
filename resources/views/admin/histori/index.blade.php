@extends('admin.layouts.main')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Histori</h1>
  </div>


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
          <td>1</td>
          <td>Hola</td>
          <td>Hola</td>
          <td>Hola</td>
          <td>
            <a href="#" class="badge bg-warning" ><span data-feather="refresh-ccw"></span></a>

            <form action="#" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Yakin ingin menghapus aduan ini')"><span data-feather="x-circle"></span></button>

            </form>
          </td>
        </tr>
      </tbody>
    </table>
  </div>



@endsection