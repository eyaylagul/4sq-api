<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlaceGroupCollection;
use App\Services\VenueService;
use Illuminate\Http\Request;

class VenueExploreController extends Controller
{
    protected $venueService;

    public function __construct(VenueService $venueService)
    {
        $this->venueService = $venueService;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return PlaceGroupCollection
     */
    public function __invoke(Request $request)
    {
        $near = $request->get('near', 'valetta');
        $query = $request->get('query', '');
        $categoryId = $request->get('categoryId', '');

        $places = $this->venueService->getPlaceGroups($near, $query, $categoryId);

        return new PlaceGroupCollection($places);
    }
}
