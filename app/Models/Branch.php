<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $fillable = [
        'church_id', 'branch_name', 'pastor_name', 'pastor_email',   'status'
    ];

     // Each Branch belongs to one Church : Reletaionship
     public function church()
     {
         return $this->belongsTo(Church::class);
     }

     // User belong to a branch
     public function users()
    {
        return $this->hasMany(User::class);
    }
}
