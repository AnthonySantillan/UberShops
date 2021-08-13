<?php

namespace App\Http\Resources\V1\Details;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DetailCollection extends ResourceCollection
{
    public $collects = DetailResource::class;
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
