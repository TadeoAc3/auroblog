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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::middleware('website')->group(function() {

    Route::middleware('auth')->prefix('admin')->group(function() {

        Route::get('/', 'HomeController@admin');

        Route::resource('posts', 'Admin\PostController');
        
    });

    Auth::routes(['register' => false]);

    Route::get('/', 'PageController@index')->name('home');
    Route::get('posts/{slug}', 'PageController@post')->name('post');
    
});
