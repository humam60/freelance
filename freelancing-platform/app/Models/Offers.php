<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

 class Offers extends Model
{
    use HasFactory,HasSlug;
    // use HasSlug;

    protected $fillable=['title','descreption','category_id','skill_id','user_id','slug'];


    

  
    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
 
    

    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

  

}
