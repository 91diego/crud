<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', 'TaskController@index')->name('home');
Route::post('tasks', 'TaskController@store')->name('tasks.store');
Route::get('task/edit/{task}', 'TaskController@edit')->name('task.edit');
Route::put('task/{task}', 'TaskController@update')->name('task.update');
Route::delete('tasks/{task}', 'TaskController@destroy')->name('tasks.destroy');
