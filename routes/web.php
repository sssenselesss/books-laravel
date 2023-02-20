<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',[\App\Http\Controllers\IndexController::class,'main'])->name('main');
Route::get('/reg',[\App\Http\Controllers\IndexController::class,'reg'])->name('reg');
Route::get('/auth',[\App\Http\Controllers\IndexController::class,'auth'])->name('auth');

Route::get('/single/{book:id}/update',[\App\Http\Controllers\IndexController::class,'update'])->name('book.update');



Route::get('/single/{id}',[\App\Http\Controllers\BookController::class,'show'])->name('single');
Route::get('/single/{id}/delete',[\App\Http\Controllers\BookController::class,'destroy'])->name('book.delete');
Route::post('/single/{id}/update',[\App\Http\Controllers\BookController::class,'update'])->name('book.updatePost');





Route::get('/BookAdd',[\App\Http\Controllers\IndexController::class,'createBooks'])->name('add');
Route::post('/BookAdd/create',[\App\Http\Controllers\BookController::class,'store'])->name('book.create');


Route::controller(\App\Http\Controllers\AuthController::class)->group(function (){
    Route::post('/signup','signup')->name('register');
    Route::post('/signin','signin')->name('login');
    Route::get('/logout','logout')->name('logout');
});


