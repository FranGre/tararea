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

        <main class="py-36">
            <div class="grid gap-9 md:gap-12 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 px-32 mt-28">
                <div
                    class="py-6 px-2 rounded-lg shadow border duration-100 border-black text-center
                            bg-gray-200 hover:bg-gray-300
                            dark:bg-neutral-600 dark:hover:bg-neutral-700">
                    <h2>Users</h2>
                    <p>+ 20</p>
                </div>
                <div
                    class="py-6 px-2 rounded-lg shadow border duration-100 border-black text-center
                            bg-gray-200 hover:bg-gray-300
                            dark:bg-neutral-600 dark:hover:bg-neutral-700">
                    <h2>Tasks</h2>
                    <p>+ 20</p>
                </div>
                <div
                    class="py-6 px-2 rounded-lg shadow border duration-100 border-black text-center
                            bg-gray-200 hover:bg-gray-300
                            dark:bg-neutral-600 dark:hover:bg-neutral-700">
                    <h2>Categories</h2>
                    <p>+ 20</p>
                </div>
            </div>
        </main>

        <footer class="sticky top-full text-center">
            Fran Gregori Tandazo
        </footer>
    </div>
</body>

</html>
