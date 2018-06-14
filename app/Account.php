<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function category(){
        return $this->belongsTo('App\Category');
    }
}
