@extends('admin.layouts.main')
@section('container')

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2" style="color: var(--bs-emphasis-color)">Hello, {{ Auth::user()->username }}</h1>
        </div>


        @if (session('status') == 'ditolak')
        <div class="alert alert-danger alert-dismissible fade show col-md-9" role="alert">
          Pesan aduan : <strong>{{ session('status') }}</strong> 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (session('status') == 'ditanggapi')
        <div class="alert alert-success alert-dismissible fade show col-md-9" role="alert">
          Pesan aduan : <strong>{{ session('status') }}</strong> 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session('hapus'))
        <div class="alert alert-success alert-dismissible fade show col-md-9" role="alert">
          <strong>{{ session('hapus') }}</strong> 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (session('restore'))
        <div class="alert alert-success alert-dismissible fade show col-md-9" role="alert">
          <strong>{{ session('restore') }}</strong> 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
     
      @if (count($complaints) > 0)
      
      
        <div class="table-responsive col-lg-10">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">Nama</th>
                <th scope="col">Judul Aduan</th>
                <th scope="col">Tanggal Aduan</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody id="complaintsLive">
            </tbody>
          </table>
          <script src="{{ mix('js/app.js') }}"></script>
        </div>

        @else
        <h3 class="text-center fs-4">Tidak ada Aduan </h3>
      @endif
      <div class="d-flex justify-content-start mt-3">
        {{ $complaints->links() }}

      </div>
  
@endsection