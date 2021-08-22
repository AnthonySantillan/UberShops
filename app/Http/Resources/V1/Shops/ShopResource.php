<?php

namespace App\Http\Resources\V1\Shops;

use Illuminate\Http\Resources\Json\JsonResource;

class ShopResource extends JsonResource
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
                'code' => $this->code,
                'direction' => $this->direction,
            
        ];
    }
}
