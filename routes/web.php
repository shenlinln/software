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
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});

 Route::get('admin/index',"Admin\LoginController@index");
 Route::match(['get', 'post'],'admin/login',"Admin\LoginController@login");
 
 Route::group(['namespace' => 'Admin','middleware' => ['admin.login']], function(){
     Route::get('admin/news/list',"NewsController@list");

     
 });