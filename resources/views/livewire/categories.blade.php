<?php

use function Livewire\Volt\{layout, state, mount, updated};
use App\Models\Category;

layout('layouts.base');

state(['categories', 'items', 'search' => '']);

mount(function () {
    $this->categories = Category::where('user_id', Auth::user()->id)->get();
    $this->items = $this->categories;
});

updated([
    'search' => function () {
        if (empty($this->search)) {
            $this->items = $this->categories;
            return;
        }
        $this->items = Category::search($this->search)->get();
    },
]);

?>

<div class="text-center">
    <x-h1 class="mb-14">Categories</x-h1>
    <div class="flex mb-12 justify-between">
        <x-input-text wire:model.live.debounce.300ms='search' placeholder="Search Categories..." class="max-w-xs"/>
        <div>
            <a href="{{ route('category.create') }}" wire:navigate>New Category</a>
        </div>
    </div>

    @if (count($items) === 0)
        <p>No hay categorias :(</p>
    @else
        <div class="grid gap-9 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($items as $category)
                <a href="{{ route('category.edit', $category->id) }}" wire:navigate>
                    <div
                        class="py-6 px-2 rounded-lg shadow border duration-100 border-black
                bg-gray-200 hover:bg-gray-300
                dark:bg-neutral-600 dark:hover:bg-neutral-700">
                        <p>{{ $category->title }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    @endif
</div>
