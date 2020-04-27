<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Settings extends Model
{
    public $fillable = [
        'cart_vat',
        'invoice_address',
        'metadata'
    ];

    protected $casts = [
        'metadata' => 'array'
    ];

    public function setMetadataAttribute($value)
{
    $metadata = [];

    foreach ($value as $array_item) {
        if (!is_null($array_item['key'])) {
            $metadata[] = $array_item;
        }
    }

    $this->attributes['metadata'] = json_encode($metadata);
}


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
