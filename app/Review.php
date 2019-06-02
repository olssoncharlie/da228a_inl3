<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function herb(){
        return $this->belongsTo('App\Herb');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }


}
