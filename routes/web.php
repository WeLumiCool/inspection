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

Auth::routes();
//Auth::routes([
//    'register' => false,
//    'reset' => false,
//    'verify' => false,
//]);

Route::prefix('admin')->name('admin.')/*->middleware('admin')*/
->group(function () {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
    //CRUD for types
    Route::get('/type/datatable', 'TypeController@datatableData')->name('type.datatable.data');
    Route::resource('types', 'TypeController');
    //CRUD for users
    Route::get('/user/datatable', 'UserController@datatableData')->name('user.datatable.data');
    Route::resource('users', 'UserController');
    //CRUD for builds
    Route::get('/builds/datatable', 'BuildController@datatableData')->name('build.datatable.data');
    Route::get('/builds2/datatable', 'BuildController@datatableData2')->name('build2.datatable.data');
    Route::resource('builds', 'BuildController');
});
//Route::middleware('auth')->group(function (){
Route::get('/', function () {
    return view('welcome');
})->name('main');

Route::get('/create', function () {
    return view('project_build.create');
})->name('create');

Route::get('/show', function () {
    return view('project_build.show');
})->name('show');
//});
