<?php

use App\Models\Book;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TransactionsController;
// dd(request()->url(), request()->method());
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
// Books Routes
Route::get('/books', [BooksController::class, 'index']);
Route::put('/books/{book}/unavailable', [BooksController::class, 'unavailable']);
Route::put('/books/{book}/available', [BooksController::class, 'available']);
Route::get('/books/create', [BooksController::class, 'create']);
Route::post('/books', [BooksController::class, 'store']);
Route::get('/books/{book}', [BooksController::class, 'show']);
Route::get('/books/{book}/edit', [BooksController::class, 'edit']);
Route::put('/books/{book}', [BooksController::class, 'update']);
Route::delete('/books/{book}', [BooksController::class, 'destroy']);

// Authors Routes
Route::get('/authors', [AuthorsController::class, 'index']);
Route::get('/authors/create', [AuthorsController::class, 'create']);
Route::post('/authors', [AuthorsController::class, 'store']);
Route::get('/authors/{author}', [AuthorsController::class, 'show']);
Route::get('/authors/{author}/edit', [AuthorsController::class, 'edit']);
Route::put('/authors/{author}', [AuthorsController::class, 'update']);
Route::delete('/authors/{author}', [AuthorsController::class, 'destroy']);

// Categories Routes
Route::get('/categories', [CategoriesController::class, 'index']);

// Transactions Routes
Route::get('/transactions', [TransactionsController::class, 'index']);
Route::get('/transactions/create', [TransactionsController::class, 'create']);
Route::post('/transactions', [TransactionsController::class, 'store']);
Route::get('/transactions/{transaction}', [TransactionsController::class, 'show']);
Route::get('/transactions/{transaction}/edit', [TransactionsController::class, 'edit']);
Route::put('/transactions/{transaction}', [TransactionsController::class, 'update']);
Route::delete('/transactions/{transaction}', [TransactionsController::class, 'destroy']);