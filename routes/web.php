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

//サインアップ
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

//ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');



//制限
Route::group(['middleware' => ['auth']], function(){
    //ユーザ詳細
    Route::get('user/{id}', 'UsersController@show')->name('users.show');
    Route::get('user/{id}/edit', 'UsersController@edit')->name('users.edit');
    Route::put('user/{id}', 'UsersController@update')->name('users.update');
    //ユーザタスク
        Route::get('users/{id}/userstasks/create', 'UsersTasksController@create')->name('user.tasks.create');
        Route::post('userstasks', 'UsersTasksController@store')->name('user.tasks');
    //グループタスク
        Route::get('groups/{id}/groupstasks/create', 'GroupsTasksController@create')->name('group.tasks.create');
        Route::post('groups/{id}/groupstasks', 'GroupsTasksController@store')->name('group.tasks');

    //グループ
        Route::resource('groups', 'GroupsController');
        Route::get('groups/{id}/tasklist', 'GroupsTasksController@index')->name('group.tasks.list');
        
    //グループへの参加・退会・一覧
        Route::group(['prefix' => 'users/{id}'], function() {
            Route::get('grouplist', 'GroupsController@index')->name('group.list');
            Route::post('join', 'UserGroupJoinController@store')->name('users.join');
            Route::delete('leave', 'UserGroupJoinController@destroy')->name('users.leave');
            });
    //タスク共通
//        Route::resource('tasks', 'TasksController');
        

});
