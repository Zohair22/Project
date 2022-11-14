<?php

use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:web')->group(function () {
//    home page
    Route::get('/', [PostController::class, 'index'])->name('dashboard');

//    Movies
    Route::prefix('/movie')->controller(PostController::class)->group(function () {
        Route::get('/{movie}', 'show')->name('movie');
    });

});


//AdminPartition
Route::middleware('guest:admin')->group(function () {
    Route::prefix('/admin')->controller(AdminController::class)->group(function () {
        Route::get('/login', 'index')->name('adminLogin');
        Route::post('/login', 'login')->name('adminLoged');
    });
});

Route::middleware('auth:admin')->group(function () {
    // home page
    Route::get('/admin', [PostController::class, 'indexAdmin'])->name('dashboardAdmin');

    // Movies
    Route::prefix('/admin/movie')->controller(PostController::class)->group(function () {
        Route::get('/{movie}', 'AdminShowMovie')->name('movie');
        Route::get('/{movie}/edit', 'AdminShowMovie')->name('editMovie');
        Route::get('/{movie}/delete', 'destroy')->name('deleteMovie');
    });

    Route::post('/logoutAdmin', [AdminController::class, 'destroy'])->name('logoutAdmin');
});

require __DIR__.'/auth.php';
