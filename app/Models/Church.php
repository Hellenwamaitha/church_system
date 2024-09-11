<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'address', 'phone', 'email', 'established_date',
    ];
    
    // One Church has many Branches
    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
}
