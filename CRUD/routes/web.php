<?php

use Illuminate\Support\Facades\Route;

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

Route::get('items', 'ItemsController@ItemsView');
Route::post('items', 'ItemsController@ItemsAjaxSearch');

Route::any('delete/{id}', 'ItemsController@delete');
Route::any('restore/{id}', 'ItemsController@restore');

Route::any('item/{id?}', 'ItemsController@Item');
