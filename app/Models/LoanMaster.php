<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanMaster extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'loan_name',
        'loan_code',
        'interest_type',
        'interest_type_value',
    ];
}
