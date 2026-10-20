<x-layouts.app title="Ajouter un objet - Perdu de vue">
    <div class="mb-6 text-sm text-zinc-500">
        <a href="{{ route('items.index') }}" class="hover:underline text-rose-700 font-medium">&larr; Retour aux objets</a>
    </div>

    <div class="max-w-2xl mx-auto bg-white p-8 md:p-10 rounded-3xl shadow-sm border border-rose-100">
        <h1 class="text-2xl md:text-3xl font-extrabold text-zinc-900 mb-6 tracking-tight">Ajouter un objet trouvé</h1>

        <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <x-label for="name" class="text-xs font-bold text-zinc-500 uppercase tracking-wider mb-2">Nom de l'objet</x-label>
                <x-input id="name" name="name" :value="old('name')" class="rounded-2xl border-rose-200 bg-rose-50/30 focus:border-rose-500 focus:ring-rose-500 py-3" placeholder="Ex: Parapluie noir..." />
                @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <x-label for="place_id" class="text-xs font-bold text-zinc-500 uppercase tracking-wider mb-2">Lieu de découverte</x-label>
                    <x-select id="place_id" name="place_id" class="rounded-2xl border-rose-200 bg-rose-50/30 focus:border-rose-500 focus:ring-rose-500 py-3">
                        <option value="">Sélectionnez un lieu...</option>
                        @foreach($places as $place)
                            <option value="{{ $place->id }}" @selected(old('place_id') == $place->id)>{{ $place->name }}</option>
                        @endforeach
                    </x-select>
                    @error('place_id') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <x-label for="found_on" class="text-xs font-bold text-zinc-500 uppercase tracking-wider mb-2">Date de découverte</x-label>
                    <x-input type="date" id="found_on" name="found_on" :value="old('found_on')" class="rounded-2xl border-rose-200 bg-rose-50/30 focus:border-rose-500 focus:ring-rose-500 py-3" />
                    @error('found_on') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <x-label for="color" class="text-xs font-bold text-zinc-500 uppercase tracking-wider mb-2">Couleur dominante</x-label>
                <x-select id="color" name="color" class="rounded-2xl border-rose-200 bg-rose-50/30 focus:border-rose-500 focus:ring-rose-500 py-3">
                    <option value="">Sélectionnez une couleur...</option>
                    @foreach($colors as $color)
                        <option value="{{ $color->value }}" @selected(old('color') === $color->value)>{{ $color->label() }}</option>
                    @endforeach
                </x-select>
                @error('color') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <x-label for="photo" class="text-xs font-bold text-zinc-500 uppercase tracking-wider mb-2">Photo de l'objet (facultative)</x-label>
                <input type="file" id="photo" name="photo" class="block w-full text-sm text-zinc-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-rose-50 file:text-rose-700 hover:file:bg-rose-100 cursor-pointer rounded-2xl border border-rose-200 bg-rose-50/30">
                @error('photo') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="text-xs font-bold text-zinc-500 uppercase tracking-wider mb-2 block">Étiquettes</label>
                <div class="mt-2 flex flex-wrap gap-3 bg-rose-50/20 p-4 rounded-2xl border border-rose-100">
                    @foreach($tags as $tag)
                        <label class="inline-flex items-center gap-2 cursor-pointer bg-white px-3 py-2 rounded-xl border border-rose-200 hover:bg-rose-50 transition shadow-xs">
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                   @checked(in_array($tag->id, old('tags', [])))
                                   class="rounded border-rose-300 text-rose-600 shadow-sm focus:ring-rose-500">
                            <span class="text-xs font-semibold text-zinc-700">{{ $tag->name }}</span>
                        </label>
                    @endforeach
                </div>
                @error('tags') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <x-label for="description" class="text-xs font-bold text-zinc-500 uppercase tracking-wider mb-2">Description (facultative)</x-label>
                <x-textarea id="description" name="description" class="rounded-2xl border-rose-200 bg-rose-50/30 focus:border-rose-500 focus:ring-rose-500 p-3" placeholder="Informations complémentaires...">{{ old('description') }}</x-textarea>
                @error('description') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="pt-4 flex justify-end">
                <button type="submit" class="px-6 py-3 bg-rose-700 text-white font-semibold rounded-xl hover:bg-rose-800 transition shadow-sm active:scale-95">
                    Ajouter l'objet
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>
