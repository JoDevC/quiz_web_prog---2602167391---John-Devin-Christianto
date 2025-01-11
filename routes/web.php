<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;

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
Route::get('/', [MovieController::class,'home'])->name('home');
Route::get('movie/create', [MovieController::class,'create'])->name('movie.create');
Route::post('movie/store', [MovieController::class,'store'])->name('movie.store');
Route::delete('movie/delete/{movie}',[MovieController::class,'delete'])->name('movie.delete');

//create
Route::get('book_form',[BookController::class,'viewForm'])->name('book.create');
Route::get('book/{book}', [BookController::class,'showDetail'])->name('book.detail');
Route::get('book_list', [BookController::class, 'showList'])->name('book.list');
Route::post('book_store',[BookController::class,'store'])->name('book.store');
//update
Route::put('book_update/{book}',[BookController::class,'update'])->name('book.update');

//delete
Route::delete('book_delete/{id}',[BookController::class,'delete'])->name('book.delete');
//Route::<http_method>(url,callback);

