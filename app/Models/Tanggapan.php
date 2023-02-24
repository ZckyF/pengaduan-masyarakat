<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    use HasFactory;

    protected $table = 'tanggapan';

    public function pengaduan()
    {
        return $this->hasOne(Pengaduan::class, 'id_tanggapan');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
