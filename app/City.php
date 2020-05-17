<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class City extends Model
{
    use HasTranslations;

    public $translatable = ['name'];

    public function loads_from()
    {
        return $this->hasMany('App\Load', 'city_from_id', 'id');
    }

//    public function loads_to()
//    {
//        return $this->hasMany('App\Load', 'city_to_id', 'id');
//    }
}
