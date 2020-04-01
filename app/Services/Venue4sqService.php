<?php
/**
 * Created by PhpStorm.
 * User: emreyaylagul
 * Date: 2020-04-01
 * Time: 16:24
 */

namespace App\Services;

use App\DTO\PlaceGroupDTO;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use App\DTO\CategoryDTO;
use App\DTO\PlaceDTO;

class Venue4sqService implements VenueService
{
    const API_URL = 'https://api.foursquare.com/v2/venues/';

    protected function get($resource, $queryParameters = [])
    {
        $authentication = [
            'client_id' => config('api.4sq.client_id'),
            'client_secret' => config('api.4sq.client_secret'),
            'v' => Carbon::today()->format('Ymd')
        ];

        $parameters = array_merge($queryParameters, $authentication);

        try {
            return Http::get(self::API_URL . $resource, $parameters);
        } catch (\Exception $exception) {
            throw new \Exception('The 4sq resource has an error');
        }
    }


    /**
     * @return CategoryDTO[]
     * @throws \Exception
     */
    public function getCategories(): array
    {
        $request = $this->get('categories');

        $categories = $request['response']['categories'];

        return array_map(function ($category) {
            return CategoryDTO::create($category['id'], $category['name'], $category['categories']);
        }, $categories);
    }

    /**
     * @param $near
     * @param $query
     * @param $categoryId
     * @return PlaceDTO[]
     * @throws \Exception
     */
    public function getPlaceGroups($near, $query = '', $categoryId = ''): array
    {
        $request = $this->get('explore', [
            'near' => $near,
            'query' => $query,
            'categoryId' => $categoryId
        ]);

        $placeGroups = $request['response']['groups'];


        return array_map(function ($placeGroup) {
            return PlaceGroupDTO::create($placeGroup['type'], $placeGroup['items']);
        }, $placeGroups);
    }
}