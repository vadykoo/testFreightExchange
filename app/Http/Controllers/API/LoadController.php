<?php

namespace App\Http\Controllers\API;

use App\City;
use App\Events\LoadEvent;
use App\Http\Controllers\Controller;
use App\Load;
use App\Http\Resources\Load as LoadResource;
use Illuminate\Http\Request;

class LoadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loads = Load::orderBy('id', 'desc')->get();

        return LoadResource::collection($loads);
    }

    public function indexFrom(Request $request)
    {
        $city = City::where('slug', $request->city_from)->firstOrFail();

        return LoadResource::collection($city->loads_from);
    }


    public function generate()
    {
        $new_load = factory(Load::class)->create();
        broadcast(new LoadEvent(new LoadResource($new_load)));

        return 'Створено, <br> можна оновити сторінку щоб сгенерувати ще';
    }
}
