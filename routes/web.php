<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::view('/', 'welcome')->name('welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Volt::route('home', 'home')->name('home');
Volt::route('create-category', 'create.categoryform')->name('category.create');
Volt::route('create-task', 'create.taskform')->name('task.create');

require __DIR__ . '/auth.php';
