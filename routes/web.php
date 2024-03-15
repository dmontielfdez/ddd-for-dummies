<?php

use Dmontielfdez\Core\Food\Infrastructure\Controllers\FoodController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [FoodController::class, 'index'])->name('food.index');
Route::post('/food', [FoodController::class, 'create'])->name('food.create');
Route::post('/{foodId}/publish', [FoodController::class, 'publish'])->name('food.publish');





