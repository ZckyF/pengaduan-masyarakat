@extends('layouts.main')
@section('container')
@csrf
<div class="container col-5 mt-5 pt-3 pb-5">
   
    <div class="row justify-content-center bg-light py-4 px-5 border-0">
        <div class="col-md-9 ">
             <div class="card-header py-4 px-5 bg-light border-0 text-center">
        <h4 class="mb-0 ">Form Aduan Masyarakat</h4>
      </div>
            <form action="#" method="post" class="pb-5" autocomplete="off">
                <div class="form-outline mb-4">
                    <input type="text" id="nama" class="form-control" name="name"/>
                    <label class="form-label" for="nama">Nama Lengkap</label>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="email" id="form4Example2" class="form-control" name="email" />
                    <label class="form-label" for="form4Example2">Email address</label>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="number" id="NIK" class="form-control" min="0" name="nik"/>
                    <label class="form-label" for="NIK">NIK</label>
                  </div>
                  <div class="form-outline mb-4">
                    <textarea class="form-control" id="aduan" rows="4" name="aduan"></textarea>
                    <label class="form-label" for="aduan">Aduan</label>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="file" class="form-control" id="customFile" name="image" />
                  </div>
                <div class="form-check d-flex justify-content-center mb-4">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form4Example4" checked />
                    <label class="form-check-label" for="form4Example4">
                        Kirimi saya salinan pesan ini
                    </label>
                  </div>
                <button type="submit" class="btn btn-primary" name="submit">Kirim Laporan</button>
            </form>
        </div>
    </div>
</div>
 @endsection