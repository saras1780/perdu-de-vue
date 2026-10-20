
<!DOCTYPE html>
<html lang="fr" class="bg-zinc-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Perdu de vue' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="text-zinc-900 antialiased">
    <nav class="bg-indigo-600 text-white shadow-md p-4">
        <div class="max-w-5xl mx-auto flex justify-between items-center">
            <a href="{{ route('items.index') }}" class="font-bold text-xl tracking-tight"> Perdu de vue</a>
            <div class="space-x-4">
                <a href="{{ route('items.index') }}" @class(['hover:underline', 'font-bold underline' => request()->routeIs('items.index')])>Les objets</a>

                <a href="{{ route('items.create') }}" @class(['hover:underline', 'font-bold underline' => request()->routeIs('items.create')])>Ajouter un objet</a>
            </div>
        </div>
    </nav>

    <main class="max-w-5xl mx-auto p-6">
        @if(session('status'))
            <div class="mb-6 rounded-lg bg-green-50 p-4 text-green-800 border border-green-200 shadow-sm">
                {{ session('status') }}
            </div>
        @endif

        {{ $slot }}
    </main>
</body>
</html>
