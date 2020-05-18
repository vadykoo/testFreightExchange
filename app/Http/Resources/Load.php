<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'name' => $this->getTranslations('name'),
            'volume' => $this->volume,
            'photo' => asset('storage/'.$this->photo),
            'city_from' => $this->city_from,
            'city_to' => $this->city_to,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
