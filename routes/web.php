<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController as home;
use \App\Http\Controllers\PostController as post;
use \App\Http\Controllers\LoginController as login;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [home::class, 'home'])->name('home');

Route::get('/login', [login::class, 'login'])->name('login');
Route::post('/log', [login::class, 'log'])->name('log');
Route::post('/logout', [login::class, 'logout'])->name('logout');
Route::get('/registrasi', [login::class, 'registrasi'])->name('registrasi');
Route::post('/reg', [login::class, 'reg'])->name('reg');
Route::get('/create/{id}', [post::class, 'create'])->name('create');
Route::post('/post/{id}', [post::class, 'store'])->name('post');
Route::get('/edit/{id}', [post::class, 'edit'])->name('edit');
Route::put('/update/{id}', [post::class, 'update'])->name('update');
Route::delete('/delete/{id}', [post::class, 'trash'])->name('delete');


Route::group([
    'middleware' => ['auth:api']
], function(){
});

