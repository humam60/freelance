<?php

namespace App\Models;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class request extends Model
{
    use HasFactory,HasSlug;
    protected $fillable=['title','descreption','category_id','skill_id','user_id','slug'];

    
    public function Category()
    {
        return $this->hasOne('App\Models\Category');
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
