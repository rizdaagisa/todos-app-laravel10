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

Route::get('/', [App\Http\Controllers\TodoController::class, 'index'])->name('todos.index');

Auth::routes();

//Route data view
Route::get('/todos', [App\Http\Controllers\TodoController::class, 'index'])->name('todos.index');
Route::get('/todos/create', [App\Http\Controllers\TodoController::class, 'create'])->name('todos.create');
Route::get('/todos/details/{id}', [App\Http\Controllers\TodoController::class, 'details'])->name('todos.details');

//route data service
Route::post('/todos/save', [App\Http\Controllers\TodoController::class, 'save'])->name('todos.save');
Route::post('/todos/update/{id}', [App\Http\Controllers\TodoController::class, 'update'])->name('todos.update');
Route::get('/todos/delete/{id}', [App\Http\Controllers\TodoController::class, 'delete'])->name('todos.delete');