<?php
/**
 * Created by PhpStorm.
 * User: emreyaylagul
 * Date: 2020-04-01
 * Time: 18:17
 */

namespace App\DTO;


class PlaceGroupDTO
{
    protected $name;
    /** @var PlaceDTO[] */
    protected $items;

    private function __construct($name, $items = [])
    {
        $this->name = $name;
        $this->items = array_map(function($item) {
            return PlaceDTO::create($item['venue']['name']);
        }, $items);
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return PlaceDTO[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    public static function create($name, $items): self
    {
        return new static($name, $items);
    }
}