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

Route::get('/', function () {
    return view('welcome');
})->name('home');

//Route::group(['prefix' => 'admin', 'namespace' => '\App\Http\Controllers\Admin'], function () {
//    Route::get('/', 'MainController@index')->name('admin.index');
//});

Route::prefix('admin')->namespace('\App\Http\Controllers\Admin')->name('admin.')->group(function () {
    Route::get('/', 'MainController@index')->name('index');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/tags', 'TagController');
    Route::resource('/posts', 'PostController');
});

// php artisan route:list
// php artisan route:list --path=admin/cat

Route::get('/register', '\App\Http\Controllers\UserController@create')->name('register.create');
Route::post('/register', '\App\Http\Controllers\UserController@store')->name('register.store');
