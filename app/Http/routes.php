<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
 * 主页欢迎页面
 */
Route::get('/', function () {
    return view('welcome');
});
Route::get('/show', function () {
    return view('show.index');
});
Route::get('/show/{id}', function ($id) {
    return view('show.'.$id);
});

// 认证路由...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'ApplyController@adminLogout');

// 注册路由...
//Route::get('auth/register', 'Auth\AuthController@getRegister');
//Route::post('auth/register', 'Auth\AuthController@postRegister');

//招新报名路由
Route::get('/apply', function () {
   return view('apply.apply');
});
Route::get('/show_apply','ApplyController@index');
Route::post('/validate_apply','ApplyController@validateApply');
Route::post('/save_apply','ApplyController@confirm');
Route::get('/admin','ApplyController@adminLogin');
Route::get('/admin/list/{campus}','ApplyController@showApply');
Route::get('/tmpphoto/{photoFile}','ApplyController@showTmpPhoto');
Route::get('/photo/{photoFile}','ApplyController@showPhoto');
Route::get('/admin/export/list/{campus}','ApplyController@exportList');
Route::get('/admin/export/photo/{campus}','ApplyController@exportPhoto');