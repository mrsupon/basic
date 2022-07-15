<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Dashboard\AboutController;
use App\Http\Controllers\Dashboard\BannerController;
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

// Route::get('/', function () {
//     return view('home.index');
// });

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home.index');
    Route::get('/about_page', 'show_about_page')->name('home.about_page');
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard/logout', 'destroy')->name('dashboard.logout');
});

Route::controller(ProfileController::class)->group(function () {
    Route::get('/dashboard/profiles/{id}', 'show')->name('dashboard.profiles.show');
    Route::get('/dashboard/profiles/{id}/edit', 'edit')->name('dashboard.profiles.edit');
    Route::put('/dashboard/profiles/{id}', 'update')->name('dashboard.profiles.update');
});

Route::controller(BannerController::class)->group(function () {
    Route::get('/dashboard/banners/{id}/edit', 'edit')->name('dashboard.banners.edit');
    Route::put('/dashboard/banners/{id}', 'update')->name('dashboard.banners.update');
});

Route::controller(AboutController::class)->group(function () {
    Route::get('/dashboard/abouts/{id}/edit', 'edit')->name('dashboard.abouts.edit');
    Route::put('/dashboard/abouts/{id}', 'update')->name('dashboard.abouts.update');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';
