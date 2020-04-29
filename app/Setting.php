<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Setting extends Model implements HasMedia
{

    use HasMediaTrait;

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

        if ($setting->metadata[1]['key'] == 'currency') {

            return $setting->metadata[1]['value'] . number_format($price, 2);
            // return '₦' . number_format($price, 2);
        }

        return '' . number_format($price, 2);

    }

    // you can define as  collections as needed
    public function registerMediaCollections()
    {

        $this->addMediaCollection('site_logo')
            ->withResponsiveImages()
            ->singleFile(); // accept only on file

        $this->addMediaConversion('thumb')
            ->width(200)
            ->height(200)
            ->sharpen(10);

        $this->addMediaConversion('square')
            ->width(412)
            ->height(412)
            ->sharpen(10);

        $this->addMediaConversion('small')
            ->width(100)
            ->height(100)
            ->sharpen(10);

        $this->addMediaConversion('smallest')
            ->width(50)
            ->height(100)
            ->sharpen(10);

        $this->addMediaConversion('smallest-sm')
            ->width(50)
            ->height(50)
            ->sharpen(10);

        $this->addMediaConversion('icon')
            ->width(32)
            ->height(32)
            ->sharpen(10)
            ->format('png');


    }

    // site logo

    public static function logo($var = null, $type = null)
    {
        $setting = Setting::first();

        if ($var == 'site_logo' && !empty($setting->getFirstMediaUrl('site_logo')) && $type != null) {

            return $setting->getFirstMediaUrl('site_logo', $type);
        }

        return asset('assets/images/logo.png');
    }

 //getting setting information
  public static function siteInfo()
  {
          $setting=Setting::first();
           return collect([
            'site_title' => $setting->site_title ?? '',
            'site_email' =>  $setting->site_email ?? '',
            'site_mobile' =>  $setting->site_mobile  ?? '',

        ]);


  }


}
