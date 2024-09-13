<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'address', 'phone', 'email', 'established_date', 'establisher_name', 'status'
    ];
    
    // One Church has many Branches : Relationship
    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
}
