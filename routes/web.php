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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');
//
Route::get('signup', 'UsersController@create')->name('signup');
Route::resource('users', 'UsersController');

Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');

Route::get('/testcurl', 'UsersController@testcurl')->name('curl');
Route::get('/teststormtimer', 'StormTimerController@store')->name('teststormtimer');

//-----------------------------------------------------------------------
Route::get('/attribute', 'PokemonTypeController@index')->name('attribute');

Route::resource('pokemons', 'PokemonsController');
Route::resource('moves', 'MovesController');
Route::resource('phavem', 'PmHaveMoveController');

Route::get('checkmove/{name}', 'MovesController@checkMove')->name('moves.checkmove');

Route::get('getPokemonByType/{type_id}', 'PmHaveMoveController@getPokemonByType')->name('phavem.getpm');
Route::get('getPokemonMvByType/{type_id}', 'PmHaveMoveController@getPokemonAndMoveByType')->name('phavem.getpmmv');
Route::get('getMoveByType/{type_id}', 'PmHaveMoveController@getMoveByType')->name('phavem.getmv');
Route::get('getPmMove/{p_id}', 'PmHaveMoveController@getPokemonMove')->name('showPmMove');

Route::post('phavem/aj_store', 'PmHaveMoveController@ajaxStore')->name('aj_store');
