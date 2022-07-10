<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\DashboardController;

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

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard/logout', 'destroy')->name('dashboard.logout');
});

Route::controller(ProfileController::class)->group(function () {
    Route::get('/dashboard/profiles', 'index')->name('dashboard.profiles.index');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';
