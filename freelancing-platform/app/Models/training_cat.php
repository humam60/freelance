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

    
    /**
     * Get all of the Training for the training_cat
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Training(): HasMany
    {
        return $this->hasMany(Training::class, 'training_cat_id', 'id');
    }
    
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
