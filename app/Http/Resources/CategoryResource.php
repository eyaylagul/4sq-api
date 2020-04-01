<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{

    public function __construct($resource)
    {
        parent::__construct($resource);
        parent::wrap('response');
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'categories' => self::collection($this->getCategories())
        ];
    }
}
