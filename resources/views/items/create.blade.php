
<x-layouts.app title="Ajouter un objet - Perdu de vue">
    <div class="mb-6 text-sm text-zinc-500">
        <a href="{{ route('items.index') }}" class="hover:underline">&larr; Retour aux objets</a>
    </div>

    <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-sm border border-zinc-200">
        <h1 class="text-2xl font-bold text-zinc-900 mb-6">Ajouter un objet trouvé</h1>

        <form action="{{ route('items.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <x-label for="name">Nom de l'objet</x-label>
                <x-input id="name" name="name" :value="old('name')" />
                @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <x-label for="place_id">Lieu de découverte</x-label>
                    <x-select id="place_id" name="place_id">
                        <option value="">Sélectionnez un lieu...</option>
                        @foreach($places as $place)
                            <option value="{{ $place->id }}" @selected(old('place_id') == $place->id)>{{ $place->name }}</option>
                        @endforeach
                    </x-select>
                    @error('place_id') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <x-label for="found_on">Date de découverte</x-label>
                    <x-input type="date" id="found_on" name="found_on" :value="old('found_on')" />
                    @error('found_on') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <x-label for="color">Couleur dominante</x-label>
                <x-select id="color" name="color">
                    <option value="">Sélectionnez une couleur...</option>
                    @foreach($colors as $color)
                        <option value="{{ $color->value }}" @selected(old('color') === $color->value)>{{ $color->label() }}</option>
                    @endforeach
                </x-select>
                @error('color') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <x-label>Étiquettes</x-label>
                <div class="mt-2 flex flex-wrap gap-4">
                    @foreach($tags as $tag)
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                   @checked(in_array($tag->id, old('tags', [])))
                                   class="rounded border-zinc-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                            <span class="text-sm text-zinc-700">{{ $tag->name }}</span>
                        </label>
                    @endforeach
                </div>
                @error('tags') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <x-label for="description">Description (facultative)</x-label>
                <x-textarea id="description" name="description">{{ old('description') }}</x-textarea>
                @error('description') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="pt-4 flex justify-end">
                <button type="submit" class="px-5 py-2.5 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition active:scale-95 shadow-sm">
                    Ajouter l'objet
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>
