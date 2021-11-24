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

// Route::prefix('admin')->group(function () {
    Route::get('/admin', [
        'as' => 'admin.home',
        'uses' => 'AdminController@home',
    ]);
    Route::get('/login', [
        'as' => 'admin.login',
        'uses' => 'AdminController@getLoginAdmin',
    ]);
    Route::post('/login', [
        'as' => 'admin.post-login',
        'uses' => 'AdminController@postLoginAdmin',
    ]);
    Route::get('/logout', [
        'as' => 'admin.logout',
        'uses' => 'AdminController@logout',
    ]);
// });

Route::prefix('camerain')->group(function () {
    Route::get('/index', [
        'as' => 'camerain.index',
        'uses' => 'CameraInController@index',
    ]);
    Route::get('/add', [
        'as' => 'camerain.add',
        'uses' => 'CameraInController@add',
    ]);
    Route::post('/create', [
        'as' => 'camerain.create',
        'uses' => 'CameraInController@create',
    ]);
    Route::get('/edit/{id}', [
        'as' => 'camerain.edit',
        'uses' => 'CameraInController@edit',
    ]);
    Route::post('/update/{id}', [
        'as' => 'camerain.update',
        'uses' => 'CameraInController@update'
    ]);
});

Route::prefix('cameraout')->group(function () {
    Route::get('/index', [
        'as' => 'cameraout.index',
        'uses' => 'CameraOutController@index',
    ]);
    Route::get('/add', [
        'as' => 'cameraout.add',
        'uses' => 'CameraOutController@add',
    ]);
    Route::post('/create', [
        'as' => 'cameraout.create',
        'uses' => 'CameraOutController@create',
    ]);
    Route::get('/edit/{id}', [
        'as' => 'cameraout.edit',
        'uses' => 'CameraOutController@edit',
    ]);
    Route::post('/update/{id}', [
        'as' => 'cameraout.update',
        'uses' => 'CameraOutController@update'
    ]);
});

Route::prefix('brand')->group(function () {
    Route::get('/index', [
        'as' => 'brand.index',
        'uses' => 'BrandController@index',
    ]);
    Route::get('/add', [
        'as' => 'brand.add',
        'uses' => 'BrandController@add',
    ]);
    Route::post('/create', [
        'as' => 'brand.create',
        'uses' => 'BrandController@create',
    ]);
    Route::get('/edit/{id}', [
        'as' => 'brand.edit',
        'uses' => 'BrandController@edit',
    ]);
    Route::post('/update/{id}', [
        'as' => 'brand.update',
        'uses' => 'BrandController@update'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'brand.delete',
        'uses' => 'BrandController@delete',
    ]);
});

Route::prefix('park')->group(function () {
    Route::get('/index', [
        'as' => 'park.index',
        'uses' => 'ParkController@index',
    ]);
    Route::get('/add', [
        'as' => 'park.add',
        'uses' => 'ParkController@add',
    ]);
    Route::post('/create', [
        'as' => 'park.create',
        'uses' => 'ParkController@create',
    ]);
    Route::get('/edit/{id}', [
        'as' => 'park.edit',
        'uses' => 'ParkController@edit',
    ]);
    Route::post('/update/{id}', [
        'as' => 'park.update',
        'uses' => 'ParkController@update'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'park.delete',
        'uses' => 'ParkController@delete',
    ]);
});
