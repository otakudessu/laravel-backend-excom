<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('auth.auth-login');
});


// Route::get('/dashboard', function () {
//     return view('pages.dashboard', ['type_menu' => 'dashboard']);
// });

Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        return view('pages.dashboard', ['type_menu' => 'home']);
    })->name('home');

    Route::get('user/profil/{id}', [ProfilController::class, 'profil'])->name('user.profil');
    Route::put('user/updateProfile/{id}', [ProfilController::class, 'updateProfile'])->name('user.updateProfile');

    Route::resource('user', UserController::class);
    Route::resource('product', ProductController::class);

});
