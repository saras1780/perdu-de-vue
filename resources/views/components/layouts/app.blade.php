<!DOCTYPE html>
<html lang="fr" class="bg-rose-50/50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Perdu de vue' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="text-zinc-900 antialiased min-h-screen flex flex-col">
    <!-- Barre de navigation rose -->
    <nav class="bg-rose-700 text-white shadow-md py-4 px-6">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="bg-white/10 p-2 rounded-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <div>
                    <a href="{{ route('items.index') }}" class="font-bold text-xl tracking-tight block">Perdu de vue</a>
                    <span class="text-xs text-rose-200 uppercase tracking-widest font-medium">Objets trouvés · Gare de Wavre</span>
                </div>
            </div>

            <div class="flex items-center gap-2">
                <a href="{{ route('items.index') }}" @class(['px-3 py-1.5 rounded-lg text-sm font-medium transition', 'bg-white/20 text-white font-bold' => request()->routeIs('items.index'), 'hover:bg-white/10 text-rose-100' => !request()->routeIs('items.index')])>Objets</a>
                <a href="{{ route('items.create') }}" @class(['px-3 py-1.5 rounded-lg text-sm font-medium transition', 'bg-white/20 text-white font-bold' => request()->routeIs('items.create'), 'hover:bg-white/10 text-rose-100' => !request()->routeIs('items.create')])>Ajouter un objet</a>
                <a href="{{ route('styleguide') }}" @class(['px-3 py-1.5 rounded-lg text-sm font-medium transition', 'bg-white/20 text-white font-bold' => request()->routeIs('styleguide'), 'hover:bg-white/10 text-rose-100' => !request()->routeIs('styleguide')])>Composants</a>
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto p-6 flex-1 w-full">
        @if(session('status'))
            <div class="mb-6 rounded-2xl bg-rose-100 p-4 text-rose-900 border border-rose-200 shadow-sm flex items-center gap-3">
                <svg class="w-5 h-5 text-rose-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span>{{ session('status') }}</span>
            </div>
        @endif

        {{ $slot }}
    </main>
</body>
</html>
