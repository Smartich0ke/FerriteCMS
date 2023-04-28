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
})->middleware(['auth'])->name('dashboard');
Route::get('/admin/posts/create', function () {
    return view('posts.create');
})->name('admin.posts.create');

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

Route::get('/posts', function () {
    return view('posts.index');
})->name('posts.index');
Route::get('/posts/{slug}', function () {
    return view('posts.show');
})->name('posts.show');

Route::get('/tags', function () {
    return view('tags.index');
})->name('tags.index');

Route::get('/categories', function () {
    return view('categories.index');
})->name('categories.index');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
