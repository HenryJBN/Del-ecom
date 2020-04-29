<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    public $fillable = [
        'site_title',
        'site_email',
        'site_mobile',
        'metadata',
    ];

    protected $casts = [
        'metadata' => 'array',
    ];

    //length of metadata properties
    const metadataLength = 4;

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

// add money format
    public static function presentPrice($price)
    {

        $setting = Setting::first();

       if($setting->metadata[1]['key']== 'currency'){

        return $setting->metadata[1]['value']. number_format($price, 2);
        // return '₦' . number_format($price, 2);
       }


       return '' .number_format($price, 2);

    }

}
