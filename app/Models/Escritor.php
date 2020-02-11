<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Escritor extends Model
{
    public function articles()
    {
        return $this->hasMany('App\Models\Article');
    }
}
