<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public function herbs(){
        return $this->belongsToMany('App\Herb');
    }
}
