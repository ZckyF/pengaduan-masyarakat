<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    

    public function register () 
    {
        return view('/register',[
            'title' => 'Register'
        ]);
    }
    public function login () 
    {
        return view('/login',[
            'title' => 'Login'
        ]);
    }
    public function profil () 
    {
        return view('/profil',[
            'title' => 'Profil'
        ]);
    }
    public function laporan () 
    {
        return view('/laporan',[
            'title' => 'Laporan'
        ]);
    }
}
