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
Auth::routes(['verify' => true]);

Route::get('/login/custom','LoginController@redirect')->name('login.custom');
Route::post('/login/custom','LoginController@login')->name('login.custom');
Route::group(['middleware'=>'auth'], function()
{
	Route::get('/home','HomeController@index')->name('home')->middleware('UserMember');
	Route::get('/dashboard','DashBoardController@index')->name('dashboard')->middleware('AdminMember');
	



Route::get('/test','AdminTestController@view')->name('test')->middleware('AdminMember');
Route::post('/test','AdminTestController@store')->name('test')->middleware('AdminMember');
Route::get('/questions','AdminQuestionController@view')->name('questions')->middleware('AdminMember');
Route::post('/questions','AdminQuestionController@store')->name('questions')->middleware('AdminMember');
Route::get('/options','AdminOptionController@view')->name('options')->middleware('AdminMember');
Route::post('/options','AdminOptionController@store')->name('options')->middleware('AdminMember');



Route::get('/UserTest/{test_name}/{test_id}','UserTestController@view')->name('UserTest')->middleware('UserMember');
Route::post('/result/{test_id}','UserTestController@store')->name('result');
Route::get('/result', 'UserResultController@view')->name('result')->middleware('UserMember');
Route::get('/admin_create', 'AdminCreateController@view')->name('admin_create')->middleware('AdminMember');
Route::post('/admin_create', 'AdminCreateController@create')->name('admin_create')->middleware('AdminMember');
Route::get('/user_list', 'ListController@view')->name('user_list')->middleware('AdminMember');
Route::get('/edit/{test_name}/{test_id}','AdminTestController@add_view')->name('Edit')->middleware('AdminMember');
Route::post('/edit/{test_id}','AdminQuestionController@add_question')->name('Edit')->middleware('AdminMember');
Route::get('/delete/{id}', 'AdminQuestionController@destroy')->middleware('AdminMember');
Route::get('/delete_test/{id}', 'AdminTestController@destroy')->middleware('AdminMember');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
