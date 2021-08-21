<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\NavController;
use App\Http\Controllers\StoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('authenticate')->group(function () {

    Route::prefix('categories')->group(function () {
        Route::get('', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('create', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::post('edit/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::get('destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    });

    Route::prefix('stories')->group(function () {
        Route::get('', [StoryController::class, 'index'])->name('stories.index');
        Route::get('create', [StoryController::class, 'create'])->name('stories.create');
        Route::post('create', [StoryController::class, 'store'])->name('stories.store');
        Route::get('show/{id}', [StoryController::class, 'show'])->name('stories.show');
        Route::get('edit/{id}', [StoryController::class, 'edit'])->name('stories.edit');
        Route::post('edit/{id}', [StoryController::class, 'update'])->name('stories.update');
        Route::get('destroy/{id}', [StoryController::class, 'destroy'])->name('stories.destroy');
    });

    Route::prefix('chapters')->group(function () {
        Route::get('', [ChapterController::class, 'index'])->name('chapters.index');
        Route::get('create', [ChapterController::class, 'create'])->name('chapters.create');
        Route::post('create', [ChapterController::class, 'store'])->name('chapters.store');
        Route::get('show/{id}', [ChapterController::class, 'show'])->name('chapters.show');
        Route::get('edit/{id}', [ChapterController::class, 'edit'])->name('chapters.edit');
        Route::post('edit/{id}', [ChapterController::class, 'update'])->name('chapters.update');
        Route::get('destroy/{id}', [ChapterController::class, 'destroy'])->name('chapters.destroy');
    });
});

// login
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'authenticate'])->name('authenticate');
// logout
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
// register
Route::get('register', [AuthController::class, 'create'])->name('register');
Route::post('register', [AuthController::class, 'store'])->name('store');

// frontend
// home
Route::get('/', [HomeController::class, 'story'])->name('home');

// nav
Route::get('category', [NavController::class, 'category'])->name('category');
