<?php

namespace App\Http\Resources\V1\Clients;

use Illuminate\Http\Resources\Json\JsonResource;


class ClientResource extends JsonResource
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
                'card' => $this->card,
            ]
        ];
    }
}
