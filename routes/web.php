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
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/weather', [App\Http\Controllers\WeatherController::class, 'index'])->name('weather');
    Route::get('/weather/{dayname}/{id}', [App\Http\Controllers\WeatherController::class, 'show']);
    Route::post('/home', [App\Http\Controllers\HomeController::class, 'post_preferred_location']);
});