<!-- Be present above all else. - Naval Ravikant -->

<x-layouts.app title="{{ $place->name }} - Perdu de vue">
    <div class="mb-6 text-sm text-zinc-500">
        <a href="{{ route('items.index') }}" class="hover:underline">&larr; Retour aux objets</a>
    </div>

    <div class="mb-8 flex items-center gap-4">
        <h1 class="text-3xl font-extrabold text-zinc-900">{{ $place->name }}</h1>
        <span @class(['rounded-full px-3 py-1 text-sm font-semibold border', $place->kind->badgeClasses()])>
            {{ $place->kind->label() }}
        </span>
    </div>

    <h2 class="text-xl font-bold text-zinc-800 mb-4">Objets trouvés à cet endroit</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($place->items->sortByDesc('found_on') as $item)
            <x-item-card :item="$item" />
        @empty
            <div class="col-span-full py-12 text-center text-zinc-500 bg-white rounded-xl border border-zinc-200 shadow-sm">
                Aucun objet n'a été trouvé dans ce lieu.
            </div>
        @endforelse
    </div>
</x-layouts.app>
