<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use URL;

class Picture extends Model
{
    protected $fillable = ['path'];

    public function getPathAttribute($value)
    {
        return URL::asset($value);
    }
}
