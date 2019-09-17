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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','MainPageController@index');

Route::get('/reset','MainPageController@resetDatabase');

Route::get('/characterSelect', 'CharacterSelectController@index');
Route::get('/getAllUser', 'CharacterSelectController@getAllUser');
Route::get('/submitCharacter/{param1}/{param2}','CharacterSelectController@submit');
Route::get('/pressKey/{param1}/{param2}','CharacterSelectController@pressKey');
