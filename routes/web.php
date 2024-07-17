<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\UserController;
use App\Models\News;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    $news = News::all();
    return view('welcome', compact('news'));
  
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

        Route::prefix('category')
            ->as('category.')
            ->group(function () {
                Route::get('index',             [CategoryController::class, 'index'])->name('index');
                Route::get('create',            [CategoryController::class, 'create'])->name('create');
                Route::post('store',            [CategoryController::class, 'store'])->name('store');
                Route::get('{id}/edit',         [CategoryController::class, 'edit'])->name('edit');
                Route::put('{id}/update',       [CategoryController::class, 'update'])->name('update');
                Route::get('{id}/destroy',      [CategoryController::class, 'destroy'])->name('destroy');

            });

            Route::prefix('new')
            ->as('new.')
            ->group(function () {
                Route::get('index',             [NewController::class, 'index'])->name('index');
                Route::get('create',            [NewController::class, 'create'])->name('create');
                Route::post('store',            [NewController::class, 'store'])->name('store');
                Route::get('{id}/edit',         [NewController::class, 'edit'])->name('edit');
                Route::put('{id}/update',       [NewController::class, 'update'])->name('update');
                Route::get('{id}/destroy',      [NewController::class, 'destroy'])->name('destroy');

            });
            Route::prefix('user')
            ->as('user.')
            ->group(function () {
                Route::get('index',             [UserController::class, 'index'])->name('index');
                Route::get('create',            [UserController::class, 'create'])->name('create');
                Route::post('store',            [UserController::class, 'store'])->name('store');
                Route::get('{id}/edit',         [UserController::class, 'edit'])->name('edit');
                Route::put('{id}/update',       [UserController::class, 'update'])->name('update');
                Route::get('{id}/destroy',      [UserController::class, 'destroy'])->name('destroy');

            });
});

Route::middleware(['auth', 'member'])->prefix('user')->name('user.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    
});


Route::get('news', [NewController::class, 'show_news'])->name('news');
Route::get('show-ct/{id}', [NewController::class, 'show_ct'])->name('show-ct');
Route::get('show-loai/{id}', [CategoryController::class, 'show_loai'])->name('show-loai');
Route::get('search', [NewController::class, 'search'])->name('search');

Route::post('/news/{id}/comments', [CommentController::class, 'store'])->name('comment');


Route::get('auth/login', [LoginController::class, 'showFormLogin'])->name('login');
Route::post('auth/login', [LoginController::class, 'login']);
Route::get('auth/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('auth/register', [RegisterController::class, 'showFormRegister'])->name('register');
Route::post('auth/register', [RegisterController::class, 'register']);

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('/home', [HomeController::class, 'index'])->name('home');
