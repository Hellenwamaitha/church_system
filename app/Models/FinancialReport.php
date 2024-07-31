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

    // If your table name is different from the plural form of the model name, specify it
    protected $table = 'financial_reports';
}
