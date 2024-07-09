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

    $this->redirect(route('welcome'), true);
};
?>

<form wire:submit='save' class="flex flex-col">
    <input type="text" wire:model='title' placeholder="Title..." />
    @error('title')
        <x-input-error :messages="$message" class="mt-2" />
    @enderror

    <select wire:model='category_id'>
        <option value="">Choose a category</option>
        @foreach ($this->categories as $category)
            <option value="{{ $category->id }}">{{ $category->title }}</option>
        @endforeach
    </select>
    @error('category_id')
        <x-input-error :messages="$message" class="mt-2" />
    @enderror

    <button type="submit">Save</button>
</form>
