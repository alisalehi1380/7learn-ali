<?php

//use App\Http\Controllers\API\V2\PostController;
use Illuminate\Support\Facades\Route;

Route::middleware('check.controller.version')->group(function () {
    Route::get('v2/posts', [PostController::class, 'index']);
    Route::get('v2/posts/{post}', [PostController::class, 'show']);
    Route::get('v1/posts', [PostController::class, 'index']);
});
