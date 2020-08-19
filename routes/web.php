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

Auth::routes();

Route::prefix('admin')->name('admin.')/*->middleware('admin')*/
    ->group(function () {
        Route::get('/', 'AdminController@index')->name('admin');
        Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');

    //CRUD for types
    Route::get('/type/datatable', 'TypeController@datatableData')->name('type.datatable.data');
    Route::resource('types', 'TypeController');
    //CRUD for stages
    Route::get('/stages/datatable', 'StageController@datatableData')->name('stages.datatable.data');
    Route::resource('stages', 'StageController');
    });



Route::get('/home', 'HomeController@index')->name('home');
