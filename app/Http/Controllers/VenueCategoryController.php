<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Services\VenueService;
use Illuminate\Http\Request;

class VenueCategoryController extends Controller
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
     * @return CategoryCollection
     */
    public function __invoke(Request $request)
    {
        $categories = $this->venueService->getCategories();

        return new CategoryCollection($categories);
    }
}
