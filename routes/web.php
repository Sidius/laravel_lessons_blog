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
Route::get('/', [\App\Http\Controllers\PostController::class, 'index'])->name('home');
Route::get('/article', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.single');

//Route::group(['prefix' => 'admin', 'namespace' => '\App\Http\Controllers\Admin'], function () {
//    Route::get('/', 'MainController@index')->name('admin.index');
//});

Route::prefix('admin')->namespace('\App\Http\Controllers\Admin')->name('admin.')->middleware('admin')->group(function () {
    Route::get('/', 'MainController@index')->name('index');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/tags', 'TagController');
    Route::resource('/posts', 'PostController');
});

// php artisan route:list
// php artisan route:list --path=admin/cat

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', '\App\Http\Controllers\UserController@create')->name('register.create');
    Route::post('/register', '\App\Http\Controllers\UserController@store')->name('register.store');
    Route::get('/login', '\App\Http\Controllers\UserController@loginForm')->name('login.create');
    Route::post('/login', '\App\Http\Controllers\UserController@login')->name('login');
});

Route::get('/logout', '\App\Http\Controllers\UserController@logout')->name('logout')->middleware('auth');

