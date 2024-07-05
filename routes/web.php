<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\creatorController;

use \App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


Route::get('/items', [ItemController::class, 'index'])->name('items.index')->middleware(AdminMiddleware::class);
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create')->middleware(AdminMiddleware::class);
Route::post('/items', [ItemController::class, 'store'])->name('items.store')->middleware(AdminMiddleware::class);
Route::delete('/items/{items}', [ItemController::class, 'destroy'])->name('items.destroy')->middleware(AdminMiddleware::class);
Route::get('/items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit')->middleware(AdminMiddleware::class);
Route::put('/items/{item}', [ItemController::class, 'update'])->name('items.update')->middleware(AdminMiddleware::class);
Route::get('/items/{id}', [ItemController::class, 'show'])->name('items.show')->middleware(AdminMiddleware::class);

Route::resource('creators', CreatorController::class)->middleware(AdminMiddleware::class);




require __DIR__.'/auth.php';