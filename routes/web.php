<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColourController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Define project routes

Route::controller(ColourController::class)->group(function () {
    Route::prefix('colours')->group(function () {
        Route::GET('/index', 'index')->name('colours.index');
        Route::GET('/edit/{id}', 'edit')->name('colours.edit');
        Route::GET('/edit/not_found/{id}')->name('colours.errors.not_found');
        Route::POST('/save/{id}', 'save')->name('colours.save');
        Route::GET('/remove/{id}', 'remove')->name('colours.remove');
    });
});
