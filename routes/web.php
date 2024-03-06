<?php

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

Route::group(['namespace' => 'Main'], function () {
    Route::get('/', 'IndexController')->name('main.index');
});

Route::group(['namespace' => 'Personal', 'prefix' => 'personal', 'middleware' => ['auth', 'verified']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('personal.main.index');
    });
    Route::group(['namespace' => 'Liked'], function () {
        Route::get('/liked', 'IndexController')->name('personal.liked.index');
        Route::delete('/liked/{post}', 'DeleteController')->name('personal.liked.delete');
    });
    Route::group(['namespace' => 'Comment'], function () {
        Route::get('/comments', 'IndexController')->name('personal.comment.index');
        Route::delete('/comments/{comment}', 'DeleteController')->name('personal.comment.delete');
        Route::get('/comments/{comment}/edit', 'EditController')->name('personal.comment.edit');
        Route::patch('/comments/{comment}', 'UpdateController')->name('personal.comment.update');
    });
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('admin.main.index');
    });

    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
        Route::get('/', 'IndexController')->name('admin.post.index');
        Route::get('/create', 'CreateController')->name('admin.post.create');
        Route::post('/', 'StoreController')->name('admin.post.store');
        Route::get('/{post}', 'ShowController')->name('admin.post.show');
        Route::get('/{post}/edit', 'EditController')->name('admin.post.edit');
        Route::patch('/{post}', 'UpdateController')->name('admin.post.update');
//        Порядок роутов важен!
        Route::delete('/{post}', 'DeleteController')->name('admin.post.delete');
    });

    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', 'IndexController')->name('admin.category.index');
        Route::get('/create', 'CreateController')->name('admin.category.create');
        Route::post('/', 'StoreController')->name('admin.category.store');
        Route::get('/{category}', 'ShowController')->name('admin.category.show');
        Route::get('/{category}/edit', 'EditController')->name('admin.category.edit');
        Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
//        Порядок роутов важен!
        Route::delete('/{category}', 'DeleteController')->name('admin.category.delete');
    });

    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
        Route::get('/', 'IndexController')->name('admin.tag.index');
        Route::get('/create', 'CreateController')->name('admin.tag.create');
        Route::post('/', 'StoreController')->name('admin.tag.store');
        Route::get('/{tag}', 'ShowController')->name('admin.tag.show');
        Route::get('/{tag}/edit', 'EditController')->name('admin.tag.edit');
        Route::patch('/{tag}', 'UpdateController')->name('admin.tag.update');
//        Порядок роутов важен!
        Route::delete('/{tag}', 'DeleteController')->name('admin.tag.delete');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::get('/create', 'CreateController')->name('admin.user.create');
        Route::post('/', 'StoreController')->name('admin.user.store');
        Route::get('/{user}', 'ShowController')->name('admin.user.show');
        Route::get('/{user}/edit', 'EditController')->name('admin.user.edit');
        Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
//        Порядок роутов важен!
        Route::delete('/{user}', 'DeleteController')->name('admin.user.delete');
    });
});

Auth::routes(['verify' => true]);

