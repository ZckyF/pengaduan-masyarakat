<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    
    public function index () 
    {
        return view('admin.login');   
    }

    public function authenticate (Request $request) 
    {
         // $user = User::where('username', $request->input('username'))->where('password', $request->input('pswd'))->first();
    $user = User::where('username', $request->input('username'))->first();
    // if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('pswd')]))
    // {
    // if (!empty($user))
    if (!empty($user)  && Hash::check($request->input('pswd'), $user->password))
    {
         
        Auth::login($user);
        $request->session()->regenerate();
        return redirect()->intended('/admin');
    }
    return back()->with('errorLogin', 'nani?!');
    }

    public function destroy (Request $request) 
    {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('login');
    }
}
