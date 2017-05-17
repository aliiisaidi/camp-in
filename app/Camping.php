<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camping extends Model
{
    public function photos(){
        return $this->hasMany('App\Photo');
    }
    public function likes(){
        return $this->hasMany('App\Like');
    }

}
