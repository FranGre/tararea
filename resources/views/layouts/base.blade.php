<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{$title ?? config('app.name')}}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="font-sans antialiased py-6 px-24">
        <div class="min-h-screen dark:bg-neutral-800 bg-white">
            <nav class="mb-24 space-x-6">
                <a href="{{route('home')}}" wire:navigate>Home</a>
                <a href="{{route('category.create')}}" wire:navigate>New Category</a>
                <a href="{{route('task.create')}}" wire:navigate>New Task</a>
            </nav>

             <!-- Page Heading -->
             @if (isset($header))
                <header class="dark:bg-neutral-800 bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="dark:bg-neutral-800 dark:text-white bg-white text-neutral-900">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>