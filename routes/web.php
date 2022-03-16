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

Route::prefix('page')->group(function () {
    Route::get('/park', [
        'as' => 'page.park',
        'uses' => 'PageController@park',
    ]);
    Route::get('/detail/{id}', [
        'as' => 'page.detail',
        'uses' => 'PageController@detail',
    ]);
    Route::get('/history/{id}', [
        'as' => 'page.history',
        'uses' => 'PageController@history',
    ]);
    Route::get('/list', [
        'as' => 'page.list',
        'uses' => 'PageController@list',
    ]);
    Route::get('/month', [
        'as' => 'page.month',
        'uses' => 'PageController@month',
    ]);
    Route::post('/member', [
        'as' => 'page.member',
        'uses' => 'PageController@member',
    ]);
    Route::get('/order/{id}', [
        'as' => 'page.order',
        'uses' => 'PageController@order',
    ]);
    Route::post('/transaction/{id}', [
        'as' => 'page.transaction',
        'uses' => 'PageController@transaction',
    ]);
    Route::get('/delete/{id}', [
        'as' => 'page.delete',
        'uses' => 'PageController@delete',
    ]);
    Route::get('/paper/{id}', [
        'as' => 'page.paper',
        'uses' => 'PageController@paper',
    ]);
    Route::post('/search_new', [
        'as' => 'page.search_new',
        'uses' => 'PageController@search_new',
    ]);
    Route::post('/search_transaction', [
        'as' => 'page.search_transaction',
        'uses' => 'PageController@search_transaction',
    ]);
    Route::get('/user/{id}', [
        'as' => 'page.user',
        'uses' => 'PageController@user',
    ]);
});

Route::prefix('auth')->group(function () {
    Route::get('/page', [
        'as' => 'auth.page',
        'uses' => 'AuthController@page',
    ]);
    Route::get('/home', [
        'as' => 'auth.home',
        'uses' => 'AuthController@home',
    ]);
    Route::get('/login', [
        'as' => 'auth.login',
        'uses' => 'AuthController@login',
    ]);
    Route::post('/sigin', [
        'as' => 'auth.sigin',
        'uses' => 'AuthController@sigin',
    ]);
    Route::get('/logout', [
        'as' => 'auth.logout',
        'uses' => 'AuthController@logout',
    ]);
    Route::post('/signup', [
        'as' => 'auth.sigup',
        'uses' => 'AuthController@sigup',
    ]);
    Route::get('/edit', [
        'as' => 'auth.edit',
        'uses' => 'AuthController@edit',
    ]);
    Route::post('/update/{id}', [
        'as' => 'auth.update',
        'uses' => 'AuthController@update'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'auth.delete',
        'uses' => 'AuthController@delete',
    ]);
});

Route::prefix('camerain')->group(function () {
    Route::get('/index', [
        'as' => 'camerain.index',
        'uses' => 'CameraInController@index',
    ]);
    Route::get('/add', [
        'as' => 'camerain.add',
        'uses' => 'CameraInController@add',
    ]);
    Route::get('/take', [
        'as' => 'camerain.take',
        'uses' => 'CameraInController@take',
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
    Route::get('/clean', [
        'as' => 'camerain.clean',
        'uses' => 'CameraInController@clean',
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
    Route::get('/take', [
        'as' => 'cameraout.take',
        'uses' => 'CameraOutController@take',
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

Route::prefix('role')->group(function () {
    Route::get('/index', [
        'as' => 'role.index',
        'uses' => 'RoleController@index',
    ]);
});

Route::prefix('user')->group(function () {
    Route::get('/index', [
        'as' => 'user.index',
        'uses' => 'UserController@index',
    ]);
    Route::get('/add', [
        'as' => 'user.add',
        'uses' => 'UserController@add',
    ]);
    Route::post('/create', [
        'as' => 'user.create',
        'uses' => 'UserController@create',
    ]);
    Route::get('/edit/{id}', [
        'as' => 'user.edit',
        'uses' => 'UserController@edit',
    ]);
    Route::post('/update/{id}', [
        'as' => 'user.update',
        'uses' => 'UserController@update'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'user.delete',
        'uses' => 'UserController@delete',
    ]);
});

Route::prefix('member')->group(function () {
    Route::get('/index', [
        'as' => 'member.index',
        'uses' => 'MemberController@index',
    ]);
    Route::get('/add', [
        'as' => 'member.add',
        'uses' => 'MemberController@add',
    ]);
    Route::post('/create', [
        'as' => 'member.create',
        'uses' => 'MemberController@create',
    ]);
    Route::get('/edit/{id}', [
        'as' => 'member.edit',
        'uses' => 'MemberController@edit',
    ]);
    Route::post('/update/{id}', [
        'as' => 'member.update',
        'uses' => 'MemberController@update'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'member.delete',
        'uses' => 'MemberController@delete',
    ]);
});

Route::prefix('newpaper')->group(function () {
    Route::get('/index', [
        'as' => 'newpaper.index',
        'uses' => 'NewpaperController@index',
    ]);
    Route::get('/add', [
        'as' => 'newpaper.add',
        'uses' => 'NewpaperController@add',
    ]);
    Route::post('/create', [
        'as' => 'newpaper.create',
        'uses' => 'NewpaperController@create',
    ]);
    Route::get('/edit/{id}', [
        'as' => 'newpaper.edit',
        'uses' => 'NewpaperController@edit',
    ]);
    Route::post('/update/{id}', [
        'as' => 'newpaper.update',
        'uses' => 'NewpaperController@update'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'newpaper.delete',
        'uses' => 'NewpaperController@delete',
    ]);
});

Route::prefix('statistic')->group(function () {
    Route::post('/search', [
        'as' => 'statistic.search',
        'uses' => 'StatisticController@search'
    ]);
    Route::get('/date', [
        'as' => 'statistic.date',
        'uses' => 'StatisticController@date',
    ]);
    Route::post('/search_date', [
        'as' => 'statistic.search_date',
        'uses' => 'StatisticController@search_date'
    ]);
    Route::get('/park', [
        'as' => 'statistic.park',
        'uses' => 'StatisticController@park',
    ]);
    Route::post('/search_park', [
        'as' => 'statistic.search_park',
        'uses' => 'StatisticController@search_park'
    ]);
    Route::get('/list', [
        'as' => 'statistic.list',
        'uses' => 'StatisticController@list'
    ]);
    Route::post('/search_user', [
        'as' => 'statistic.search_user',
        'uses' => 'StatisticController@search_user'
    ]);
    Route::get('/user', [
        'as' => 'statistic.user',
        'uses' => 'StatisticController@user'
    ]);
    Route::get('/user_detail/{id}', [
        'as' => 'statistic.user_detail',
        'uses' => 'StatisticController@user_detail'
    ]);
});

Route::get('chart-data', 'AuthController@getChartData');
