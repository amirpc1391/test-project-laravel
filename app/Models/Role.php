<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    public function users()
    {
        return $this->morphedByMany(User::class, 'roleable');
    }

    public function projects()
    {
        return $this->morphedByMany(Project::class, 'roleable');
    }
}
