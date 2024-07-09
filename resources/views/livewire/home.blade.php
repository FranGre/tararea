<?php

use function Livewire\Volt\{layout, state, mount};
use App\Models\Task;

layout('layouts.base');

state(['tasks' => Task::where('user_id', Auth::user()->id)->get()]);
?>

<div>
    <x-h1 class="mb-14">Home</x-h1>
    <livewire:list.tasks :tasks="$tasks" />
</div>
