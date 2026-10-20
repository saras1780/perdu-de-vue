<!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->

<x-layouts.app title="{{ $item->name }} - Perdu de vue">
    <div class="mb-6 text-sm text-zinc-500">
        <a href="{{ route('items.index') }}" class="hover:underline">&larr; Retour aux objets</a>
    </div>

    <div class="bg-white p-8 rounded-xl shadow-sm border border-zinc-200 space-y-6">
        <div class="flex justify-between items-start">
            <h1 class="text-3xl font-extrabold text-zinc-900">{{ $item->name }}</h1>
            @if($item->isReturned())
                <!-- Date de restitution en français -->
                <span class="rounded-full px-3 py-1 text-sm font-semibold bg-green-100 text-green-800 border border-green-200">Restitué le {{ $item->returned_at->isoFormat('D MMMM YYYY') }}</span>
            @else
                <!-- Date de découverte en français (en haut) -->
                <span class="rounded-full px-3 py-1 text-sm font-semibold bg-amber-100 text-amber-800 border border-amber-200">En attente depuis le {{ $item->found_on->isoFormat('D MMMM YYYY') }}</span>
            @endif
        </div>

        <!-- CODE DE LA PHOTO -->
        @if($item->photo)
            <div class="my-6 p-4 bg-rose-50/40 rounded-3xl border border-rose-100 flex justify-center items-center shadow-inner">
                <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->name }}" class="max-h-80 w-auto object-contain rounded-2xl shadow-sm">
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="text-sm font-bold text-zinc-400 uppercase tracking-wider mb-2">Informations</h3>
                <ul class="space-y-3 text-zinc-700">
                    <li><strong>Lieu :</strong> <a href="{{ route('places.show', $item->place) }}" class="text-indigo-600 hover:underline font-semibold">{{ $item->place->name }}</a></li>
                    <li>
                        <strong>Couleur :</strong>
                        <span class="inline-flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full border border-zinc-300" style="background-color: {{ $item->color->value === 'multicolor' ? 'conic-gradient(red, yellow, green, blue, purple)' : $item->color->value }}"></span>
                            {{ $item->color->label() }}
                        </span>
                    </li>
                    <!-- Date de découverte détaillée en français avec diffForHumans -->
                    <li>
                        <strong>Découverte :</strong>
                        <span class="text-zinc-800 font-medium">
                            {{ $item->found_on->isoFormat('dddd D MMMM YYYY') }}
                            <span class="text-xs text-rose-500 font-normal">({{ $item->found_on->diffForHumans() }})</span>
                        </span>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="text-sm font-bold text-zinc-400 uppercase tracking-wider mb-2">Étiquettes</h3>
                <div class="flex flex-wrap gap-2">
                    @forelse($item->tags as $tag)
                        <span class="rounded-full px-3 py-1 text-sm font-semibold bg-indigo-50 text-indigo-700 border border-indigo-200">
                            {{ $tag->name }}
                        </span>
                    @empty
                        <span class="text-zinc-500 italic">Aucune étiquette</span>
                    @endforelse
                </div>
            </div>
        </div>

        @if($item->description)
            <div>
                <h3 class="text-sm font-bold text-zinc-400 uppercase tracking-wider mb-2">Description</h3>
                <p class="text-zinc-700 bg-zinc-50 p-4 rounded-lg border border-zinc-100">{{ $item->description }}</p>
            </div>
        @endif

        <div class="pt-6 border-t border-zinc-200 flex gap-4">
            <a href="{{ route('items.edit', $item) }}" class="px-4 py-2 bg-zinc-100 text-zinc-800 font-semibold rounded-lg hover:bg-zinc-200 transition border border-zinc-300 shadow-sm">
                Modifier
            </a>

            @if(!$item->isReturned())
                <form action="{{ route('items.return', $item) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition shadow-sm active:scale-95">
                        Restituer
                    </button>
                </form>
            @endif

            <form action="{{ route('items.destroy', $item) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cet objet ?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition shadow-sm active:scale-95">
                    Supprimer
                </button>
            </form>
        </div>
    </div>
</x-layouts.app>
