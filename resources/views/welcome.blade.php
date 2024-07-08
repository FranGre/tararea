<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>tararea</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="antialiased font-sans dark:bg-neutral-800 dark:text-white bg-white text-neutral-900">
        <div class="min-h-screen py-9 px-12">
            <header>
                @if (Route::has('login'))
                    <livewire:welcome.navigation />
                @endif
            </header>

            <main>
                el rincon de isma, users usando la app y tareas que contiene
            </main>

            <footer class="sticky top-full text-center">
                Fran Gregori Tandazo
            </footer>
        </div>
    </body>
</html>
