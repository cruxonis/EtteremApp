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

/*Route::get('/', function () {
    return view('pages.index');
});*/

//Route::get('/', 'PagesController@index'); 

Route::get('createPoint', 'PointsController@form');
Route::get('createFood', 'FoodsController@index');



 Route::post('/create','PointsController@store');


 Route::get('/', 'PointsController@load');
 Route::post('/load_data', 'PointsController@load_data')->name('loadmore.load_data');



