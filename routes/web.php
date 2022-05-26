<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\WatchListController;

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

Route::get('/', [MovieController::class, 'index'])->middleware(['auth'])->middleware(['cors'])->name('home');
Route::get('/watchlist', [WatchListController::class, 'index'])->middleware(['auth'])->name('watchlist');
Route::get('/tes', function () {
  return view('tes');
});

require __DIR__ . '/auth.php';
