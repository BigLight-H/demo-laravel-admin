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
});

Route::get('/login', 'UserController@login')->name('login');
Route::get('/register', 'UserController@register')->name('register');
Route::post('/do/login', 'UserController@doLogin')->name('users.doLogin');
Route::post('/do/register', 'UserController@doRegister')->name('users.doRegister');

//登录后路由
Route::group(['middleware'=>'authWeb'], function () {
    Route::get('/home', 'HomeController@home')->name('home');
    Route::get('/loginOut', 'HomeController@loginOut')->name('loginOut');
    Route::get('/add/{id}', 'RoleController@add');
});


