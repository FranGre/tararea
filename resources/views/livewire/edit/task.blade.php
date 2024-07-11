<?php

use function Livewire\Volt\{layout, state, rules, mount};
use App\Models\Task;
use App\Models\Category;

layout('layouts.base');

state('task_id')->url();
state(['task', 'title', 'category_id', 'is_done', 'categories']);

rules(['title' => 'required|string|max:100', 'category_id' => 'required|integer|exists:categories,id', 'is_done' => 'required|boolean']);

mount(function () {
    $this->task = Task::findOrFail($this->task_id);
    $this->title = $this->task->title;
    $this->category_id = $this->task->category_id;
    $this->is_done = $this->task->is_done;

    $this->categories = Category::where('user_id', Auth::user()->id)->get();
});

$save = function () {
    $this->validate();

    $this->task->title = $this->title;
    $this->task->category_id = $this->category_id;
    $this->task->is_done = $this->is_done ? 1 : 0;
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

        <fieldset class="mt-14">
            <div>
                <input type="radio" wire:model='is_done' value="1" {{ $task->is_done ? 'checked' : '' }} />
                <label>DONE ✅</label>
            </div>

            <div>
                <input type="radio" wire:model='is_done' value="0" {{ !$task->is_done ? 'checked' : '' }} />
                <label>TODO 📝</label>
            </div>
        </fieldset>

        <div class="flex justify-between mt-16">
            <button type="submit" class="py-2 px-4 bg-green-500 hover:bg-green-400 rounded-lg">Save</button>
            <x-danger-button type='button' wire:click='remove'>Remove</x-danger-button>
        </div>
    </form>
</div>
