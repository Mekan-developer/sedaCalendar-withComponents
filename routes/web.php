<?php

use App\Http\Controllers\Admin\AudioPoemController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\PoemController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class,'index'])->name('main');

Route::get('/show-poem/{poem}',[UserController::class,'showPoem'])->name('show-poem');
Route::get("/locale/{lang}",[LanguageController::class,'changeLang'])->name('change.locale');

Route::get('/dashboard', [HomeController::class,'index'])->middleware(['auth', 'verified'])->name('admin.home');

Route::middleware('auth')->group(function () {
    Route::get('/admin/poem', [PoemController::class, 'index'])->name('admin.poem');
    Route::post('/admin/poem/store', [PoemController::class, 'store'])->name('poem.store');
    Route::get('/admin/poem/edit/{poem}', [PoemController::class, 'edit'])->name('poem.edit');
    Route::post('/admin/poem/update', [PoemController::class, 'update'])->name('poem.update');
    Route::put('/admin/poem/active/{poem}', [PoemController::class, 'active'])->name('poem.active');
    Route::delete('/admin/poem/delete/{poem}', [PoemController::class, 'destroy'])->name('poem.delete');

    Route::get('/admin/audio-poem', [AudioPoemController::class, 'index'])->name('admin.audioPoem');
    Route::put('/admin/audio-poem/active/{audioPoem}', [AudioPoemController::class, 'active'])->name('audioPoem.active');
    Route::get('/admin/audio-poem/edit/{audioPoem}', [AudioPoemController::class, 'edit'])->name('audioPoem.edit');
    Route::put('/admin/audio-poem/update/{audioPoem}', [AudioPoemController::class, 'update'])->name('audioPoem.update');
    Route::post('/admin/audio-poem/store', [AudioPoemController::class, 'store'])->name('audioPoem.store');
    Route::delete('/admin/audio-poem/delete/{audioPoem}', [AudioPoemController::class, 'destroy'])->name('audioPoem.delete');

    Route::get('/admin/gallery', [ImageController::class, 'index'])->name('admin.gallery');
    Route::post('/admin/gallery/store', [ImageController::class, 'store'])->name('gallery.store');
    Route::put('/admin/gallery/{image}', [ImageController::class, 'update'])->name('image.update');
    Route::delete('/admin/gallery/{image}', [ImageController::class, 'destroy'])->name('image.delete');

    Route::get('/admin/controll',[UserController::class,'admins'])->name('admin.controll');
    // Route::post('/admin/create',[UserController::class,'create'])->name('admin.create');
});

require __DIR__.'/auth.php';
