<?php

use App\Http\Controllers\API\V1\PostController;
use App\Http\Controllers\API\V2\PostController as PostControllerV2;
use Illuminate\Support\Facades\Route;

Route::middleware('check.controller.version')->group(function () {
    Route::get('v2/posts', [PostControllerV2::class, 'index'])->name('api.post.index');
    Route::get('v2/posts/{post}', [PostControllerV2::class, 'show']);
    
    Route::get('v1/posts/{post}', [PostController::class, 'show']);
});
