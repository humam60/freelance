<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profiles extends Model
{
    use HasFactory;
    protected $filable=['name', 'phoneNumber', 'profile_img', 'user_id', 'location_id', 
                'skill_id', 'city_id','abouMe','rate'];

                /**
                 * Get the user that owns the profiles
                 *
                 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
                 */
                public function user()
                {
                    return $this->belongsTo(User::class, 'user_id', 'id');
                }




    
}
