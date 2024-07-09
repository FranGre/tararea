<?php

use function Livewire\Volt\{layout, state, mount};
use App\Models\Task;

layout('layouts.base');

state(['tasks' => Task::where('user_id', Auth::user()->id)->get()]);

$changeStatus = function ($id) {
    $task = Task::findOrFail($id);
    $task->is_done = !$task->is_done;
    $task->save();
    $tasks = [];
    foreach ($this->tasks as $item) {
        if ($task->id === $item->id) {
            array_push($tasks, $task);
        } else {
            array_push($tasks, $item);
        }
    }
    $this->tasks = $tasks;
};
?>

<div>
    <ul>
        @foreach ($this->tasks as $task)
            <li wire:key='{{ $task->id }}'
                class="rounded-lg p-5 flex justify-between border border-slate-950 bg-gray-200">
                <div>
                    <small>{{ $task->category->title }}</small>
                    <p>{{ $task->title }}</p>
                </div>

                <x-primary-button wire:click='changeStatus({{ $task->id }})'>{{ $task->is_done ? 'Done' : 'Pending' }}</x-primary-button>
            </li>
        @endforeach
    </ul>
</div>
