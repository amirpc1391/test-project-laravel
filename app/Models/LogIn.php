<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogIn extends Model
{
    protected $table = 'log_in';
    protected $fillable = [
        'url',
        'ip',
        'body'
    ];
    public $timestamps = false;
}
