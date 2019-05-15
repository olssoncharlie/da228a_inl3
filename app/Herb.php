<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Herb extends Model
{
    public function getReviews(){
        return $this->hasMany('App\Review')->get();
    }

    public function getStores(){
        return $this->belongsToMany('App\Store')->get();
    }

    public function stores() {
        return $this->belongsToMany('App\Store');
    }
}
