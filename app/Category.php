<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Category extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = [
        'name', 'slug', 'description',
    ];

    // you can define as  collections as needed
    public function registerMediaCollections()
    {
        $this->addMediaCollection('category')
        ->withResponsiveImages()
            ->singleFile(); // accept only on file

    }

    public static function str_slug($title, $separator = '-', $language = 'en')
    {
        //$title = static::ascii($title, $language);
        // Convert all dashes/underscores into separator
        $flip = $separator == '-' ? '_' : '-';
        $title = preg_replace('![' . preg_quote($flip) . ']+!u', $separator, $title);
        // Replace @ with the word 'at'
        $title = str_replace('@', $separator . 'at' . $separator, $title);
        // Remove all characters that are not the separator, letters, numbers, or whitespace.
        // previously: $title = preg_replace('![^'.preg_quote($separator).'\pL\pN\s]+!u', '', mb_strtolower($title));
        $title = preg_replace('![^' . preg_quote($separator) . '\pL\pN\s]+!u', '', $title);
        // Replace all separator characters and whitespace by a single separator
        $title = preg_replace('![' . preg_quote($separator) . '\s]+!u', $separator, $title);
        return trim($title, $separator);
    }

}
