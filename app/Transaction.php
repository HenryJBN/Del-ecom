<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $fillable = [
        'transaction_ref',
        'channel',
        'amount',
        'payment_status',
        'full_name',
        'email_address',
        'phone_number',
        'currency',
        'merchant_transaction_ref',
        'payment_status_description',
    ];


    protected $cast =[
        'transaction_date'=>'date:hh:mm'
    ];
}
