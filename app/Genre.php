<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function collection()
    {
        return $this->hasMany('App\Collection');
    }
}
