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

//注册
Route::get('/reg','login\LoginController@reg');
//执行注册
Route::post('/reg_do','login\LoginController@reg_do');
//登录
Route::get('/login','login\LoginController@login');
//执行登录
Route::post('/login_do','login\LoginController@login_do');
//登录成功跳转页面
Route::get('/index','login\LoginController@index');

Route::get('/findpass','UserController@vFind');     //找回密码
Route::post('/findpass','UserController@find');
Route::get('/resetpass','UserController@vReset');   //重置密码
Route::post('/resetpass','UserController@reset');

Route::get('/find','UserController@vFind');     //找回密码
Route::post('/find','UserController@find');     
Route::get('/reset','UserController@vReset');   //重置密码
Route::post('/reset','UserController@reset');

Route::get('/reset','Reset\ResetController@reset');   //修改密码视图
Route::post('/resetdo','Reset\ResetController@resetdo'); //修改密码执行

