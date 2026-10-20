<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\View\View;

class PlaceController extends Controller
{
    public function show(Place $place): View
    {
        $place->load(['items.tags', 'items.place']);

        return view('places.show', [
            'place' => $place
        ]);
    }
}
