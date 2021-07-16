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
    return view('auths.login');
});

Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

//Dashboard
Route::get('/dashboard','DashboardController@index')->middleware('auth');
// //Route Services
// Route::get('/services','ServicesController@index')->middleware('auth');
// Route::get('/services/cari','ServicesController@cari')->middleware('auth');
// Route::get('services/add', 'ServicesController@add')->middleware('auth');
// Route::post('services', 'ServicesController@addProcess')->middleware('auth');
// Route::get('services/edit/{id}', 'ServicesController@edit')->middleware('auth');
// Route::patch('services/{id}', 'ServicesController@editProcess')->middleware('auth');
// Route::get('/services/delete/{id}','ServicesController@delete')->middleware('auth');

//Route Projects
Route::get('/projects','ProjectsController@index');
Route::get('/projects/cari','ProjectsController@cari');
Route::get('projects/add', 'ProjectsController@add');
Route::post('projects', 'ProjectsController@addProcess');
Route::get('projects/edit/{id}', 'ProjectsController@edit');
Route::patch('projects/{id}', 'ProjectsController@editProcess');
Route::get('/projects/delete/{id}','ProjectsController@delete');

//Route Company
Route::get('/techs','TechsController@index');
Route::get('/techs/cari','TechsController@cari');
Route::get('techs/add', 'TechsController@add');
Route::post('techs', 'TechsController@addProcess');
Route::get('techs/edit/{id}', 'TechsController@edit');
Route::patch('techs/{id}', 'TechsController@editProcess');
Route::get('/techs/delete/{id}','TechsController@delete');

// //Route Techs
// Route::get('/techs','TechsController@index');
// Route::get('/techs/cari','TechsController@cari');
// Route::get('techs/add', 'TechsController@add');
// Route::post('techs', 'TechsController@addProcess');
// Route::get('techs/edit/{id}', 'TechsController@edit');
// Route::patch('techs/{id}', 'TechsController@editProcess');
// Route::get('/techs/delete/{id}','TechsController@delete');

//Routes Techs
Route::group(['middleware'=>'auth'], function(){
    Route::get('/techs','TechsController@index');
    Route::get('/techs/cari','TechsController@cari');
    Route::get('techs/add', 'TechsController@add');
    Route::post('techs', 'TechsController@addProcess');
    Route::get('techs/edit/{id}', 'TechsController@edit');
    Route::patch('techs/{id}', 'TechsController@editProcess');
    Route::get('/techs/delete/{id}','TechsController@delete');
    // Route::delete('techs/{id}', 'TechsController@delete');
});
