<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CommentController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\blog\BlogController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [BlogController::class,'index'])->name('home');
Route::get('/posts/{slug}', [BlogController::class,'postsCategory'])->name('posts_category');
Route::get('/post/{slug}', [BlogController::class,'postDetails'])->name('post_details');


//Auth::routes();
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class,'logout'])
->middleware('auth')
->name('logout');


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resources(
        [
            '/' => AdminController::class,
            'posts' => PostController::class,
            'categories' => CategoryController::class,
            'comments' => CommentController::class,
            'users' => UserController::class
        ]
    );
});


// Admin Routes
/*Route::group(
    [
        'prefix' => 'admin',
        //'middleware' => ['auth']
    ],
    function () {
        Route::resources(
            [
                '/' => AdminController::class,
                'posts' => PostController::class,
                'categories' => CategoryController::class,
                'comments' => CommentController::class,
                'users' => UserController::class
            ]
        );
    }
);*/


