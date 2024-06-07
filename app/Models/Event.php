<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event'; // Specify the table name

    protected $fillable = [
        'title', 'date', 'time', 'location',
    ];
}

