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


//Auth::routes();
Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::prefix('admin')->name('admin.')->middleware('admin')
->group(function () {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
    //CRUD for types
    Route::get('/type/datatable', 'TypeController@datatableData')->name('type.datatable.data');
    Route::resource('types', 'TypeController');
    //CRUD for stages
    Route::get('/stages/datatable', 'StageController@datatableData')->name('stage.datatable.data');
    Route::resource('stages', 'StageController');

    //CRUD for users
    Route::get('/user/datatable', 'UserController@datatableData')->name('user.datatable.data');
    Route::resource('users', 'UserController');
    //CRUD for stages
    Route::get('/stage/datatable', 'StageController@datatableData')->name('stage.datatable.data');
    Route::resource('stages', 'StageController');
    //CRUD for builds
    Route::get('/builds/datatable', 'BuildController@datatableData')->name('build.datatable.data');
    Route::resource('builds', 'BuildController');

//    Route::get('/builds2/datatable', 'BuildController@datatableData2')->name('build2.datatable.data');


    //AJAX
    Route::get('change_permission', 'UserController@change_permission')->name('change.permission');
});


Route::middleware('auth')->group(function (){
Route::get('/', function () {
    return view('welcome', ['types' => \App\Type::all()]);
})->name('main');

Route::get('/create', 'BuildController@isp_create')->name('isp.create.build');

Route::get('/show/{id}', 'BuildController@inspector_show')->name('show');

<<<<<<< HEAD
Route::get('/maps', 'BuildController@map')->name('maps');
    Route::post('isp_store/stage', 'StageController@isp_store')->name('isp.store.stage');
    Route::post('isp_store/build', 'BuildController@isp_store')->name('isp.store.build');
});
=======
Route::get('/maps', function () {
    return view('project_build.maps');
})->name('maps');
Route::post('isp_store', 'StageController@isp_store')->name('isp_store');
//});
>>>>>>> parent of 9aeb305... done maps object and in create page
Route::get('/builds2/datatable', 'BuildController@datatableData2')->name('build2.datatable.data');
Route::get('/builds/welcome_table', 'BuildController@datatableData2')->name('welcome.datatable.data');

//Route::get('/home', 'HomeController@index')->name('home');
