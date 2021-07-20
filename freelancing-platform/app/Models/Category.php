<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory,HasSlug;
    protected $fillable=['title','slug'];

    public function Offers()
    {
        return $this->hasMany('App\Models\Offers');
    }
    
    // public function Offers(): HasMany
    // {
    //     return $this->hasMany(Offers::class, 'category_id', 'id');
    // }

    public function request()
    {
        return $this->hasMany('App\Models\request');
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
