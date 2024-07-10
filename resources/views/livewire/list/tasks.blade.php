<?php

use function Livewire\Volt\{state};
use App\Models\Task;

state(['tasks']);

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

$remove = function ($id) {
    $backup = $this->tasks;

    $task = Task::findOrFail($id);
    $tasks = [];
    foreach ($this->tasks as $item) {
        if ($task->id !== $item->id) {
            array_push($tasks, $item);
        }
    }
    $this->tasks = $tasks;
    $task->delete();
};

?>

<div>
    @if (count($tasks) === 0)
        <p>No hay tareas :(</p>
    @else
        <ul>
            @foreach ($this->tasks as $task)
                <a href="{{ route('task.edit', $task->id) }}" wire:navigate>
                    <li wire:key='{{ $task->id }}'
                        class="mb-9 rounded-lg p-5 flex justify-between border items-center cursor-pointer border-black
            bg-gray-200 hover:bg-gray-300
            dark:bg-neutral-600 dark:hover:bg-neutral-700">
                        <div>
                            <small>{{ $task->category->title }}</small>
                            <p>{{ $task->title }}</p>
                        </div>

                        <div class="space-x-6">
                            <x-primary-button
                                wire:click='changeStatus({{ $task->id }})'>{{ $task->is_done ? 'Done' : 'Pending' }}</x-primary-button>
                            <x-danger-button wire:click='remove({{ $task->id }})'>Remove</x-danger-button>
                        </div>
                    </li>
                </a>
            @endforeach
        </ul>
    @endif
</div>
