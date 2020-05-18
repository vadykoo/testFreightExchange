<?php

namespace App\Http\Controllers\API;

use App\City;
use App\Events\LoadEvent;
use App\Http\Controllers\Controller;
use App\Load;
use App\Http\Resources\Load as LoadResource;

class LoadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($city_from = null)
    {
        if( $city_from and $city_from !=='undefined' ) {
            $city = City::where('slug', $city_from)->firstOrFail();
            $loads = $city->loads_from;
        } else {
            $loads = Load::all();
        }

        return LoadResource::collection($loads->reverse());
    }

    public function generate()
    {
        $new_load = factory(Load::class)->create();
        broadcast(new LoadEvent(new LoadResource($new_load)));

        return 'Створено, <br> можна оновити сторінку щоб сгенерувати ще';
    }
}
