<?php

use App\Http\Controllers\TodoController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/todo',[TodoController::class,'index'])->name('todo.index');
Route::get('/todo/{todo}',[TodoController::class,'show'])->name('todo.show');
Route::get('/create',[TodoController::class,'create'])->name('todo.create');
Route::post('/todo/new',[TodoController::class,'store'])->name('todo.store');
Route::get('/todo/{todo}/edit',[TodoController::class,'edit'])->name('todo.edit');
Route::put('/todo/{todo}/edit',[TodoController::class,'update'])->name('todo.update');
Route::put('/todo/{todo}/completed',[TodoController::class,'completed'])->name('changeStatus');
Route::delete('/todo/{todo}/destroy',[TodoController::class,'destroy'])->name('todo.destroy');