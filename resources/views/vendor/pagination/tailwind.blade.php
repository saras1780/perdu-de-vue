@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="bg-white p-6 rounded-3xl border border-rose-100 flex flex-col sm:flex-row items-center justify-between gap-4 mt-8">
        <div>
            <p class="text-sm text-zinc-500">
                Affichage de
                <span class="font-bold text-zinc-800">{{ $paginator->firstItem() }}</span>
                à
                <span class="font-bold text-zinc-800">{{ $paginator->lastItem() }}</span>
                sur
                <span class="font-bold text-zinc-800">{{ $paginator->total() }}</span>
                résultats
            </p>
        </div>

        <div>
            <span class="relative z-0 inline-flex rounded-2xl gap-1">
                {{-- Bouton Précédent (affiché uniquement si on n'est PAS sur la première page) --}}
                @unless ($paginator->onFirstPage())
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-zinc-700 bg-white border border-rose-200 rounded-xl leading-5 hover:bg-rose-50 hover:text-rose-700 transition">
                        &larr; Précédent
                    </a>
                @endunless

                {{-- Numéros de page --}}
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <span aria-disabled="true">
                            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-zinc-400 bg-white border border-rose-100 cursor-default rounded-xl leading-5">{{ $element }}</span>
                        </span>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span aria-current="page">
                                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-bold text-white bg-rose-700 border border-rose-700 rounded-xl leading-5 cursor-default">{{ $page }}</span>
                                </span>
                            @else
                                <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-zinc-700 bg-white border border-rose-200 rounded-xl leading-5 hover:bg-rose-50 hover:text-rose-700 transition">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Bouton Suivant (affiché uniquement s'il y a une page suivante) --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-zinc-700 bg-white border border-rose-200 rounded-xl leading-5 hover:bg-rose-50 hover:text-rose-700 transition">
                        Suivant &rarr;
                    </a>
                @endif
            </span>
        </div>
    </nav>
@endif
