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
        Route::resource('users', 'UsersController');
//    Route::get('users/{id}', 'UsersController@show')->name('users.show');
//    Route::get('users/{id}/edit', 'UsersController@edit')->name('users.edit');
//    Route::put('users', 'UsersController@update')->name('users.update');
    //グループ
        Route::resource('groups', 'GroupsController');
            Route::group(['prefix' => 'users/{id}'], function() {
                Route::post('join', 'UserGroupJoinController@store')->name('users.join');
                Route::delete('leave', 'UserGroupJoinController@destroy')->name('users.leave');
            });
//    Route::post('groups', 'GroupsController@post')->name('group.create.post');
//    Route::get('groups/{group_name}', 'GroupsController@show')->name('group.show');
//    Route::get('groups/{group_name}/edit', 'GroupsController@edit')->name('group.edit');
    

});