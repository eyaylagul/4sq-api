<?php

namespace App\Services;

use App\DTO\CategoryDTO;
use App\DTO\PlaceGroupDTO;

interface VenueService
{
    /**
     * @return CategoryDTO[]
     */
    public function getCategories();

    /**
     * @param $near
     * @param $query
     * @param $categoryId
     * @return PlaceGroupDTO[]
     */
    public function getPlaceGroups($near, $query, $categoryId);
}