<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/halo', function () {
    return '<h1>Halo, Gamelab Indonesia</h1>';
});

// Route::get('/user/{id}', function ($id) {
//     return '<h1>Ini adalah halaman user : ' . $id . '</h1>';
// });

Route::get('/profil', function () {
    return view('profil');
})->name('profil');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return 'Halaman Admin';
    });

    Route::get('/artikel', function () {
        return 'Daftar Artikel';
    });
});

// Route::get('/about', [aboutController::class, 'index']);

// Route::get('profil', [ProfileController::class, 'index']);

// Route::redirect('/here', '/there');

// Route::view('/welcome', 'welcome');

// Route::view('/welcome', 'welcome', ['name' => 'Taylor']);

Route::resource('/artikel', \App\Http\Controllers\ArtikelController::class);
Route::get('/user', [UserController::class,'index']);




