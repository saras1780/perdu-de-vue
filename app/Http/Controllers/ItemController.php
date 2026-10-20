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
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('items', 'public');
        }

        $item = Item::create($data);
        $item->tags()->sync($request->validated('tags') ?? []);

        return redirect()->route('items.index')
            ->with('status', 'L\'objet a été ajouté.');
    }

    public function edit(Item $item): View
    {
        return view('items.edit', [
            'item' => $item,
            'places' => Place::orderBy('name')->get(),
            'colors' => Color::cases(),
            'tags' => Tag::orderBy('name')->get(),
        ]);
    }

    public function update(ItemRequest $request, Item $item): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            if ($item->photo) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($item->photo);
            }
            $data['photo'] = $request->file('photo')->store('items', 'public');
        }

        $item->update($data);
        $item->tags()->sync($request->validated('tags') ?? []);

        return redirect()->route('items.show', $item)
            ->with('status', 'L\'objet a été modifié.');
    }

    public function return(Item $item): RedirectResponse
    {
        if ($item->isReturned()) {
            return back()->with('status', 'Cet objet a déjà été restitué le ' . $item->returned_at->format('d/m/Y') . '.');
        }

        $item->update(['returned_at' => today()]);

        return redirect()->route('items.index')
            ->with('status', '« ' . $item->name . ' » a retrouvé son propriétaire.');
    }

    public function destroy(Item $item): RedirectResponse
    {
        $item->delete();

        return redirect()->route('items.index')
            ->with('status', 'L\'objet a été supprimé.');
    }
}
