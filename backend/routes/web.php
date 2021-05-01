<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/todos', 'TodosController@index')->name('todos_index');

Route::get('/todos/create', 'TodosController@create')->name('todos_create');
Route::post('/todos/create', 'TodosController@store')->name('todos_store');

Route::get('/todos/{id}/edit', 'TodosController@edit')->name('todos_edit');
Route::post('/todos/{id}/edit', 'TodosController@update')->name('todos_update');

Route::post('/todos/{id}/delete', 'TodosController@destroy')->name('todos_delete');
