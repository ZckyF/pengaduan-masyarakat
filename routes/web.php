<?php

use App\Http\Controllers\AdminController;
use App\Models\User;
use App\Models\Response;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TambahAdminController;

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
Route::get('/laporan', [ComplaintController::class, 'create'])->name('complaints.create');
Route::post('/laporan', [ComplaintController::class,'store'])->name('complaints.store');


Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'authenticate'])->middleware('guest');
Route::get('/logout', [LoginController::class,'destroy'])->middleware('auth');



Route::get('/admin',[AdminController::class,'index'])->middleware('auth');
Route::get('/admin/detail/{id}', [AdminController::class,'detailShow'])->middleware('auth');
Route::get('/admin/{id}/delete', [AdminController::class,'destroy']);
Route::post('/admin/detail/{id}', [AdminController::class,'response'])->middleware('auth');
Route::get('/admin/complaint-response', [AdminController::class,'responseShow'])->middleware('auth');



Route::get('/admin/histori', function () {
    return view('admin.histori.index', [
        "complaints" => Complaint::all(),
        "title"      => "Halaman Histori Adura "
    ]);
})->middleware('auth');

Route::post('/admin/histori', function(Request $request) {
    Complaint::find($request->input('id'))->update([
        'removed' => false
    ]);

    return redirect('admin');
});

Route::resource('/admin/tambah', TambahAdminController::class)->middleware('auth');