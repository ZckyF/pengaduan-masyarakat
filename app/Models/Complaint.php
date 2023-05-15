<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    
    protected $guarded = ['id'];
    protected $with = ['response'];

    public function scopeFilter($query, array $filters)
    {
        
       $query->when($filters['search'] ?? false, function  ($query,$search) {
            return $query->where('nama', 'like', '%' . $search . '%')
                        ->orWhere('judul', 'like' , '%' . $search . '%');
        });

    }


 
    public function response()
    {
        return $this->belongsTo(Response::class);
    }
}