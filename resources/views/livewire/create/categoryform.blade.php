<?php

use function Livewire\Volt\{layout, state, rules, usesFileUploads};
use App\Models\Category;

layout('layouts.base');
usesFileUploads();
state(['title', 'logo', 'user_id' => Auth::user()->id]);

rules(['title' => 'required|string|max:30', 'logo' => 'nullable|image', 'user_id' => 'required|integer|exists:users,id']);

$save = function () {
    $this->validate();

    if(!empty($this->logo)){
    }

    Category::create($this->all());
    
    $this->redirect(route('categories'), true);
};
?>

<div class="text-center">
    <x-h1>New Category</x-h1>
    <form wire:submit='save' enctype="multipart/form-data" class="flex flex-col mt-14">
        <x-input-text wire:model='title' placeholder="Title..."/>
        @error('title') <x-input-error :messages="$message" class="mt-2" /> @enderror
        
        <x-input-file wire:model='logo' class="mt-12"/>
        @error('logo') <x-input-error :messages="$message" class="mt-2" /> @enderror
    
        <button type="submit" class="py-2 bg-green-500 hover:bg-green-400 rounded-lg max-w-20 mt-16">Save</button>
    </form>
</div>