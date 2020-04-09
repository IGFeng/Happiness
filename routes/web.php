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


Route::get('/',function(){
    return view('welcome');
});
Route::get('/',function(){
    return view('welcome');
});
Route::get('add',['uses'=>'MessageController@add']);
Route::get('login',['uses'=>'AdminController@login']);
Route::post('edit/{id}',['uses'=>'MessageController@edit']);
Route::post('create',['uses'=>'MessageController@create']);
Route::get('trans',['uses'=>'AdminController@trans']);
Route::post('admin',['uses'=>'AdminController@admin']);
Route::get('logout',['uses'=>'AdminController@logout']);
Route::get('replyindex/{id}',['as'=>'replyindex','uses'=>'ReplyController@index']);
Route::get('reply/{id}',['uses'=>'ReplyController@reply']);
Route::post('replysolve/{id}/{mastername}',['uses'=>'ReplyController@replysolve']);
Route::post('rereplysolve/{mid}/{mastername}',['uses'=>'ReplyController@rereplysolve']);
Route::get('rereply/{id}',['uses'=>'ReplyController@rereply']);
Route::group(['middleware' => ['web']], function () {
    Route::get('index',['uses'=>'MessageController@index']);
    Route::get('verify/{id}',['uses'=>'AdminController@verify']);
    Route::get('delete/{id}',['uses'=>'AdminController@delete']);
    Route::get('settop/{id}',['uses'=>'AdminController@settop']);
    Route::get('unsettop/{id}',['uses'=>'AdminController@unsettop']);
    Route::get('hide/{id}',['uses'=>'AdminController@hide']);
    Route::get('like/{id}',['uses'=>'MessageController@like']);
    Route::get('unlike/{id}',['uses'=>'MessageController@unlike']);
    Route::get('redelete/{id}',['uses'=>'AdminController@redelete']);
});
