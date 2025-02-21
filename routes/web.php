<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/project/all', [ProjectController::class, 'all'])->name('project.all');
Route::post('/project/search', [ProjectController::class, 'search'])->name('project.search');
Route::get('/project/notlogged/{project}', [ProjectController::class,'show_notlogged'])->name('project.show_notlogged');
Route::redirect('/','/project/all')->name('dashboard');

Route::middleware(['auth'])->group(function () {
Route::get('/project', [ProjectController::class, 'index'])-> name('project.index');
Route::get('/project/create', [ProjectController::class, 'create'])-> name('project.create');
Route::post('/project', [ProjectController::class, 'store'])->name('project.store');
Route::get('/project/{project}', [ProjectController::class, 'show'])->name('project.show');
Route::get('/project/{project}/edit', [ProjectController::class,'edit'])-> name('project.edit');
Route::put('/project/{project}', [ProjectController::class, 'update'])->name('project.update');
Route::delete('/project/{project}', [ProjectController::class,'destroy'])->name('project.destroy');


//Route::resource('project', ProjectController::class);
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
