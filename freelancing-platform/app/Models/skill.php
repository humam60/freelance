<?php

namespace App\Models;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skill extends Model
{
    use HasFactory,HasSlug;
    protected $fillable=['name','slug'];

    
   
    
    public function getSlugrskill() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
