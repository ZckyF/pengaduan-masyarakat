@extends('admin.layouts.main')
@section('container')

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Hello, {{ Auth::user()->username }}</h1>
        </div>


        @if (session('status') == 'ditolak')
        <div class="alert alert-danger alert-dismissible fade show col-md-9" role="alert">
          Pesan aduan : <strong>{{ session('status') }}</strong> 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @else
        <div class="alert alert-success alert-dismissible fade show col-md-9" role="alert">
          Pesan aduan : <strong>{{ session('status') }}</strong> 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
     
      @if (count($complaints) > 0)
      
      
        <div class="table-responsive col-lg-9">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">Judul Aduan</th>
                <th scope="col">Tanggal Aduan</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($complaints as $complaint)
                @if (!$complaint->removed)
                @if (!is_null($complaint->response))
                @if ($complaint->response->status == "ditolak")
                  <tr class="table-danger">
                @elseif ($complaint->response->status == "ditanggapi")
                  <tr class="table-success">
                @else
                  <tr>
                @endif
              @else
                <tr>
              @endif
                <td>{{ $complaint->judul }}</td>
                <td>{{ $complaint->created_at }}</td>
                <td>
                  @if (!isset($complaint->response))
                    pending
                  @else
                    {{ $complaint->response->status }}
                  @endif
                </td>
                <td>
                  <a href="/admin/detail/{{ $complaint->id }}" class="badge bg-info" ><span data-feather="eye"></span></a>
                  <a href="/admin/{{ $complaint->id }}/delete" class="badge bg-danger" onclick="return confirm('Yakin ingin menghapus aduan ini')"><span data-feather="x-circle"></span></a>
                </td>
              </tr>
              @endif
            @endforeach
            
            
            </tbody>
          </table>
        </div>

        @else
        <h3 class="text-center fs-4">Tidak ada Aduan </h3>
      @endif
      <div class="d-flex justify-content-start mt-3">
        {{ $complaints->links() }}

      </div>
  
@endsection