<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $fillable = ['name'];
    public function roles()
    {
        return $this->morphToMany(Role::class, 'roleable');
    }
}
