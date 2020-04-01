<?php
/**
 * Created by PhpStorm.
 * User: emreyaylagul
 * Date: 2020-04-01
 * Time: 16:20
 */

namespace App\Services;


use App\DTO\CategoryDTO;
use App\DTO\PlaceDTO;

interface VenueService
{
    /**
     * @return CategoryDTO[]
     */
    public function getCategories();

    /**
     * @return PlaceDTO[]
     */
    public function getPlaceGroups($near, $query, $categoryId);
}