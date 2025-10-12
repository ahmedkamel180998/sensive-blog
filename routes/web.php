<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogPagesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriberController;
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

// Blog routes
Route::controller(BlogPagesController::class)->name('blog.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/category/{id}', 'category')->name('category');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/blog-details', 'blogDetails')->name('blogDetails');
});

// Subscriber Routes
// beginner solution for named error bag
Route::controller(SubscriberController::class)->prefix('/subscribe')->name('subscribe.')->group(function () {
    Route::post('/sidebar/store', 'store')->name('sidebar.store');
    Route::post('/footer/store', 'store')->name('footer.store');
});

// Contact Route
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

// User blogs
Route::get('/my/blogs', [BlogController::class, 'userBlogs'])->name('blog.myBlogs');
Route::resource('/blogs', BlogController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
