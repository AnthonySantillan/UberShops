<?php

namespace App\Http\Resources\V1\Vehicles;

use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
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
            'data' => [
                'id' => $this->id,
                'plate' => $this->plate,
                'color' => $this->color,
                'enrollment' => $this->enrollment,
                'year' => $this->year,

            ]
        ];
    }
}
