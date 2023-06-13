<?php

namespace App\Http\Controllers;

use App\Events\Message;
use App\Models\Response;
use App\Models\Complaint;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function index()
    {
        $complaints = Complaint::query()
            ->where('removed', false)
            ->filter(['search' => request('search')])
            ->orderBy('created_at')
            ->with('response')
            ->paginate(10)
            ->withQueryString();

        return view('admin.aduan', [        
            "complaints" => $complaints,        
            "title" => "Halaman Aduan"    
        ]);
    }

    public function detailShow ($id) 
    {
        return view('admin.detail-aduan', [
            "complaint" => Complaint::find($id),
            "title"     => "Detail Aduan",
            "Disabled"    => "Detail"
        ]);   
    }

    public function response (Request $request, $id) 
    {
        $response = trim($request->input('response'));
        if ($response != '')
        {
            $status = $request->input('tanggapiButton', 'ditolak');
            $complaint = Complaint::find($id);


            if (!is_null($complaint->response_id))
            {
                Response::find($complaint->response_id)->update([
                    'oleh' => Auth::user()->username,
                    'status' => $status,
                    'tanggapan' => $response,
                ]);
            }

            Response::create([
                'oleh' => Auth::user()->username,
                'status' => $status,
                'tanggapan' => $response,
            ]);

            $complaint->update([
                'response_id' => Response::where('tanggapan', $response)->first()->id
            ]);

            $complaint = Complaint::find($id);
            Mail::to($complaint->email)->send(new \App\Mail\ComplaintResponse($complaint->nama, $complaint->response->status, $complaint->aduan, $complaint->response->tanggapan, $complaint->response->created_at));

            // Report
            Message::dispatch("Yameteh");

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
        $complaint->update([
            'removed' => true
        ]);

        // Report
        Message::dispatch("Yameteh");
        
        return redirect('admin')->with('hapus', "Aduan yang berjudul '$complaint->judul' berhasil dihapus ");   
 
    }
}