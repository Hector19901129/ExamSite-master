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
Route::post('/adminstudents', 'AdminController@showStudents');
Route::post('/adminquestions', 'AdminController@showQuestions');
Route::post('/admindashboard', 'AdminController@showDashboard');
Route::post('/userdashboard', 'IndexController@index');
Route::post('/training', 'IndexController@training');
Route::post('/exam', 'IndexController@exam');
Route::post('/startexam', 'IndexController@startExam');
Route::post('/reports', 'IndexController@showReports');
Route::post('/viewquestion', 'AdminController@viewquestion');
Route::post('/addquestion', 'AdminController@addquestion');

Route::auth();

