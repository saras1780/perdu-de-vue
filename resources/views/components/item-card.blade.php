@props(['item'])

<div class="bg-white rounded-3xl shadow-sm border border-rose-100 overflow-hidden flex flex-col transition hover:shadow-md">
    <div class="p-6 flex-1 flex flex-col justify-between">
        <div>
            <!-- En-tête de la carte : Lieu et pastille de couleur -->
            <div class="flex justify-between items-center mb-3">
                <span class="text-xs font-bold tracking-wider text-rose-800 uppercase">
                    <a href="{{ route('places.show', $item->place) }}" class="hover:underline">{{ $item->place->name }}</a>
                </span>
                <!-- Pastille de couleur -->
                <span class="w-4 h-4 rounded-full border border-zinc-200 shadow-inner flex-shrink-0" style="background-color: {{ $item->color->value === 'multicolor' ? 'conic-gradient(red, yellow, green, blue, purple)' : $item->color->value }}"></span>

            </div>

            @if ($item->photo)
                <div class="mb-4 w-full h-44 rounded-2xl overflow-hidden border border-rose-100 bg-rose-50/30">
                    <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->name }}" class="w-full h-full object-cover">
                </div>
            @endif

            <!-- Nom de l'objet -->
            <h2 class="text-lg font-bold text-zinc-900 mb-1">
                <a href="{{ route('items.show', $item) }}" class="hover:text-rose-600 transition">
                    {{ $item->name }}
                </a>
            </h2>

            <p class="text-xs text-zinc-400 mb-4">
                Trouvé le {{ $item->found_on->isoFormat('D MMMM YYYY') }}
                <span class="text-rose-500 font-medium">({{ $item->found_on->diffForHumans() }})</span>
            </p>
        </div>

        <div>
            <!-- Badges (Statut, Couleur, Étiquettes) -->
            <div class="flex flex-wrap gap-1.5 pt-3 border-t border-rose-50">
                @if($item->isReturned())
                    <span class="rounded-full px-2.5 py-0.5 text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                        Restitué
                    </span>
                @else
                    <span class="rounded-full px-2.5 py-0.5 text-xs font-semibold bg-amber-50 text-amber-700 border border-amber-200">
                        En attente
                    </span>
                @endif

                <span class="rounded-full px-2.5 py-0.5 text-xs font-semibold bg-rose-50 text-rose-700 border border-rose-100">
                    {{ $item->color->label() }}
                </span>

                @foreach($item->tags as $tag)
                    <span class="rounded-full px-2.5 py-0.5 text-xs font-semibold bg-zinc-100 text-zinc-700 border border-zinc-200">
                        {{ $tag->name }}
                    </span>
                @endforeach
            </div>
        </div>
    </div>
</div>
