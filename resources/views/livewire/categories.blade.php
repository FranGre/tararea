<?php

use function Livewire\Volt\{layout, state};
use App\Models\Category;

layout('layouts.base');

state(['categories' => Category::where('user_id', Auth::user()->id)->get()]);

?>

<div class="text-center">
    <x-h1 class="mb-14">Categories</x-h1>
    <div class="text-right mb-12">
        <a href="{{ route('category.create') }}" wire:navigate>New Category</a>
    </div>
    <div class="grid gap-9 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @foreach ($categories as $category)
            <a href="{{route('category.edit', $category->id)}}" wire:navigate>
                <div class="py-6 px-2 rounded-lg shadow border duration-100 border-black
                bg-gray-200 hover:bg-gray-300
                dark:bg-neutral-600 dark:hover:bg-neutral-700">
                    <p>{{ $category->title }}
                </div>
            </a>
        @endforeach
    </div>
</div>
