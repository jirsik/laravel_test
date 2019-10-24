<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review', 'movie_id', 'id');
    }

    public function people()
    {

        return $this->belongsToMany('App\Person');
    }

    public function collections()
    {
        return $this->belongsToMany('App\Collection');
    }

    public function favoured_by_users()
    {
        return $this->belongsToMany('App\User', 'favourite_movies');
    }
}
