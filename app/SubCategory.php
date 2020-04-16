<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
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
}
