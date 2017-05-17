<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function campings(){
        return $this->hasMany('App\Camping');
    }
}
