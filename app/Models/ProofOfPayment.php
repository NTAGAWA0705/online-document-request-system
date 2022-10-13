<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProofOfPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'documentrequest_id',
        'payment_slip_id',
        'payment_datetime',
        'amount',
        'method_of_payment',
        'bank_name',
        'student_name',
        'slip_url',
        'status',
    ];
}
