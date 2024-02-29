<?php

use App\Http\Controllers\DoneController;
use App\Http\Controllers\OverdueController;
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

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    });
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/todo', [TodoController::class, 'index'])->name('todo.index');
    Route::post('/todo/store', [TodoController::class, 'store'])->name('todo.store');
    Route::put('/todo/mark/{id}', [TodoController::class, 'mark']);
    Route::get('/todo/edit', [TodoController::class, 'edit'])->name('todo.edit');
    Route::post('/todo/update', [TodoController::class, 'update'])->name('todo.update');
    Route::delete('/todo/delete', [TodoController::class, 'delete'])->name('todo.delete');
    Route::get('/done', [DoneController::class, 'index'])->name('done.index');
    Route::get('/overdue', [OverdueController::class, 'index'])->name('overdue.index');
    Route::get('/overdue/edit', [OverdueController::class, 'edit'])->name('overdue.edit');
    Route::post('/overdue/update', [OverdueController::class, 'update'])->name('overdue.update');
    Route::delete('/overdue/delete', [OverdueController::class, 'delete'])->name('overdue.delete');
    Route::post('/overdue/check', [OverdueController::class, 'check'])->name('overdue.check');
});
