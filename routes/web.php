<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PokemonController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout'); // Rimuovi questa rotta dopo i test


Route::get('/home', function () {
    return view('homepage');
})->name('home');

Route::get('/pokemon', function(){
    return view('pokemon');
})->name('pokemon');

Route::get('/contat-us', function(){
    return view('contat-us');
})->name('contat-us');

Route::get('/primaGen', function(){
    return view('primagen');
})->name('primaGen');

Route::get('/pokemon', [PokemonController::class, 'index']);

