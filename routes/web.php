<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\todosController;


// Home Route
Route::get('/', [todosController::class, 'index'])->name("todo.home");

// Display Create Form
Route::get('/create', function () {
    return view('create');
})->name("todo.create");

// Handle Create Form Submission
Route::post('/create', [todosController::class, 'store'])->name("todo.store");

// Edit Route (Display Form)
Route::get('/edit/{id}', [todosController::class, 'edit'])->name("todo.edit");

// Update Route (Handle Form Submission)
Route::post('/edit/{id}', [todosController::class, 'update'])->name("todo.update");

// Update Data Route
Route::post('/update', [todosController::class, 'updateData'])->name("todo.updateData");

// Delete Route
Route::get('/delete/{id}', [todosController::class, 'delete'])->name("todo.delete");


Route::post('/todo/store', [todosController::class, 'store'])->name('todo.store');

