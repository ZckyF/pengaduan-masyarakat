<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ComplaintResponse extends Mailable
{
    use Queueable, SerializesModels;

    public $nama;
    public $status;
    public $perihal;
    public $balasan;
    public $tanggal;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nama, $status, $perihal, $balasan, $tanggal)
    {
        $this->nama = $nama;
        $this->status = $status;
        $this->perihal = $perihal;
        $this->balasan = $balasan;
        $this->tanggal = $tanggal;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)
                    ->view('admin.complaint-response')
                    ->with([
                        "nama" => $this->nama,
                        "status" => $this->status,
                        "perihal" => $this->perihal,
                        "balasan" => $this->balasan,
                        "tanggal" => $this->tanggal,
                    ]);
    }
}