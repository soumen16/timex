<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/todos', 'TodoController@index')->name('todo.index');
Route::get('/todo/create', 'TodoController@create')->name('todo.create');
Route::post('/todo/create', 'TodoController@store')->name('todo.store');
Route::get('/todo/{todo}', 'TodoController@show')->name('todo.show');
Route::get('/todo/{todo}/edit', 'TodoController@edit')->name('todo.edit');
Route::patch('/todo/{todo}/edit', 'TodoController@update')->name('todo.update');
Route::delete('/todo/{todo}/delete', 'TodoController@destroy')->name('todo.delete');

//Auth::routes();
// Todo custom complete incomplete route
Route::put('/todo/{todo}/complete/', 'TodoController@complete')->name('todo.complete');
Route::delete('/todo/{todo}/incomplete/', 'TodoController@incomplete')->name('todo.incomplete');

// User Chart -- simple
Route::get('/userChart', 'TodoController@userchart');

// Todo Chart -- Dynamic
Route::get('/todosChart', 'TodoController@TodoChart')->name('todos.chart');
