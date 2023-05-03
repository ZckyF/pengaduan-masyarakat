@extends('admin.layouts.main')
@section('container')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8 mx-auto mt-5">
            <h2 class="mb-3 ">{{ $complaint->judul }}</h2>
           

                @if ($complaint->image)

                <div style="max-height: 350px; overflow:hidden;">   
                <img src="{{ $complaint->image }}" alt="{{ $complaint->image }}" class="img-fluid">  
                </div>
                
                @else
                <img src="https://source.unsplash.com/1000x400?" alt="" class="img-fluid">

                @endif
                
                <div class="row g-2 mt-4 mb-3">
                    <div class="col-md">
                        <div class="form-floating ">
                            <input type="text" class="form-control" id="nama" value="{{ $complaint->nama }}" disabled>
                            <label for="nama">Nama</label>
                          </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating ">
                            <input type="email" class="form-control" id="email" value="{{ $complaint->email }}" disabled>
                            <label for="email">Email</label>
                          </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating ">
                            <input type="number" class="form-control" id="nik" value="{{ $complaint->nik }}" disabled>
                            <label for="nik">NIK</label>
                          </div>
                    </div>
                </div>
                    
                
                <div class="form-floating mb-5">
                    <textarea class="form-control" id="aduan" style="height: 200px" disabled>{{ $complaint->aduan }}</textarea>
                    <label for="aduan">Aduan</label>
                  </div>
                <form action="/admin/detail/{{ $complaint->id }}" method="post" class="mb-4">
                        @csrf
                  <div class="form-floating mb-4">
                    
                        <textarea required class="form-control" id="response" name="response" style="height: 200px">{{ empty($complaint->response) ? '' : $complaint->response->tanggapan }}</textarea>
                        <label for="response">Response</label>
                    
                  </div>
                  @if (!empty($complaint->response))
                    @if ($complaint->response->status == 'ditanggapi')
                        <button type="submit" name="tolakButton" value="ditolak" class="btn btn-danger" role="button" onclick="return confirm('Yakin ingin menolak ?')">Tolak</button>
                    @else
                        <button type="submit" name="tanggapiButton" value="ditanggapi" class="btn btn-primary" role="button"  onclick="return confirm('Yakin ingin menanggapi ?')">Tanggapi</button>
                    @endif
                  @else
                    <button type="submit" name="tanggapiButton" value="ditanggapi" class="btn btn-primary" role="button"  onclick="return confirm('Yakin ingin menanggapi ?')">Tanggapi</button>
                    <button type="submit" name="tolakButton" value="ditolak" class="btn btn-danger" role="button" onclick="return confirm('Yakin ingin menolak ?')">Tolak</button>
                  @endif
                </form>
                
          
        
            <a href="/admin">Kembali</a>
        </div>
    </div>
</div>


@endsection