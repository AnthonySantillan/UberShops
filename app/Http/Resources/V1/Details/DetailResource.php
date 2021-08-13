<?php

namespace App\Http\Resources\V1\Details;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailResource extends JsonResource
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
                'amount' => $this->amount,
                'delivery_date' => $this->delivery_date,
                'delivery_time' => $this->delivery_time,
                'value' => $this->value,
            ]
        ];
    }
}
