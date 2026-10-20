<!-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci -->

@props(['item'])

<div class="bg-white rounded-xl shadow-sm border border-zinc-200 overflow-hidden flex flex-col">
    <div class="p-5 flex-1">
        <div class="flex justify-between items-start mb-2">
            <h2 class="text-lg font-bold text-zinc-800">
                <a href="{{ route('items.show', $item) }}" class="hover:text-indigo-600 hover:underline">
                    {{ $item->name }}
                </a>
            </h2>
            <!-- Pastille de couleur -->
            <span class="w-4 h-4 rounded-full border border-zinc-300 shadow-inner" style="background-color: {{ $item->color->value === 'multicolor' ? 'conic-gradient(red, yellow, green, blue, purple)' : $item->color->value }}"></span>
        </div>

        <p class="text-sm text-zinc-600 mb-4">
            Trouvé le {{ $item->found_on->format('d/m/Y') }}<br>
            Lieu : <a href="{{ route('places.show', $item->place) }}" class="text-indigo-600 hover:underline">{{ $item->place->name }}</a>
        </p>

        <div class="flex flex-wrap gap-2 mt-auto">
            <!-- Badge de statut -->
            @if($item->isReturned())
                <span class="rounded-full px-2 py-0.5 text-xs font-semibold bg-green-100 text-green-800 border border-green-200">
                    Restitué
                </span>
            @else
                <span class="rounded-full px-2 py-0.5 text-xs font-semibold bg-amber-100 text-amber-800 border border-amber-200">
                    En attente
                </span>
            @endif
            
            <!-- Badge de couleur -->
            <span class="rounded-full px-2 py-0.5 text-xs font-semibold bg-gray-100 text-gray-800 border border-gray-200">
                Couleur : {{ $item->color->label() }}
            </span>

            <!-- Badges des étiquettes -->
            @foreach($item->tags as $tag)
                <span class="rounded-full px-2 py-0.5 text-xs font-semibold bg-indigo-50 text-indigo-700 border border-indigo-200">
                    {{ $tag->name }}
                </span>
            @endforeach
        </div>
    </div>
</div>
