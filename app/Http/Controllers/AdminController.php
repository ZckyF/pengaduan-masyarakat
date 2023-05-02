<?php

namespace App\Http\Controllers;

use App\Models\Response;
use App\Models\Complaint;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function index () 
    {
        return view('admin.aduan', [
            "complaints" => Complaint::orderBy('created_at')->with('response')->paginate(10)->withQueryString(),
            "title"      => "Halaman Adura"
        ]);
    }

    public function detailShow ($id) 
    {
        return view('admin.detail-aduan', [
            "complaint" => Complaint::find($id),
            "title"     => "Detail Aduan"
        ]);   
    }

    public function response (Request $request, $id) 
    {
        $response = trim($request->input('response'));
    if ($response != '')
    {
        $status = $request->input('tanggapiButton', 'ditolak');
        $complaint = Complaint::find($id);

        $userEmail = $complaint->email;
        $username = $complaint->nama;
        $judul = $complaint->judul;


        if (!is_null($complaint->response_id))
        {
            Response::find($complaint->response_id)->update([
                'oleh' => Auth::user()->username,
                'status' => $status,
                'tanggapan' => $response,
            ]);
            // if ($status == 'ditolak') {
            //     $subject = 'Pesan Aduan Anda Ditolak';
            //     $message = "Halo $username, pesan aduan anda yang berjudul '$judul'  telah ditolak. Pesan admin : $response";
            //     Mail::to($userEmail)->send(new \App\Mail\ComplaintResponse($subject, $message));
            // } else {
            //     $subject = 'Pesan Aduan Anda Ditanggapi';
            //     $message = "Halo $username, pesan aduan Anda yang berjudul '$judul' telah ditanggapi. Pesan admin : $response";
            //     Mail::to($userEmail)->send(new \App\Mail\ComplaintResponse($subject, $message));
            // }
            return redirect('admin')->with('status', $status);
        }

        Response::create([
            'oleh' => Auth::user()->username,
            'status' => $status,
            'tanggapan' => $response,
        ]);

        $complaint->update([
            'response_id' => Response::where('tanggapan', $response)->first()->id
        ]);

        
    //    if ($status == 'ditolak') {
    //             $subject = 'Pesan Aduan Anda Ditolak';
    //             $message = "Halo $username, pesan aduan anda yang berjudul '$judul' telah ditolak. Pesan admin : $response";
    //             Mail::to($userEmail)->send(new \App\Mail\ComplaintResponse($subject, $message));
    //         } 
    //     else {
    //             $subject = 'Pesan Aduan Anda Ditanggapi';
    //             $message = "Halo $username, pesan aduan anda yang berjudul '$judul' telah ditanggapi. Pesan admin : $response";
    //             Mail::to($userEmail)->send(new \App\Mail\ComplaintResponse($subject, $message));
    //         }
        return redirect('admin')->with('status', $status);
        
    }
    return redirect('admin');   
    }

    public function responseShow () 
    {
        return view('admin.complaint-response');   
    }

    public function destroy ($id) 
    {
        $complaint = Complaint::find($id);
        Response::where('id', $complaint->response_id)->delete();
        $complaint->delete();
        return redirect('admin')->with('status', "Pesan yang berjudul '$complaint->judul' berhasil dihapus ");   
    }
}

