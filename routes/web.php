<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
//Route::get('/', function () {
//  $category= \App\Models\Product::factory()->
//    return 'ok';
//});
//Route::get('/', function () {
//    return view('livewire.discount');
//});
Route::get('/discount', function () {
    return view('livewire.admin.discounts');
});
Route::get('/category', function () {
    return view('livewire.admin.categories');
});
Route::get('/', function () {
    return view('layouts.base');
});

