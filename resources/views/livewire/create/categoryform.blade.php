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
    
    $this->redirect(route('welcome'), true);
};
?>

<form wire:submit='save' enctype="multipart/form-data" class="flex flex-col">
    <input type="text" wire:model='title' placeholder="Title..." />
    @error('title') <x-input-error :messages="$message" class="mt-2" /> @enderror
    <input type="file" wire:model='logo' />
    @error('logo') <x-input-error :messages="$message" class="mt-2" /> @enderror

    <button type="submit">Save</button>
</form>