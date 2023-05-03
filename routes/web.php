<?php

use Illuminate\Support\Facades\Route;

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

//Admin Routes
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('admin.dashboard');

Route::get('/admin/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('admin.posts.create')->middleware(['auth']);
Route::post('/admin/posts/create', [App\Http\Controllers\PostController::class, 'store'])->name('admin.posts.store')->middleware(['auth']);
Route::post('/admin/posts/create/banner-upload', [App\Http\Controllers\PostController::class, 'uploadBannerImage'])->name('admin.posts.upload-banner-image')->middleware(['auth']);
Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
Route::get('/admin/posts', [App\Http\Controllers\PostController::class, 'adminIndex'])->name('admin.posts.index');
Route::post('/admin/posts/{id}/private', [App\Http\Controllers\PostController::class, 'makePrivate'])->name('admin.posts.private')->middleware(['auth']);
Route::post('/admin/posts/{id}/publish', [App\Http\Controllers\PostController::class, 'makePublic'])->name('admin.posts.publish')->middleware(['auth']);
Route::get('/admin/posts/{slug}/edit', function () {
    return view('admin.posts.edit');
})->name('admin.posts.edit');


Route::get('/admin/comments', function () {
    return view('admin.comments.index');
})->name('admin.comments.index');

Route::get('/admin/images', function () {
    return view('admin.images.index');
})->name('admin.images.index');

Route::get('/admin/files', function () {
    return view('admin.files.index');
})->name('admin.files.index');

Route::get('/admin/rubbish-bin', function () {
    return view('admin.rubbish_bin');
})->name('admin.rubbish-bin.index');

//Public Routes
Route::get('/', function () {
    return view('root');
})->name('root');
Route::get('/about', function () {
    return view('static.about');
})->name('about');
Route::get('/gallery', function () {
    return view('gallery.index');
})->name('gallery.index');

Route::get('/tags', function () {
    return view('tags.index');
})->name('tags.index');

Route::get('/categories', function () {
    return view('categories.index');
})->name('categories.index');

Route::get('/posts/{slug}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
