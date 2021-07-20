<?php

namespace App\Models;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    // `name`, `training_cat_id`, `city_id`, `descreption`, `slug`

 use HasFactory,HasSlug;
    protected $fillable=['name','training_cat_id','city_id','descreption','slug'];

    
    public function training_cat()
    {
        return $this->hasOne('App\Models\training_cat');
    }
    
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }}
