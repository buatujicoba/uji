<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blog/{slug}', [HomeController::class, 'blog'])->name('blog.detail');
Route::post('/contact', [HomeController::class, 'contact'])->name('contact.submit');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    
Route::get('/blogs', [AdminController::class, 'blogs'])->name('blogs');
Route::get('/blogs/create', [AdminController::class, 'createBlog'])->name('blogs.create');
Route::post('/blogs', [AdminController::class, 'storeBlog'])->name('blogs.store');
Route::get('/blogs/{id}/edit', [AdminController::class, 'editBlog'])->name('blogs.edit');
Route::put('/blogs/{id}', [AdminController::class, 'updateBlog'])->name('blogs.update');
Route::delete('/blogs/{id}', [AdminController::class, 'deleteBlog'])->name('blogs.delete');
    
Route::get('/services', [AdminController::class, 'services'])->name('services');
Route::get('/services/create', [AdminController::class, 'createService'])->name('services.create');
Route::post('/services', [AdminController::class, 'storeService'])->name('services.store');
Route::get('/services/{id}/edit', [AdminController::class, 'editService'])->name('services.edit');
Route::put('/services/{id}', [AdminController::class, 'updateService'])->name('services.update');
Route::delete('/services/{id}', [AdminController::class, 'deleteService'])->name('services.delete');
    
Route::get('/contacts', [AdminController::class, 'contacts'])->name('contacts');
Route::get('/contacts/{id}', [AdminController::class, 'viewContact'])->name('contacts.view');
Route::put('/contacts/{id}/mark-as-read', [AdminController::class, 'markContactAsRead'])->name('contacts.mark-read');
Route::delete('/contacts/{id}', [AdminController::class, 'deleteContact'])->name('contacts.delete');
});