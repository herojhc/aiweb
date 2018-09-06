<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// 前台API


// 后台API
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'auth.admin']], function () {
    // 资源
    Route::resource('sells', 'Api\Admin\SellController', [
        'names' => [
            'show' => 'api.admin.sells.show',
            'update' => 'api.admin.sells.update',
            'store' => 'api.admin.sells.store',
            'destroy' => 'api.admin.sells.destroy'
        ],
        'only' => ['show', 'update', 'store', 'destroy']
    ]);
});
