<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'email', 'phone_number', 'address', 'state', 'shipping_method',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
