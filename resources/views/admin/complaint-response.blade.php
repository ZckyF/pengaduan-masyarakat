<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="color: black">
    {{-- TITLE --}}
    <div style="text-align: center">
        <h2>Dinas Teknologi dan Komunikasi</h2>
        <h2>Nebula M78 Bersama PT. ADUAS</h2>
        <br />
        <p class="inline-block py-2">Jl. Bumi Bima Sakti, Andromeda No. 31</p>
        <hr />
    </div>

    {{-- ABOUT --}}
    <div>
        <br />
        <p><span>Oleh</span> : {{ $nama }}</p>
        <p><span>Perihal</span> : {{ $perihal }}</p>
        <br />
        <p><span>Status</span> : {{ $status }}</p>
        <p><span>Tanggal</span> : {{ $tanggal }}</p>
        <br />
    </div>
    {{-- RESPONSE --}}
    <div>
        <p>Dengan hormat, tanggapan anda {{ $status }}</p>
            <p></span>{{ $balasan }}</p>
    </div>
</body>
</html>