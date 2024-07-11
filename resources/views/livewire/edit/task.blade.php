<?php

use function Livewire\Volt\{layout, state, rules, mount};
use App\Models\Task;
use App\Models\Category;

layout('layouts.base');

state('task_id')->url();
state(['task', 'title', 'category_id', 'categories']);

rules(['title' => 'required|string|max:100', 'category_id' => 'required|integer|exists:categories,id']);

mount(function () {
    $this->task = Task::findOrFail($this->task_id);
    $this->title = $this->task->title;
    $this->category_id = $this->task->category_id;

    $this->categories = Category::where('user_id', Auth::user()->id)->get();
});

$save = function () {
    $this->validate();

    $this->task->title = $this->title;
    $this->task->category_id = $this->category_id;

    $this->task->save();

    $this->redirect(route('home'), true);
};

$remove = function () {
    $this->task->delete();

    $this->redirect(route('home'), true);
};

?>

<div class="text-center">
    <x-h1>Edit Task</x-h1>
    <form wire:submit='save' class="flex flex-col mt-14">
        <x-input-text wire:model='title' placeholder="Title..." />
        @error('title')
            <x-input-error :messages="$message" class="mt-2" />
        @enderror

        <x-select wire:model='category_id'>
            @foreach ($this->categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </x-select>
        @error('category_id')
            <x-input-error :messages="$message" class="mt-2" />
        @enderror

        <div class="flex justify-between mt-16">
            <button type="submit" class="py-2 px-4 bg-green-500 hover:bg-green-400 rounded-lg">Save</button>
            <x-danger-button type='button' wire:click='remove'>Remove</x-danger-button>
        </div>
    </form>
</div>
