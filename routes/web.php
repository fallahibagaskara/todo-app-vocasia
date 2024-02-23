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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/todo', function () {
        return view('pages.todo');
    })->name('todo');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/todo', [TodoController::class, 'index'])->name('todo.index');
    Route::get('/done', [DoneController::class, 'index'])->name('done.index');
    Route::get('/overdue', [OverdueController::class, 'index'])->name('overdue.index');
});
