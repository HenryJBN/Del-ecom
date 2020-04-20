<?php

namespace App;

use App\Category;
use App\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Product extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = ['user_id', 'category_id', 'sku', 'subcategory_id',
        'name', 'slug', 'description', 'price', 'quantity', 'weight', 'status',
        'color', 'size', 'model', 'brand'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {

        return $this->belongsTo(SubCategory::class);
    }

    // you can define as  collections as needed
    public function registerMediaCollections()
    {
        $this->addMediaCollection('featured_product')
        ->withResponsiveImages()
            ->singleFile(); // accept only on file

            $this->addMediaCollection('products')
        ->withResponsiveImages();

        $this->addMediaConversion('thumb')
        ->width(200)
        ->height(200)
        ->sharpen(10);
        
        $this->addMediaConversion('square')
              ->width(412)
              ->height(412)
              ->sharpen(10);

    }

}
