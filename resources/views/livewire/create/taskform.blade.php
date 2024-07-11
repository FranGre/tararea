<?php

use function Livewire\Volt\{layout, state, mount, rules};
use App\Models\Category;
use App\Models\Task;

layout('layouts.base');

state(['user_id' => Auth::user()->id, 'category_id', 'title', 'categories']);

mount(fn() => ($this->categories = Category::where('user_id', Auth::user()->id)->get()));

rules(['user_id' => 'required|integer|exists:users,id', 'category_id' => 'required|integer|exists:categories,id', 'title' => 'required|string|max:100']);

$save = function () {
    $this->validate();
    Task::create(['user_id' => $this->user_id, 'category_id' => $this->category_id, 'title' => $this->title]);

    $this->redirect(route('home'), true);
};
?>

<div class="text-center">
    <x-h1>New Task</x-h1>
    <form wire:submit='save' class="flex flex-col mt-14">
        <x-input-text wire:model='title' placeholder="Title..." />
        @error('title')
            <x-input-error :messages="$message" class="mt-2" />
        @enderror

        <x-select wire:model='category_id'>
            <option value="">Choose a category</option>
            @foreach ($this->categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </x-select>
        @error('category_id')
            <x-input-error :messages="$message" class="mt-2" />
        @enderror

        <button type="submit" class="py-2 bg-green-500 hover:bg-green-400 rounded-lg max-w-20 mt-16">Save</button>
    </form>
</div>
