<?php

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
});

Route::get('/hello', 'HelloController@hello');

// Authentication Routes...
XXH::routes();

/* Home Index */
Route::group(['middleware' => ['passport']], function () {

    /* Home Index */
    Route::get('/home', 'HomeController@index');

    /* Admin Index */
    Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'auth.admin']], function () {

        Route::get('{path?}', 'AdminController@index')->where('path', '[\/\w\.-]*');
    });


});



