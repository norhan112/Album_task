<?php

use Illuminate\Support\Facades\Route;
#Controllers
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\PictureController;


Route::get('/',  function () {
    return view('welcome');
});
Route::post('login', [LoginController::class, 'login'])->name('login');

Route::get('/home',  function () {
    return view('home');
})->name('home');

//Albums routes
Route::get('albums', [AlbumController::class, 'index'])->name('albums.index');
//create Album
Route::get('albums/create', [AlbumController::class, 'create'])->name('albums.create');
//Store Album
Route::post('albums/store', [AlbumController::class, 'store'])->name('albums.store');
//edite Album
Route::get('/albums/{album}/edit',[AlbumController::class,'edit'])->name('albums.edit');
Route::put('/albums/{album}/update',[AlbumController::class,'update'])->name('album.update');

//Delete album
Route::delete('/albums/{album}/delete',[AlbumController::class ,'destroy'])->name('destroy.album');
//Show all images related to album
Route::get('/albums/{album}', [AlbumController::class, 'showImages'])->name('albums.show');

//add image
Route::post('albums/{album}/pictures', [PictureController::class, 'store'])->name('pictures.store');
//move images to other album
Route::post('/album/{album}/movepic',[PictureController::class ,'movepictures'])->name('move.pictures');



