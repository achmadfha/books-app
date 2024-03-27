<?php

use App\Http\Controllers\BooksController;
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
//    return view('welcome');
    return redirect('/dashboard');
});

Auth::routes(['register' => true]);

Route::get('/dashboard', [BooksController::class, 'index'])->name('dashboard');
Route::get('/books/add', [BooksController::class, 'add'])->name('books.add');
Route::post('/books/add', [BooksController::class, 'store'])->name('books.store');
Route::get('/books/{book}/edit', [BooksController::class, 'edit'])->name('books.edit');
Route::put('/books/{book}', [BooksController::class, 'update'])->name('books.update');
Route::get('/books/{book}', [BooksController::class, 'show'])->name('books.show');
Route::delete('/books/{book}', [BooksController::class, 'destroy'])->name('books.destroy');
