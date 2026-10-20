<x-layouts.app title="Guide des composants - Perdu de vue">
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-zinc-900 mb-2">Guide des composants</h1>
        <p class="text-zinc-500 text-sm">Aperçu de tous les éléments graphiques réutilisables du site.</p>
    </div>

    <div class="space-y-8">
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
