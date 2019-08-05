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

//首页

Route::get('/', function () {
    return redirect('/blog');
});

Route::get('blog', 'BlogController@index');

Route::get('blog/{slug}', 'BlogController@showPost')->name('blog.show');

Route::get('workLog/index','WorkLogController@index');

//后台
Route::middleware('auth')->namespace('Admin')->group(function () {
    Route::get('admin', 'PostController@index');
    Route::resource('admin/post', 'PostController');
    Route::resource('admin/tag', 'TagController');
    //上传
    Route::get('admin/upload', 'UploadController@index');
    Route::post('admin/upload/file', 'UploadController@uploadFile');
    Route::delete('admin/upload/file', 'UploadController@deleteFile');
    Route::post('admin/upload/folder', 'UploadController@createFolder');
    Route::delete('admin/upload/folder', 'UploadController@deleteFolder');
    //工作日志
    Route::get('admin/workLog','WorkLogController@index');
    Route::get('admin/workLog/create','WorkLogController@create');
    Route::post('admin/workLog/save','WorkLogController@save');
    Route::delete('admin/workLog/delete','WorkLogController@delete');
    Route::get('admin/workLog/edit','WorkLogController@edit');
    //箴言
    Route::get('admin/dailySay','DailySayController@index');
    Route::get('admin/dailySay/create','DailySayController@create');
    Route::post('admin/dailySay/save','DailySayController@save');
});


//登陆
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');
