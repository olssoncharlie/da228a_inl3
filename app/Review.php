<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function herb(){
        return $this->belongsTo('App\Herb');
    }
}
