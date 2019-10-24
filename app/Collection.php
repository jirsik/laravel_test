<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    public function movies()
    {
        return $this->belongsToMany('App\Movie');
    }

    public function genre()
    {
        return $this->belongsTo('App\Genre');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
