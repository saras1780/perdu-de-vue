<!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->

<x-layouts.app title="Objets trouvés">
    <div class="mb-8 bg-white p-6 rounded-xl shadow-sm border border-zinc-200">
        <form method="GET" action="{{ route('items.index') }}" class="flex flex-wrap gap-4 items-end">
            <div>
                <label for="lieu" class="block text-sm font-medium text-zinc-700 mb-1">Lieu de découverte</label>
                <select name="lieu" id="lieu" class="rounded-md border-zinc-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                    <option value="">Tous les lieux</option>
                    @foreach($places as $place)
                        <option value="{{ $place->id }}" @selected(request('lieu') == $place->id)>
                            {{ $place->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="couleur" class="block text-sm font-medium text-zinc-700 mb-1">Couleur</label>
                <select name="couleur" id="couleur" class="rounded-md border-zinc-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                    <option value="">Toutes les couleurs</option>
                    @foreach($colors as $color)
                        <option value="{{ $color->value }}" @selected(request('couleur') === $color->value)>
                            {{ $color->label() }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="px-4 py-2 bg-zinc-800 text-white text-sm font-medium rounded-md hover:bg-zinc-700 transition">
                Filtrer
            </button>

            @if(request('lieu') || request('couleur'))
                <a href="{{ route('items.index') }}" class="text-sm text-zinc-500 hover:text-zinc-800 underline">
                    Réinitialiser
                </a>
            @endif
        </form>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($items as $item)
            <x-item-card :item="$item" />
        @empty
            <div class="col-span-full py-12 text-center text-zinc-500 bg-white rounded-xl border border-zinc-200 shadow-sm">
                Aucun objet ne correspond à ces critères.
            </div>
        @endforelse
    </div>
</x-layouts.app>
