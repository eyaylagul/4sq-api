<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
{
    public $collects = CategoryResource::class;

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
            'categories' => $this->collection
        ];
    }
}
