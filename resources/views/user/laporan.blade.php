{{-- @extends('user.layouts.main')
@section('container')


  @if(session('success')) 
<div class="fixed">
  <div class="success-message">
    <i class="fa fa-check-circle"></i>
    <p>Laporan aduan telah berhasil dikirim.</p>
    <a href="/" class="link">Kembali</a>
  </div>
</div>
@endif
<div class="container col-5 mt-5 pt-3 pb-5">
  <div class="row justify-content-center bg-light py-4 px-5 border-0">
    <div class="col-md-9">
      <div class="card-header py-4 px-5 bg-light border-0 text-center">
        <h4 class="mb-0">Form Aduan Masyarakat</h4>
      </div>
      <form action="{{ route('complaints.store') }}" id="myForm" method="POST" class="pb-5" autocomplete="off" enctype="multipart/form-data">
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
          <input type="number" id="NIK" class="form-control @error('nik') is-invalid @enderror" name="nik"
            value="{{ old('nik') }}" />
          <label class="form-label" for="NIK">NIK</label>
          @error('nik')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-outline mb-4">
          <input type="text" id="judul" class="form-control @error('judul') is-invalid @enderror" name="judul"
            value="{{ old('judul') }}" />
          <label class="form-label" for="judul">Judul Aduan</label>
          @error('judul')
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

        <button type="submit" class="btn btn-primary" onclick="return confirm('Anda yakin datanya sudah benar ?')"data data-bs-target="#exampleModal" name="submit" data-bs-backdrop="false">Kirim Laporan</button>
        @if(session('error'))
        <div class="alert alert-danger mt-3">
          {{ session('error') }}
        @endif

        </div>
      </form>
    </div>
  </div>
</div>
</div>



        
    
@endsection
 --}}

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="cssnya/user/laporan.css">
    
    
    <title>Adura | Laporan</title>
</head>
<body>

  {{-- @if(session('success'))
  <div class="fixed">
    <div class="success-message">
      <i class="check-circle-fill"></i>
      <p>Laporan aduan telah berhasil dikirim.</p>
      <a href="/" class="link">Kembali</a>
    </div>
  </div>
  @endif --}}
 
  @if(session('success')) 
  <div class="pop-bg">    
    <div class="pop2">
        <div class="top">
            <img src="/img/user/success.png" alt="">
            <h1>Berhasil !</h1>
        </div>
        <div class="bottom">
            <p>Laporan Anda <br> Telah Berhasil Dikirim</p>
        </div>
        <a href="/">Kembali</a>
    </div>
</div>
@endif 
 
    <div class="containerr">

        <div class="content">
            <a href="/" class="kembali">Kembali</a>

        <div class="bg">


            <form action="/laporan"  method="POST" autocomplete="off" enctype="multipart/form-data">
              @csrf
                <div class="word">
                    <h2>Form Aduan <span>Masyarakat</span></h2>
                    <p>Adura Siap Melayani Anda 24/7. Suara Rakyat Juga Penting !!!</p>
                </div>
                @if ($errors->any())
                    <div class="error-invalid">Pastikan semua kolom terisi</div>
                @endif


                {{-- @error('nama')
                <div class="error-invalid">{{ $message }}</div>
                @enderror --}}
                    <div class="nama">
                      <input type="text" id="nama"  placeholder="Nama Lengkap" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" />                 
                    </div>
                       {{-- @error('nik')
                        <div class="error-invalid">{{ $message }}</div>
                        @enderror --}}
                    <div class="nik">
                       
                        <input type="number" id="nik" placeholder="NIK" name="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}">
                       
                    </div>
                    {{-- @error('email')
                        <div class="error-invalid">{{ $message }}</div>
                        @enderror --}}
                    <div class="email">
                        
                        <input type="email" id="email" placeholder="Email" name="email" class="form-control @error('nik') is-invalid @enderror" value="{{ old('email') }}">
                        
                    </div>
                    {{-- @error('judul')
                        <div class="error-invalid">{{ $message }}</div>
                      @enderror --}}
                    <div class="judul">
                      
                        <input type="text" id="judul" placeholder="Judul" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}">
                        
                    </div>
                    {{-- @error('aduan')
                    <div class="error-invalid">{{ $message }}</div>
                    @enderror --}}
                    <div class="aduan">
                      
                        <textarea name="aduan" id="aduan" cols="30" rows="2" placeholder="Masukkan Aduan Anda" style="resize: none;" name="aduan" class="form-control @error('aduan') is-invalid @enderror" >{{ old('aduan') }}</textarea>
                        
                    </div>
                    
                    <div class="gambar">
                       
                        <input type="file" id="gambar" name="image" class="form-control @error('image') is-invalid @enderror" >
                        @error('image')
                          <div class="error-invalid">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="button">
                        <button type="submit" name="submit" onclick="return confirm('Anda yakin datanya sudah benar ?')">Kirim Laporan</button>
                    </div>
                </form>
                
                
                <div class="typo">
                    <!-- <div class="brand"><h1>ADURA</h1></div> -->
                </div>

            </div>

            <div class="footer">
                <p>Created by <span>AD<span>URA</span></span> | All Reserved!</p>
            </div>


        </div>
    
    </div>
</body>
</html>
