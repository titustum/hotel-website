<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::livewire('/', 'pages::home')->name('home');
Route::livewire('/book-conference', 'pages::book-conference')->name('book.conference');
Route::livewire('/book-room', 'pages::book-room')->name('book.room');
Route::livewire('/restaurant', 'pages::restaurant')->name('restaurant');
Route::livewire('/accommodation', 'pages::accommodation')->name('accommodation');
Route::livewire('/restaurant/category/{categorySlug}', 'pages::menu-category')->name('menu.category');
Route::livewire('/about', 'pages::about-us')->name('about');
Route::livewire('/contact', 'pages::contact-us')->name('contact');
Route::livewire('/gallery', 'pages::gallery')->name('gallery');
Route::livewire('/conference', 'pages::conference-rooms')->name('conference');
