<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::view('/', 'welcome')->name('welcome');

Volt::route('login', 'pages.login')->name('login');
Volt::route('register', 'pages.register')->name('register');

Volt::route('home', 'home')->name('home');

Route::view('profile', 'profile')->name('profile');

Volt::route('categories', 'categories')->name('categories');
Volt::route('new/category', 'create.categoryform')->name('category.create');
Volt::route('category/{category_id}/edit', 'edit.categoryform')->name('category.edit');

Volt::route('new/task', 'create.taskform')->name('task.create');
Volt::route('task/{task_id}/edit', 'edit.task')->name('task.edit');

require __DIR__ . '/auth.php';