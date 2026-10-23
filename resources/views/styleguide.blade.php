<x-layouts.app title="Guide des composants - Perdu de vue">
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-zinc-900 mb-2">Guide des composants</h1>
        <p class="text-zinc-500 text-sm">Aperçu de tous les éléments graphiques réutilisables du site.</p>
    </div>

    <div class="space-y-8">
        <!-- Section Palette de couleurs & Usages -->
        <div class="bg-white p-6 rounded-3xl border border-rose-100 shadow-sm space-y-4">
            <h2 class="text-lg font-bold text-zinc-800 border-b border-rose-50 pb-2">Palette de couleurs & Usages</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex items-center gap-4 p-4 border border-zinc-100 rounded-2xl bg-zinc-50/50">
                    <div class="w-12 h-12 rounded-full bg-rose-600 shadow-inner flex-shrink-0"></div>
                    <div>
                        <p class="font-bold text-zinc-800">Rose (Action principale)</p>
                        <p class="text-sm text-zinc-500">Boutons primaires, accents, liens actifs et bordures de formulaires.</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 p-4 border border-zinc-100 rounded-2xl bg-zinc-50/50">
                    <div class="w-12 h-12 rounded-full bg-zinc-900 shadow-inner flex-shrink-0"></div>
                    <div>
                        <p class="font-bold text-zinc-800">Zinc (Bases & Textes)</p>
                        <p class="text-sm text-zinc-500">Textes principaux, fonds, bordures neutres et éléments secondaires.</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 p-4 border border-zinc-100 rounded-2xl bg-zinc-50/50">
                    <div class="w-12 h-12 rounded-full bg-amber-500 shadow-inner flex-shrink-0"></div>
                    <div>
                        <p class="font-bold text-zinc-800">Ambre (En attente)</p>
                        <p class="text-sm text-zinc-500">Statut des objets non restitués, dates de découverte en attente.</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 p-4 border border-zinc-100 rounded-2xl bg-zinc-50/50">
                    <div class="w-12 h-12 rounded-full bg-emerald-500 shadow-inner flex-shrink-0"></div>
                    <div>
                        <p class="font-bold text-zinc-800">Émeraude (Succès)</p>
                        <p class="text-sm text-zinc-500">Statut des objets restitués, messages flash de validation.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Champs -->
        <div class="bg-white p-6 rounded-3xl border border-rose-100 shadow-sm space-y-4">
            <h2 class="text-lg font-bold text-zinc-800 border-b border-rose-50 pb-2">Champs de formulaire</h2>
            <div class="max-w-md space-y-4">
                <div>
                    <x-label for="demo-input">Champ texte standard</x-label>
                    <x-input id="demo-input" placeholder="Ex: Parapluie..." />
                </div>
                <div>
                    <x-label for="demo-select">Liste déroulante</x-label>
                    <x-select id="demo-select">
                        <option>Option 1</option>
                        <option>Option 2</option>
                    </x-select>
                </div>
            </div>
        </div>

        <!-- Section Badges & Couleurs -->
        <div class="bg-white p-6 rounded-3xl border border-rose-100 shadow-sm space-y-4">
            <h2 class="text-lg font-bold text-zinc-800 border-b border-rose-50 pb-2">Sortes de lieux (Enums PlaceKind)</h2>
            <div class="flex flex-wrap gap-4">
                @foreach(\App\Enums\PlaceKind::cases() as $kind)
                    <span @class(['rounded-full px-3 py-1 text-xs font-semibold border', $kind->badgeClasses()])>
                        {{ $kind->label() }}
                    </span>
                @endforeach
            </div>
        </div>
    </div>
</x-layouts.app>
