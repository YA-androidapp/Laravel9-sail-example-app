<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::controller(ItemController::class)->prefix('items')->name('items')->group(function() {
    Route::get('/', 'list');
    Route::get('/create', 'create')->name('.create');
    Route::post('/create', 'store')->name('.store');
    Route::get('/{item}', 'show')->name('.show');
    Route::get('/{item}/edit', 'edit')->name('.edit');
    Route::put('/{item}', 'update')->name('.update');
    Route::delete('/{item}', 'destroy')->name('.destroy');
});

require __DIR__.'/auth.php';
