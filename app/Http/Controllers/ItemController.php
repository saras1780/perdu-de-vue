<?php

namespace App\Http\Controllers;

use App\Enums\Color;
use App\Models\Item;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\ItemRequest;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;

class ItemController extends Controller
{
    public function index(Request $request): View
    {
        $places = Place::orderBy('name')->get();
        $colors = Color::cases();

        $items = Item::with(['place', 'tags'])
            ->whereNull('returned_at')
            ->when($request->query('lieu'), function ($query, $placeId) {
                $query->where('place_id', $placeId);
            })
            ->when($request->query('couleur'), function ($query, $color) {
                if (Color::tryFrom($color)) {
                    $query->where('color', $color);
                }
            })
            ->orderByDesc('found_on')
            ->get();

        return view('items.index', [
            'items' => $items,
            'places' => $places,
            'colors' => $colors,
        ]);
    }

    public function show(Item $item): View
    {
        return view('items.show', [
            'item' => $item
        ]);
    }

    public function create(): View
    {
        return view('items.create', [
            'places' => Place::orderBy('name')->get(),
            'colors' => Color::cases(),
            'tags' => Tag::orderBy('name')->get(),
        ]);
    }

    public function store(ItemRequest $request): RedirectResponse
    {
        $item = Item::create($request->validated());

        $item->tags()->sync($request->validated('tags') ?? []);

        return redirect()->route('items.index')
            ->with('status', 'L\'objet a été ajouté.');
    }
}
