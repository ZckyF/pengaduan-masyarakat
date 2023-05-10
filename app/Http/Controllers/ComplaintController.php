<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index',[
            'title' => 'Adura'
        ]);
    }

    public function create () {
        return view('user.laporan',[
            'title' => 'Form Adura'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
        // validasi form


        if(!$request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email|max:255',
            'nik' => 'required|numeric',
            'judul' => 'required|max:255',
            'aduan' => 'required|max:1000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'nama.required' => 'Kolom nama harus diisi.',
            'email.required' => 'Kolom email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'nik.required' => 'Kolom NIK harus diisi.',
            'nik.numeric' => 'NIK harus berupa angka.',
            'judul.required' => 'Kolom judul harus diisi.',
            'aduan.required' => 'Kolom aduan harus diisi.',
            'image.required' => 'Pilih gambar untuk diunggah.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar yang diizinkan adalah: jpeg, png, jpg, svg.',
            'image.max' => 'Ukuran gambar maksimal 2MB.',
        ])) {
            return redirect('/laporan')->with('error', 'Terjadi kesalahan saat menyimpan laporan aduan. Silakan coba lagi nanti.');
        }
        

        // simpan gambar ke folder public
        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images'), $imageName);
        $imageUrl = asset('images/' . $imageName);        

        // simpan pengaduan ke database
        Complaint::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'nik' => $request->nik,
            'judul' => $request->judul,
            'aduan' => $request->aduan,
            'image' => $imageUrl,
        ]);
        

        return redirect('/laporan')->with('success', 'Laporan aduan telah berhasil dikirim.');
     
}



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
