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

Route::get('/', function () {
    //dd(\Illuminate\Support\Facades\Storage::url(\App\Models\Product::all()->first()->image));
    return view('welcome');
});

Route::resource('products' , \App\Http\Controllers\ProductsController::class)->only('store' , 'index');
Route::get('products/filter/{category_id}' , [\App\Http\Controllers\ProductsController::class , 'filter']);

Route::get('products/sort/{sort}' , [\App\Http\Controllers\ProductsController::class , 'sort']);
