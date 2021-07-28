<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public $guarded = [];

    public function users()
{
    return $this->belongsToMany('App\User', 'role_id', 'id');
}
}
