<?php

use App\Http\Controllers\ComplaintController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ComplaintController::class, 'index']);
Route::get('/laporan', [ComplaintController::class, 'laporan']);
Route::get('/profil', [ComplaintController::class, 'profil']);
Route::get('/login', [ComplaintController::class, 'login']);
Route::get('/register', [ComplaintController::class, 'register']);

