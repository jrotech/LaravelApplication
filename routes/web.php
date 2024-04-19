<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','verified'])->group(function () {
    
Route::get('/project', [ProjectController::class, 'index'])-> name('project.index');
Route::get('/project/create', [ProjectController::class, 'create'])-> name('project.create');
Route::post('/project', [ProjectController::class, 'store'])->name('project.store');
Route::get('/project/{project}', [ProjectController::class, 'show'])->name('project.show');
Route::get('/project/{project}/edit', [ProjectController::class,'edit'])-> name('project.edit');
Route::put('/project/{project}', [ProjectController::class, 'update'])->name('project.update');
Route::delete('/project/{project}', [ProjectController::class,'delete'])->name('project.destroy');
Route::get('/projects/all', [ProjectController::class, 'all'])->name('project.all');


//Route::resource('project', ProjectController::class);
});

Route::redirect('/','/project/all')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
