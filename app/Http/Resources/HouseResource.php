<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HouseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [ 
            'id' => $this->id,
            'name' => $this->name,
            'street_id' => $this->street_id,
            'house_type' => $this->house_type,
            'active_from' => $this->active_from,
            'active_to' => $this->active_to,
            'number_of_floors' => $this->number_of_floors,
        ];
    }
}
