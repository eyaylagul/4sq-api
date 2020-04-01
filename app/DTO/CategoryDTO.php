<?php

namespace App\DTO;

class CategoryDTO
{
    protected $id;
    protected $name;
    /** @var CategoryDTO[]  */
    protected $categories = [];

    private function __construct($id, $name, $categories = [])
    {
        $this->id = $id;
        $this->name = $name;
        $this->categories = array_map(function ($category) {
            return self::create(
                $category['id'],
                $category['name'],
                $category['categories']
            );
        }, $categories);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return CategoryDTO[]
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

    public static function create($id, $name, $categories = []): self
    {
        return new static($id, $name, $categories);
    }
}