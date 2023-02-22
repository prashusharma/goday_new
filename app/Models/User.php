<?php
  
namespace App\Models;
  
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
  
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'role',
        'email',
        'password',
        'business_name',
        'contact_person',
        'contact_number',
        'website',
        'logo',
        'state',
        'city',
        'username',
        'company_id',
        'branch_id',
        'group_id',
        'sanction_date',
        'principle',
        'interest',
        'interest_amount',
        'loan_amount',
        'loan_type',
        'opening_fund',
        'installment_type',
        'number_of_installment',
        'installment_amount',
        'start_date_of_installment',
        'end_date_of_installment',
        'percentage_fine_on_due',
        'extra_charge',
        'final_sanctioned_amount',
        'system_setting',
        'group_label',
        'branch_label',
        'company_label',
        'remember_token',
        'email_verified_at',
    ];
  
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
  
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}