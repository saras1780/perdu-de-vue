<x-layouts.app title="Objets trouvés - Perdu de vue">

    <!-- Bannière principale style "Gare" -->
    <div class="mb-8 bg-white p-8 rounded-3xl shadow-sm border border-rose-100 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
        <div>
            <span class="text-xs font-extrabold text-rose-600 uppercase tracking-widest block mb-1">Bureau des objets trouvés</span>
            <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight text-zinc-900 mb-2">
                Ils attendent leur propriétaire
            </h1>
            <p class="text-sm text-zinc-500 max-w-xl">
                Les objets ramassés dans le hall, sur les quais et dans les trains, du plus récent au plus ancien.
            </p>
        </div>

        <!-- Compteur d'objets en attente -->
        <div class="bg-rose-900 text-white px-6 py-4 rounded-2xl shadow-sm flex items-center gap-4 flex-shrink-0">
            <div>
                <span class="text-2xl font-black block text-center">{{ $totalPendingCount }}</span>
                <span class="text-[10px] uppercase tracking-wider text-rose-200 font-semibold block">Objets en attente</span>
            </div>
            <a href="{{ route('items.create') }}" class="bg-rose-500 hover:bg-rose-400 text-white text-xs font-bold px-3.5 py-2.5 rounded-xl transition shadow-sm flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                Ajouter
            </a>
        </div>
    </div>

    <!-- Formulaire de filtres -->
    <div class="mb-8 bg-white p-6 rounded-3xl shadow-sm border border-rose-100">
        <form method="GET" action="{{ route('items.index') }}" class="flex flex-wrap gap-4 items-end">
            <div class="flex-1 min-w-[200px]">
                <label for="lieu" class="block text-xs font-bold text-zinc-500 uppercase tracking-wider mb-1.5">Lieu</label>
                <select name="lieu" id="lieu" class="w-full rounded-xl border-rose-200 shadow-sm focus:border-rose-500 focus:ring-rose-500 text-sm py-2.5 bg-rose-50/30">
                    <option value="">Tous les lieux</option>
                    @foreach($places as $place)
                        <option value="{{ $place->id }}" @selected(request('lieu') == $place->id)>
                            {{ $place->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex-1 min-w-[200px]">
                <label for="couleur" class="block text-xs font-bold text-zinc-500 uppercase tracking-wider mb-1.5">Couleur</label>
                <select name="couleur" id="couleur" class="w-full rounded-xl border-rose-200 shadow-sm focus:border-rose-500 focus:ring-rose-500 text-sm py-2.5 bg-rose-50/30">
                    <option value="">Toutes les couleurs</option>
                    @foreach($colors as $color)
                        <option value="{{ $color->value }}" @selected(request('couleur') === $color->value)>
                            {{ $color->label() }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center gap-3">
                <button type="submit" class="px-6 py-2.5 bg-rose-700 text-white text-sm font-semibold rounded-xl hover:bg-rose-800 transition shadow-sm">
                    Filtrer
                </button>

                @if(request('lieu') || request('couleur'))
                    <a href="{{ route('items.index') }}" class="text-xs font-medium text-zinc-400 hover:text-zinc-700 underline">
                        Réinitialiser
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Grille des objets -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($items as $item)
            <x-item-card :item="$item" />
        @empty
            <div class="col-span-full py-16 text-center text-zinc-400 bg-white rounded-3xl border border-rose-100 shadow-sm">
                Aucun objet ne correspond à ces critères.
            </div>
        @endforelse
    </div>

    <div>
        {{ $items->links() }}
    </div>
</x-layouts.app>
