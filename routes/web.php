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

// ページ認証
Route::group(['middleware' => 'auth'], function(){
    Route::get('/tasks', 'TaskController@index')->name('tasks.index');
    // タスク追加
    Route::get('/tasks/create', 'TaskController@showCreate')->name('tasks.create');
    Route::post('/tasks/create', 'TaskController@create');
    // タスク編集
    Route::get('/tasks/{id}/edit', 'TaskController@showEdit')->name('tasks.edit');
    Route::post('/tasks/{id}/edit', 'TaskController@edit');
    // タスク削除
    Route::get('/tasks/{id}/delete', 'TaskController@delete')->name('tasks.delete');
    // 「/」へのアクセスでホーム画面へ戻す
    Route::get('/', 'HomeController@index')->name('home');
});

// 認証機能
Auth::routes();