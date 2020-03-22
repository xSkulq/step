<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function steps()
    {
        return $this->hasMany('App\Step');
    }
}
