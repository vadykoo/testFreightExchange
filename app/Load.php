<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Load extends Model
{
    use HasTranslations;

    public $translatable = ['name'];

    public function city_from()
    {
        return $this->belongsTo('App\City', 'city_from_id', 'id');
    }

    public function city_to()
    {
        return $this->belongsTo('App\City', 'city_to_id', 'id');
    }
}
