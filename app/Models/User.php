<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'email', 'password', 'role', 'branch_id'
    ];

    protected $hidden =[
        'password', 'remeber_token',
    ];

    //user belong to achurch : Relationship
    public function church()
    {
        return $this->belongsto(church::class);
    }

    //User belong to a branch: Relationship
    public function branch()
    {
        return $this->belongsto(Branch::class);
    }

    //Accessor for role
    public function isAdmin()
    {
        return $this->role == 'admin';
    }

    public function isPastor()
    {
        return $this-> role == 'pastor';
    }

    public function isMember()
    {
        return $this->role == 'member';
    }
}
