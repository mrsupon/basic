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
    return view('frontend.index');
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard/logout', 'destroy')->name('dashboard.logout');
});

Route::controller(ProfileController::class)->group(function () {
    Route::get('/dashboard/profiles/{id}', 'show')->name('dashboard.profiles.show');
    Route::get('/dashboard/profiles/{id}/edit', 'edit')->name('dashboard.profiles.edit');
    Route::put('/dashboard/profiles/{id}', 'update')->name('dashboard.profiles.update');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';
