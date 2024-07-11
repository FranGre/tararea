<?php

use function Livewire\Volt\{state};
use App\Livewire\Actions\Logout;

$logout = function (Logout $logout) {
    $logout();

    $this->redirect('/', navigate: true);
};

?>

<nav class="mb-16 flex justify-between">
    <div class="space-x-6">
        <a href="{{ route('home') }}" wire:navigate>Home</a>
        <a href="{{ route('categories') }}" wire:navigate>Category</a>
    </div>
    <div class="space-x-6">
        <a href="{{ route('profile') }}" wire:navigate>Profile</a>
        <button wire:click='logout'>Log out</button>
    </div>
</nav>
