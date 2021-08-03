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

Route::get('/albums', [AlbumController::class, 'index'])->middleware('auth');
Route::get('/albums/new', [AlbumController::class, 'new'])->middleware('auth');
Route::post('/albums/create', [AlbumController::class, 'create'])->middleware('auth');
Route::get('/album/{id}/edit', [AlbumController::class, 'edit'])->middleware('auth');
Route::post('/albums/update/{id}', [AlbumController::class, 'update'])->middleware('auth');
Route::delete('/albums/delete/{id}', [AlbumController::class, 'delete'])->middleware('auth');
Route::get('/artistList', [ArtistListController::class, 'getList'])->middleware('auth');
Route::get('/artist/{id}', [ArtistListController::class, 'get'])->middleware('auth');