@extends('admin.layouts.main')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" style="color: var(--bs-emphasis-color)"">Histori</h1>
  </div>


  <div class="table-responsive col-lg-10">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama</th>
            <th scope="col">Aduan</th>
            <th scope="col">Tanggal Aduan</th>
            <th scope="col">Restore</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($complaints as $complaint)
            @if ($complaint->removed)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $complaint->nama }}</td>
              <td>{{ $complaint->judul }}</td>
              <td>{{ $complaint->created_at }}</td>
              <td>
                <form action="/admin/histori" method="post" class="d-inline">
                  @csrf
                  <input type="hidden" name="id" value="{{ $complaint->id }}">
                  <button class="badge bg-warning border-0" onclick="return confirm('Yakin ingin Restore ?')"><span data-feather="refresh-ccw" ></span></button>
                </form>
              </td>
            </tr>
            @endif
        @endforeach
      </tbody>
    </table>
  </div>



@endsection