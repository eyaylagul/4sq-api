<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PlaceGroupCollection extends ResourceCollection
{
    public $collects = PlaceGroupResource::class;

    public function __construct($resource)
    {
        parent::__construct($resource);
        parent::wrap('response');
    }

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'groups' => $this->collection
        ];
    }
}
