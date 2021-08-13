<?php

namespace App\Http\Resources\V1\Travels;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TravelCollection extends ResourceCollection
{
    public $collects = TravelResource::class;
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection
        ];
    }
}
