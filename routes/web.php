<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\CardController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


Route::get('/boxes', [BoxController::class, 'index'])->name('boxes');
Route::post('/boxes', [BoxController::class, 'store'])->name('box-store');
Route::get('/boxes/{box}-{slug}', [BoxController::class, 'show'])->name('box_details');
Route::put('boxes/{box}', [BoxController::class, 'update'])->name('box_update'); 
Route::delete('/boxes/{box}', [BoxController::class, 'destroy'])->name('box-destroy');    
   
Route::post('/cards', [CardController::class, 'store'])->name('card-store');
Route::get('/cards/{card}-{slug}', [CardController::class, 'show'])->name('card_details');
Route::put('cards/{card}', [CardController::class, 'update'])->name('card_update'); 
Route::delete('/cards/{card}', [CardController::class, 'destroy'])->name('card-destroy');

