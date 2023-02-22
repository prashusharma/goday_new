<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'branch_name',
        'branch_code',
        'opening_date',
        'opening_fund',
        'email',
        'contact_number',
        'state',
        'city',
        'area',
        'pincode',
    ];
}
