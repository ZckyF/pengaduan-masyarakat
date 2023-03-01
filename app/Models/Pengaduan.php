<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';

    public function tanggapan()
    {
        return $this->belongsTo(Tanggapan::class, 'id_tanggapan');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
