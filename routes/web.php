<?php

use App\Events\Message;
use App\Http\Controllers\AdminController;

use App\Models\Complaint;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TambahAdminController;
// use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;

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
    $complaints = Complaint::query()
    ->where('removed', true)
    ->filter(['search' => request('search')])
    ->orderBy('created_at')
    ->paginate(10)
    ->withQueryString();
    return view('admin.histori.index', [
        // "complaints" =>  Complaint::all()->where('removed', true),
        "complaints" =>  $complaints,
        "title"      => "Halaman Histori Adura "
    ]);
})->middleware('auth');

Route::get('/admin/histori/restore/{id}', function($id) {
    $complaint = Complaint::find($id);
    
    $complaint->update([
        'removed' => false
    ]);

    // Report
    Message::dispatch("Yameteh");

    return redirect('admin')->with('restore', "Aduan yang berjudul $complaint->judul berhasil di restore ");
});

Route::resource('/admin/tambah', TambahAdminController::class)->middleware('auth');

// Route::get('pdf/{id}', function(Request $request, $id) {
//     $complaint = Complaint::find($id);
//     return view('admin.pdf-page', [
//         // "nama" => $request->input('nama'),
//         // "status" => $request->input('status'),
//         // "perihal" => $request->input('perihal'),
//         // "balasan" => $request->input('balasan'),
//         // "tanggal" => $request->input('tanggal'),
//         "nama" => $complaint->nama,
//         "status" => $complaint->response->status,
//         "perihal" => $complaint->judul,
//         "gambar" => $complaint->image,
//         "balasan" => $complaint->response->tanggapan,
//         "tanggal" => $complaint->response->created_at,
//     ]);
// });

// Route::get('mail/{id}', function($id) {
//     $complaint = Complaint::find($id);
//     Mail::to('p21-sifa373@smkn7-smr.sch.id')->send(new \App\Mail\ComplaintResponse($complaint->nama, $complaint->response->status, $complaint->aduan, $complaint->response->tanggapan, $complaint->response->created_at));
// });