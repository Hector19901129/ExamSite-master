<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index');

Route::get('/admin', 'AdminController@index');
Route::get('/admin/students', 'AdminController@showStudents');
Route::get('/admin/questions', 'AdminController@showQuestions');
Route::get('/user', 'IndexController@index');
Route::get('/training', 'IndexController@training');
Route::get('/exam', 'IndexController@exam');
Route::get('/reports', 'IndexController@showReports');

Route::auth();

