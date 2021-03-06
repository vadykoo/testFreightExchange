<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\City as CityResource;
use Illuminate\Support\Facades\Storage;

class Load extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'volume' => $this->volume,
            'photo' => Storage::url($this->photo),
            'city_from' => new CityResource($this->city_from),
            'city_to' => new CityResource($this->city_to),
        ];
    }
}
