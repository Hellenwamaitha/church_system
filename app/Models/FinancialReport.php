<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_offerings',
        'total_tithes',
        'total_income',
    ];

    // Specified the table name 
    protected $table = 'financial_reports';
}
