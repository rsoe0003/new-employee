<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'job_position',
        'date_of_birth',
        'phone_number',
        'email',
        'province',
        'city',
        'address',
        'zip_code',
        'ktp_number',
        'ktp_image',
        'bank_account',
        'bank_account_number',
    ];
}
