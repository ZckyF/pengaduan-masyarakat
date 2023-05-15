@extends('admin.layouts.main')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" style="color: var(--bs-emphasis-color)"">Histori</h1>
  </div>


  <div class="table-responsive col-lg-10">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
            <th scope="col">Nama</th>
            <th scope="col">Aduan</th>
            <th scope="col">Tanggal Aduan</th>
            <th scope="col">Restore</th>
        </tr>
      </thead>
      <tbody id="complaintsRemovedLive">
      </tbody>
      <script src="{{ mix('js/app.js') }}"></script>
    </table>
  </div>



@endsection