<?php

use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [
    PostController::class, 'index'
])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin',[
    AdminController::class, 'index'
])->name('admin');

Route::get('/admin/users',[
    AdminUsersController::class, 'index'
])->name('admin-users');

Route::get('/admin/users/create',[
    AdminUsersController::class, 'create'
])->name('admin-users-create');

Route::post('/admin/users/create',[
    AdminUsersController::class, 'store'
])->name('admin-users-create');

Route::get('/admin/posts/create',[
    PostController::class, 'create'
])->name('admin-posts-create')->middleware('auth');

Route::post('/admin/posts/create',[
    PostController::class, 'store'
])->name('admin-posts-create')->middleware('auth');
