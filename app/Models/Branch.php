<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $fillable = [
        'church_id',
        'name',
        'adrress',
        'location',
        'phone_number',
        'email',
        'branch_manager',
        
    ];

     // Each Branch belongs to one Church : Reletaionship
     public function church()
     {
         return $this->belongsTo(Church::class);
     }
}
