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
 Route::get('web/news/list',"Web\WebNewsController@list")->name('list');
 
 
 
 Route::group(['namespace' => 'Admin','middleware' => ['admin.login']], function(){
     Route::get('admin/news/list',"NewsController@list");
     Route::get('admin/news/add',"NewsController@add");
     Route::post('admin/news/save',"NewsController@save");
     Route::get('admin/news/news_video_upload',"NewsController@news_video_upload");
     Route::post('admin/news/save_upload',"NewsController@save_upload");
     
 });