<?php

use Illuminate\Support\Facades\{Route,Auth};
use App\Http\Controllers\{HomeController, CategoriesController, RangeController, TransactionsController};

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


Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource("categories", CategoriesController::class);
Route::post("/range", [RangeController::class, "range"]);
Route::resource("transactions", TransactionsController::class);
