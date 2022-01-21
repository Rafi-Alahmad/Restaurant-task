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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


Route::group(
    ['middleware' => 'auth'],
    function () {


        Route::get('/settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings');
        Route::post('/settings/update', [App\Http\Controllers\SettingsController::class, 'update'])->name('settings.update');
        Route::get('/services', [App\Http\Controllers\RestaurantsServicesController::class, 'showServicesScreen'])->name('services');
        Route::post('/services/create', [App\Http\Controllers\RestaurantsServicesController::class, 'create'])->name('services.create');
        Route::post('/services/delete', [App\Http\Controllers\RestaurantsServicesController::class, 'delete'])->name('services.delete');
        Route::post('/services/update', [App\Http\Controllers\RestaurantsServicesController::class, 'update'])->name('services.update');
    }
);

Route::get('restaurant', [App\Http\Controllers\HomeController::class, 'showRestaurant'])->name('restaurant');

