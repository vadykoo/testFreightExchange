<?php

namespace App\Http\Controllers\API;

use App\City;
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

        return LoadResource::collection($loads);
    }
}
