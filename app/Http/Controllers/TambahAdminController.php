<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\Paginator;

class TambahAdminController extends Controller
{
    protected $title = 'Tambah Admin';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('admin.crud-admin.index',[
        //     'users' => User::orderBy('created_at','desc')->paginate(10)->withQueryString(),
        //     'title' => $this->title
        // ]);

        $users = User::query()
            ->filter(['search' => request('search')])
            ->orderBy('created_at','desc')
            ->paginate(10)
            ->withQueryString();

        

        return view('admin.crud-admin.index', [        
            "users" => $users,        
            "title" => $this->title 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.crud-admin.create',[
            "title" => $this->title
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|unique:users,username',
            'password' => 'required',
            'level' => 'required'
        ],[
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal terdiri dari :min karakter.',
            'level.required' => 'Level wajib dipilih.',
            'level.in' => 'Level yang dipilih tidak valid.'
        ]);

        if (!$validatedData) {
            return redirect('/admin/tambah')->with('error', 'Terjadi kesalahan saat menyimpan data admin.')->withInput();
        }
    
        // simpan data ke dalam tabel users
        User::create([
            'username' => $validatedData['username'],
            'password' => Hash::make($validatedData['password']),
            'level' => $validatedData['level']
        ]);
    
        return redirect('/admin/tambah')->with('success', 'Admin berhasil ditambahkan!');
    }

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
        $admin = User::find($id);
        return view('admin.crud-admin.update',[
            'admin' => $admin,
            'title' => $this->title
        ]);
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
        
    $admin = User::find($id);

    // melakukan validasi input
    $validatedData = $request->validate([
        'username' => 'required|unique:users,username,'.$id,
        'password' => 'required',
        // 'password' => 'required|min:8',
        'level' => 'required|in:admin,super_admin'
    ],[
        'username.required' => 'Username wajib diisi.',
        'username.unique' => 'Username sudah digunakan.',
        'password.required' => 'Password wajib diisi.',
        // 'password.min' => 'Password minimal terdiri dari :min karakter.',
        'level.required' => 'Level wajib dipilih.',
        'level.in' => 'Level yang dipilih tidak valid.'
    ]);

    if (!$validatedData) {
        return redirect('/admin/tambah')->with('error', 'Terjadi kesalahan saat update data admin.')->withInput();
    }

    // memasukkan data baru ke dalam objek admin
    $admin->username = $validatedData['username'];
    if (!empty($validatedData['password'])) {
        $admin->password = Hash::make($validatedData['password']);
    }
    $admin->level = $validatedData['level'];

    
    $admin->update();

   
    return redirect('/admin/tambah')->with('success', 'Admin berhasil diupdate.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect('/admin/tambah')->with('success','
        Data admin berhasil dihapus');
    }
}
