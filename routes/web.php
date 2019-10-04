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

Route::get('/companies/create', function() {
  return view('companies.create');
});

//Route::resource('companies', 'CompaniesController')->only(['create, store, show']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
