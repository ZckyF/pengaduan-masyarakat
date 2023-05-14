<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
    <style>
        @media print {
          div {
            width: 21cm;
            height: 29.7cm;
          }
        }

        body {
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
  <div
      id="content"
      class="w-[157.5mm] h-[215mm] overflow-hidden p-0 flex items-center justify-center flex-col"
      {{-- style={{
          maxWidth: "157.5mm",
          maxHeight: "222.75mm",
          overflow: "hidden",
          background: "lightblue",
          padding: 0,
      }} --}}
  >
      <div class="w-[150mm] h-[200mm] text-slate-900">
        {{-- TITLE --}}
        <div class="text-center">
            <span class="text-xl font-bold">
                <p>Dinas Teknologi dan Komunikasi</p>
                <p>Bikini Bottom Bersama PT. ADUAS</p>
            </span>
            <p class="inline-block py-2">Jl. Bumi Bima Sakti, Andromeda No. 31</p>
        </div>
        
        {{-- BORDER --}}
        <div class="bg-slate-900 h-1"></div>

        {{-- CONTENT --}}
        <div class="pt-6 text-sm px-2">
            {{-- ABOUT --}}
            <div class="flex flex-wrap pb-16 font-bold">
                {{-- LEFT --}}
                <div class="w-[50%]">
                    <div class="flex items-center py-1">
                        <p><span class="font-medium">Oleh</span> <span class="inline-block px-1.5">:</span> {{ $nama }}</p>
                    </div>
                    <div class="flex items-center py-1">
                        <p><span class="pt-1 font-medium">Perihal</span> <span class="inline-block px-1.5">:</span> {{ $perihal }}</p>
                    </div>
                </div>
                {{-- RIGHT --}}
                <div class="w-[50%]">
                    <div class="flex items-center py-1">
                        <p><span class="font-medium">Status</span> <span class="inline-block px-1.5">:</span> {{ $status }}</p>
                    </div>
                    <div class="flex items-center py-1">
                        <p><span class="pt-1 font-medium">Tanggal</span> <span class="inline-block px-1.5">:</span> {{ $tanggal }}</p>
                    </div>
                </div>
            </div>
            {{-- RESPONSE --}}
            <div class="font-medium">
                <div class="flex items-center pl-8 font-bold">
                    <p>Dengan hormat, tanggapan anda</p>
                    <span class=" rounded-lg mx-2">{{ $status }}</span>
                    @if ($status == 'ditolak')
                        <p>, dikarenakan</p>
                    @endif
                </div>
                <div class="pt-3">
                    <p class="text-justify"><span class="inline-block w-8"></span>{{ $balasan }} wedfvndvbe fsdfvdbkwe fndcv wedfvndvbe fsdfvdbkwe fndcv wedfvndvbe fsdfvdbkwe fndcv wedfvndvbe fsdfvdbkwe fndcv wedfvndvbe fsdfvdbkwe fndcv wedfvndvbe fsdfvdbkwe fndcv wedfvndvbe fsdfvdbkwe fndcv wedfvndvbe fsdfvdbkwe fndcv wedfvndvbe fsdfvdbkwe fndcv wedfvndvbe fsdfvdbkwe fndcv wedfvndvbe fsdfvdbkwe fndcv wedfvndvbe fsdfvdbkwe fndcv wedfvndvbe fsdfvdbkwe fndcv wedfvndvbe fsdfvdbkwe fndcv wedfvndvbe fsdfvdbkwe fndcv wedfvndvbe fsdfvdbkwe fndcv wedfvndvbe fsdfvdbkwe fndcv wedfvndvbe fsdfvdbkwe fndcv wedfvndvbe fsdfvdbkwe fndcv wedfvndvbe fsdfvdbkwe fndcv wedfvndvbe fsdfvdbkwe fndcv wedfvndvbe fsdfvdbkwe fndcv wedfvndvbe fsdfvdbkwe fndcv</p>
                </div>
            </div>
        </div>

        {{-- TTD --}}
        <div class="pt-12 flex flex-row-reverse text-right pr-2">
            <div class="text-sm font-medium">
                <p>Hormat kami,</p>
                <p class="py-1 font-bold">PT. ADUAS</p>
                <img src="http://127.0.0.1:8000/images/1683963537_Screenshot (18).png" alt="Jaki" class="bg-slate-600 w-40 h-20 mt-1 object-cover object-center" />
                <p class="font-bold">Jaki Pirdaus</p>
                <p class="pt-1">Kepala Administrasi</p>
            </div>
        </div>
      </div>
  </div>
  <div id="action">
    
  </div>
  <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>