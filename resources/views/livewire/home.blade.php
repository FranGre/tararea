<?php

use function Livewire\Volt\{layout, state, mount};
use App\Models\Task;

layout('layouts.base');

state(['tasks' => Task::where('user_id', Auth::user()->id)->get()]);
?>

<div class="text-center">
    <x-h1 class="mb-14">Home</x-h1>
    <div class="text-right mb-12">
        <a href="{{ route('task.create') }}" wire:navigate>New Task</a>
    </div>
    <livewire:list.tasks :tasks="$tasks" />
</div>