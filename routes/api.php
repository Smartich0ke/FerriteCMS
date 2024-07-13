<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostTagsController;
use App\Http\Controllers\SocialLinkController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware(['api'])->group(function () {
    Route::post('/posts/{postId}/tags', [postTagsController::class, 'store']);
    Route::delete('/posts/{postId}/tags', [postTagsController::class, 'destroy']);
    Route::get('/posts/{postId}/tags', [postTagsController::class, 'index']);
});

Route::middleware(['api'])->group(function () {
    Route::get('/social-links', [SocialLinkController::class, 'get']);
    Route::post('/social-links', [SocialLinkController::class, 'store']);
    Route::put('/social-links/order', [SocialLinkController::class, 'updateOrder']);
    Route::put('/social-links/{id}', [SocialLinkController::class, 'update']);
    Route::delete('/social-links/{id}', [SocialLinkController::class, 'destroy']);

});

Route::post('/comments/{id}/like', [CommentController::class, 'like'])->middleware(['EnsureAnonymousSessionTokenExists']);
Route::get('/comments/{id}/likes', [CommentController::class, 'likes']);
