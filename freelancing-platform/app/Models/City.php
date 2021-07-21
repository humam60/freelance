<?php

namespace App\Models;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory,HasSlug;
    protected $fillable=['name','slug'];

        
    
        public function User(): HasMany
        {
            return $this->hasMany(User::class, 'city_id', 'id');
        }

        
        public function training()
        {
            return $this->hasMany(training::class, 'city_id', 'id');
        }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
    

}
