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

// Route::get('/dashboard', function () {
//   return view('dashboard');
// })->name('dashboard')->middleware('auth');

Route::middleware('auth')->group(function () {
  Route::get('/', [MovieController::class, 'index'])->middleware(['cors'])->name('home');
  Route::get('/search/{title}', [MovieController::class, 'show'])->middleware(['cors'])->name('movie');
  Route::get('/watchlist', [WatchListController::class, 'index'])->name('watchlist');
  Route::post('/watchlist', [WatchListController::class, 'store'])->name('watchlist.store');
});

require __DIR__ . '/auth.php';
