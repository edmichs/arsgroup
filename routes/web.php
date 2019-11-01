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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/projets', [
    'as' => "projet_path",
    'uses' => 'ProjetController@index',
    'middleware' => 'auth'
]);


Route::get('/projets/add', [
    'as' => "projet_add_path",
    'uses' => 'ProjetController@create',
    'middleware' => 'auth'
]);
Route::get('devis', [
    'as' => "devis_path",
    'uses' => 'DevisController@index',
    'middleware' => 'auth'
]);


Route::post('/projets/add', [
    'as' => "projet_add_path",
    'uses' => 'ProjetController@store',
    'middleware' => 'auth'
]);
