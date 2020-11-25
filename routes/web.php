<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/addBook',[BookController::class,'create'])->name('addBook');
Route::get('/book',[BookController::class,'index'])->name('book');
Route::get('/editBook/{book}',[BookController::class,'edit'])->name('editBook');
Route::post('/updateBook/{book}',[BookController::class,'update'])->name('updateBook');
Route::post('/deleteBook/{book}',[BookController::class,'destroy'])->name('deleteBook');

Route::get('/user',[UserController::class,'index'])->name('user');


Route::post('/storeBook',[BookController::class,'store'])->name('storeBook');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
