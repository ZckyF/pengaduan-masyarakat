@extends('layouts.main')
@section('container')

@if(!session('success')) {

<div class="container col-5 mt-5 pt-3 pb-5">
  <div class="row justify-content-center bg-light py-4 px-5 border-0">
    <div class="col-md-9">
      <div class="card-header py-4 px-5 bg-light border-0 text-center">
        <h4 class="mb-0">Form Aduan Masyarakat</h4>
      </div>
      <form action="{{ route('complaints.store') }}" method="post" class="pb-5" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <div class="form-outline mb-4">
          <input type="text" id="nama" class="form-control @error('nama') is-invalid @enderror" name="nama"
            value="{{ old('nama') }}" />
          <label class="form-label" for="nama">Nama Lengkap</label>
          @error('nama')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-outline mb-4">
          <input type="email" id="form4Example2" class="form-control @error('email') is-invalid @enderror"
            name="email" value="{{ old('email') }}" />
          <label class="form-label" for="form4Example2">Email address</label>
          @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-outline mb-4">
          <input type="number" id="NIK" class="form-control @error('nik') is-invalid @enderror" min="0" name="nik"
            value="{{ old('nik') }}" />
          <label class="form-label" for="NIK">NIK</label>
          @error('nik')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-outline mb-4">
          <textarea class="form-control @error('aduan') is-invalid @enderror" id="aduan" rows="4" name="aduan">{{ old('aduan') }}</textarea>
          <label class="form-label" for="aduan">Aduan</label>
          @error('aduan')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        
        <div class="form-outline mb-4">
          <input type="file" class="form-control" id="customFile" name="image" />
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Kirim Laporan</button>
        @if(session('error'))
        <div class="alert alert-danger mt-3">
          {{ session('error') }}
        @endif
        </div>
      </form>
    </div>
  </div>
</div>
@endif
    @if(session('success'))
        <div class="alert alert-success mt-3">
          {{ session('success') }}
        </div>
        @endif
        
 
@endsection

