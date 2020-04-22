<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class SubCategory extends Model implements HasMedia
{
    use HasMediaTrait;
    public $table = 'sub_categories';
    protected $fillable = [
        'category_id', 'name', 'slug', 'description',
    ];

    // you can define as  collections as needed
    public function registerMediaCollections()
    {
        $this->addMediaCollection('subcategory')
            ->withResponsiveImages()
            ->singleFile(); // accept only on file
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
