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
Route::get('createFood', 'FoodsController@form');



 Route::post('/create','PointsController@store');
 Route::post('/createFood','FoodsController@store');


 Route::get('/', 'PointsController@load');
 

 Route::post('/load_points', 'PointsController@load_points')->name('loadmore.load_points');
 Route::post('/load_foods', 'FoodsController@load_foods')->name('loadmore.load_foods');
Route::post('/not_stored', 'FoodsController@not_stored')->name('loadmore.not_stored');


Route::resource('etteremlap', 'PointsController');






Route::get('etteremlap', 'FoodsController@index');
Route::get('createFood/{id}', 'FoodsController@showForm');
