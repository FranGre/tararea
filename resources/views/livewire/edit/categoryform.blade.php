<?php

use function Livewire\Volt\{layout, state, rules, mount};
use App\Models\Category;

layout('layouts.base');

state(['category_id', 'category', 'title', 'logo'])->url();

rules(['title' => 'required|string|max:30', 'logo' => 'nullable|image']);

mount(function () {
    $this->category = Category::findOrFail($this->category_id);
    $this->title = $this->category->title;
});

$save = function () {
    $this->validate();
    $this->category->title = $this->title;
    $this->category->save();

    $this->redirect(route('categories'), true);
};

$remove = function () {
    $this->category->delete();

    $this->redirect(route('categories'), true);
};

?>

<div class="text-center">
    <x-h1>Edit Category</x-h1>

    <form wire:submit='save' enctype="multipart/form-data" class="flex flex-col mt-14">
        <x-input-text wire:model='title' placeholder="Title..." />
        @error('title')
            <x-input-error :messages="$message" class="mt-2" />
        @enderror

        <x-input-file wire:model='logo' class="mt-12" />
        @error('logo')
            <x-input-error :messages="$message" class="mt-2" />
        @enderror

        <div class="mt-16 flex justify-between">
            <button type="submit" class="px-4 py-2 rounded-lg bg-green-500 hover:bg-green-400">Save</button>

            <x-danger-button type='button' wire:click='remove'>Remove</x-danger-button>
        </div>
    </form>
</div>
