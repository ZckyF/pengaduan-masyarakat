<?php

use App\Http\Controllers\PengaduanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index',[
        'title'=> 'Home'
    ]);
});

Route::get('/register',[PengaduanController::class,'register']);
Route::get('/login',[PengaduanController::class,'login']);
Route::get('/profil',[PengaduanController::class,'profil']);
Route::get('/laporan',[PengaduanController::class,'laporan']);
// Route::get('/register',[PengaduanController::class,'register']);
// Route::get('/register',[PengaduanController::class,'register']);
