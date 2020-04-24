<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $fillable = [
        'user_id',
        'transaction_ref',
        'channel',
        'amount',
        'payment_status',
        'name',
        'email_address',
        'phone_number',
        'currency',
        'merchant_transaction_ref',
        'payment_status_description',
    ];

}
