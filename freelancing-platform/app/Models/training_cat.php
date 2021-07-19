<?php

namespace App\Models;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class training_cat extends Model
{
    use HasFactory,HasSlug;
    protected $fillable=['name','slug'];

    
    public function Training()
    {
        return $this->belongsTo('App\Models\Training');
    }
    
    public function getSlugtraining_cat() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
