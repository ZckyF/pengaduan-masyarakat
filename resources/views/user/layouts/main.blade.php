<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Pengaduan Masyarakat | {{ $title }}</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <!-- Google Fonts Roboto -->
<link rel="stylesheet"href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"/>
    <!-- MDB -->
<link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}" />
<link rel="stylesheet" href="{{ asset('cssnya/laporan1.css') }}">

</head>
<body>

    {{-- @include('partials.navbar') --}}

    @yield('container')

    

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  <!-- MDB -->
  <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
  <!-- Custom scripts -->
{{-- <script>
    // Dapatkan elemen modal dan tombol buka modal
const modal = document.getElementById("myModal");
const tombol = document.getElementById("tombol");


// Dapatkan elemen tombol "Ya","Tidak" dan "myForm"
const ya = document.getElementById("ya");
const tidak = document.getElementById("tidak");
const myForm = document.querySelector('form.pb-5');
const close = document.querySelector('.close');



// Ketika tombol dibuka, tampilkan modal
tombol.addEventListener('click', (e) => {
    e.preventDefault()
  modal.style.display = "block";

// Ketika pengguna menekan tombol "Tidak", tutup modal
tidak.addEventListener('click',() => {
    modal.style.display = "none";
})
// Ketika pengguna menekan tombol X di atas, tutup modal
close.addEventListener('click',() => {
    modal.style.display = "none";
})
  
// Ketika pengguna menekan tombol "Ya", lakukan tindakan yang diinginkan dan tutup modal
ya.addEventListener('click',() => {
    function submitForm() {
    myForm.submit();
  }
    modal.style.display = "none";
    submitForm();
})
  
  // Tambahkan kode JavaScript di sini untuk mengeksekusi tindakan yang diinginkan

})

</script> --}}


</body>
</html>