<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    
    protected $guarded = ['id'];


    public function response()
    {
        return $this->belongsTo(Response::class);
    }
}