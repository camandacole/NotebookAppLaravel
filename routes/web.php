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

Route::resource('notebook','NotebooksController',['except'=>['index']]);

Route::resource('note','NoteController');

Route::get('notebook/{notebookId}/createNote','NoteController@createNote')->name('notes.createNote');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//email route
Route::get('contact','ContactController@getContact')->name('contact.index');
Route::post('contact','ContactController@postContact')->name('contact.store');
