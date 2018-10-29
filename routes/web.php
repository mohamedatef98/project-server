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

Route::group(['prefix'=>'api'], function (){

   Route::group(['prefix'=>'students'], function (){

       Route::get('/','StudentController@index');

       Route::get('/{student}','StudentController@show');

       Route::delete('/{student}','StudentController@destroy');

       Route::post('/','StudentController@create');

   });

    Route::group(['prefix'=>'courses'], function (){

        Route::get('/','CourseController@index');

        Route::get('/{course}','CourseController@show');

        Route::delete('/{course}','CourseController@destroy');

        Route::post('/','CourseController@create');

    });

});
