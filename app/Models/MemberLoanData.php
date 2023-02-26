<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member_loan_data extends Model
{
    use HasFactory;
    protected $fillable = [
        'member_id', 'number_of_emi', 'staff_id',
        'emi_dates', 'emi',
        'opening', 'interest_per_unit',
        'principle', 'outstanding',
    ];
}
