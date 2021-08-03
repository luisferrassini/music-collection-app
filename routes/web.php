<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistListController;

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

Route::group(['middleware' => 'web'], function () {
    Route::get('/', [HomeController::class, 'index']);
    Auth::routes();
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::group(['middleware' => 'auth'], function () { 
    Route::get('/albums', [AlbumController::class, 'index']);
    Route::get('/albums/new', [AlbumController::class, 'new']);
    Route::post('/albums/create', [AlbumController::class, 'create']);
    Route::get('/album/{id}/edit', [AlbumController::class, 'edit']);
    Route::post('/albums/update/{id}', [AlbumController::class, 'update']);
    Route::delete('/albums/delete/{id}', [AlbumController::class, 'delete']);
    Route::get('/artistList', [ArtistListController::class, 'getList']);
    Route::get('/artist/{id}', [ArtistListController::class, 'get']);
});