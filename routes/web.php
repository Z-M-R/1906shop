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

<<<<<<< HEAD
//注册
Route::get('/reg','admin\AdminController@reg');
//执行注册
Route::post('/reg_do','admin\AdminController@reg_do');
//登录
Route::get('/login','admin\AdminController@login');
//执行登录
Route::post('/login_do','admin\AdminController@login_do');
=======

Route::get('/find','UserController@vFind');     //找回密码
Route::post('/find','UserController@find');     
Route::get('/reset','UserController@vReset');   //重置密码
Route::post('/reset','UserController@reset');   
>>>>>>> zhang
