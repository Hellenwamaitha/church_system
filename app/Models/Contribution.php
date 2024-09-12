<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    use HasFactory;
    protected $fillable = [
        'branch_id',
        'amount',
        'contribution_type',
        'date',
        'purpose'
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

}
