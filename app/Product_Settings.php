<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Settings extends Model
{
    public $fillable = [
        'cart_vat',
        'invoice_address'
    ];

    public static function settings(){
        //  $settings=Setting::first();
        //    return collect([
        //     'tax' => $settings->cart_vat,
        //     'address' => $settings->invoice_address,
        // ]);
           return collect([
            'tax' => 300,
            'address' => "demo Address",
        ]);
    }
}
