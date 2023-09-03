<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostTagsController;
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

// Static Routes
Route::get('/', function () {
    return view('root');
})->name('root');
Route::get('/about', function () {
    return view('static.about');
})->name('about');

// Post Routes
//==================================================================================================
Route::controller(PostController::class)->group(function () {

    // Public Post Routes
    Route::get('/posts', 'index')->name('posts.index');
    Route::get('/posts/search', 'search')->name('posts.search.index');
    Route::get('/posts/{slug}', 'show')->name('posts.show')->middleware(['EnsureAnonymousSessionTokenExists']);

    // Admin Post Routes
    Route::get('/admin/posts', 'adminIndex')->name('admin.posts.index');
    Route::get('/admin/posts/create', 'create')->name('admin.posts.create')->middleware(['auth']);
    Route::post('/admin/posts/create', 'store')->name('admin.posts.store')->middleware(['auth']);
    Route::get('/admin/posts/{slug}/edit', 'edit')->name('admin.posts.edit');
    Route::post('/admin/posts/{slug}/edit', 'update')->name('admin.posts.update');
    Route::post('/admin/posts/{id}/private', 'makePrivate')->name('admin.posts.private')->middleware(['auth']);
    Route::post('/admin/posts/{id}/publish', 'makePublic')->name('admin.posts.publish')->middleware(['auth']);
    Route::post('/admin/posts/create/banner-upload', 'uploadBannerImage')->name('admin.posts.upload-banner-image')->middleware(['auth']);

});

// Category Routes
//==================================================================================================
Route::controller(CategoryController::class)->group(function () {

    // Public Category Routes
    Route::get('/categories', 'index')->name('categories.index');
    Route::get('categories/{slug}', 'show')->name('categories.show');

    // Admin Category Routes
    Route::get('/admin/categories', 'adminIndex')->name('admin.categories.index');
    Route::get('/admin/categories/create', 'create')->name('admin.categories.create');
    Route::post('/admin/categories/create', 'store')->name('admin.categories.store');
    Route::delete('/admin/categories/{id}/delete', 'destroy')->name('admin.categories.destroy');

});

// Image Routes
//==================================================================================================
Route::controller(ImageController::class)->group(function () {

    // Public Image Routes
    Route::get('/gallery', 'gallery')->name('gallery.index');

    // Admin Image Routes
    Route::get('/admin/images', 'index')->name('admin.images.index');
    Route::get('/images/create', 'create')->name('images.create');
    Route::post('/images/create', 'store')->name('images.store');
    Route::delete('/images/{id}/delete', 'destroy')->name('images.destroy');

});

// File Routes
//==================================================================================================
Route::controller(FileController::class)->group(function () {

    // Public File Routes
    Route::get('/files/{id}/download', 'download')->name('files.download');

    // Admin File Routes
    Route::get('/admin/files', 'index')->name('admin.files.index');
    Route::get('/admin/files/create', 'create')->name('admin.files.create');
    Route::post('/admin/files/create', 'store')->name('admin.files.store');
    Route::delete('/admin/files/{id}/delete', 'destroy')->name('admin.files.destroy');

});

// Comment Routes
//==================================================================================================
Route::controller(CommentController::class)->group(function() {

    // Public Comment Routes
    Route::post('comments/create', 'store')->name('comments.store');
    Route::post('/comments/create', 'store')->name('comments.store');

    // Admin Comment Routes
    Route::get('/admin/comments', 'adminIndex')->name('admin.comments.index');
    Route::delete('/admin/comments/{id}/delete', 'destroy')->name('admin.comments.destroy');

});

// Tag Routes
//==================================================================================================
Route::controller(PostTagsController::class)->group(function () {

    // Public Tag Routes
    Route::get('/tags', 'showIndex')->name('tags.index');
    Route::get('/tags/{slug}', 'show')->name('tags.show');

});

// Admin Dashboard Routes
//==================================================================================================
Route::controller(DashboardController::class)->group(function () {
    Route::get('/admin/dashboard', 'dashboard')->middleware(['auth'])->name('admin.dashboard');
    Route::get('/profile', 'profile')->middleware(['auth'])->name('profile');
    Route::post('/profile', 'updateProfile')->middleware(['auth'])->name('profile.update');
    Route::post('/password', 'updatePassword')->middleware(['auth'])->name('profile.password.update');
});


Route::get('/admin/rubbish-bin', function () {
    return view('admin.rubbish_bin');
})->name('admin.rubbish-bin.index');

Auth::routes(['register' => false]);
