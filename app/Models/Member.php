<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
        'branch_id',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'address',
        'membership_status',
        'joined_date',
        'category', 
    ];
    
}
