<?php

use Illuminate\Support\Facades\Route;

Route::middleware('check.controller.version')->group(function () {
    Route::get('v2/posts', [PostController::class, 'index'])->name('api.post.index');
    Route::get('v2/posts/{post}', [PostController::class, 'show']);
    Route::get('v1/posts', [PostController::class, 'index']);
});
