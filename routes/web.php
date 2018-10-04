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

Auth::routes();


Route::group(['prefix' => '/', 'middleware' => 'auth'],function(){
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/tasks','TasksController@index')->name('view-tasks');

    Route::get('/meetings','MeetingsController@index')->name('view-meetings');

    Route::get('/meetings/{meeting}', 'MeetingsController@view')->name('view-meeting');

    Route::get('/meetings/{meeting}/confirm', 'MeetingsController@confirm')->name('confirm-meeting');

    Route::get('/tasks','TasksController@index')->name('view-tasks');

    Route::get('/tasks/{task}', 'TasksController@view')->name('view-task');

    Route::get('/tasks/{task}/submit','SubmissionsController@index')->name('view-submit');

    Route::post('/tasks/{task}/submit','SubmissionsController@store')->name('post-submit');

});