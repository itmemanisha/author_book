<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\PublishController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('authors', AuthorController::class);
Route::resource('books', BookController::class);

Route::prefix('publishers')->group(function () {
    Route::get('/', [PublishController::class, 'index'])->name('publishers.index');
    Route::get('create', [PublishController::class, 'create'])->name('publishers.create');
    Route::post('store', [PublishController::class, 'store'])->name('publishers.store');
    Route::get('{id}/edit', [PublishController::class, 'edit'])->name('publishers.edit');
    Route::put('{id}', [PublishController::class, 'update'])->name('publishers.update');
    Route::delete('{id}', [PublishController::class, 'destroy'])->name('publishers.destroy');
    Route::get('{id}', [PublishController::class, 'show'])->name('publishers.show');
});

Route::post('/chat', [ChatbotController::class, 'handle']);
Route::view('/chatbot', 'chatbot');
