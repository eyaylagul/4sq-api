<?php

namespace App\DTO;

class PlaceDTO
{
    protected $name;

    private function __construct($name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public static function create($name): self
    {
        return new static($name);
    }
}