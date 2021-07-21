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

//Route Teams
Route::group(['middleware'=>'auth'], function(){
    Route::get('/teams','TeamsController@index');
    Route::get('/teams/cari','TeamsController@cari');
    Route::get('teams/add', 'TeamsController@add');
    Route::post('teams', 'TeamsController@addProcess');
    Route::get('teams/edit/{id}', 'TeamsController@edit');
    Route::patch('teams/{id}', 'TeamsController@editProcess');
    Route::get('/teams/delete/{id}','TeamsController@delete');
    // Route::delete('techs/{id}', 'TechsController@delete');
});

// Route Services
Route::get('/services','ServicesController@index');
Route::get('/services/cari','ServicesController@cari');
Route::get('services/add', 'ServicesController@add');
Route::post('services', 'ServicesController@addProcess');
Route::get('services/edit/{id}', 'ServicesController@edit');
Route::patch('services/{id}', 'ServicesController@editProcess');
Route::get('/services/delete/{id}','ServicesController@delete');

// Route Company
Route::get('/company','CompanyController@index');
Route::get('/company/cari','CompanyController@cari');
Route::get('company/add', 'CompanyController@add');
Route::post('company', 'CompanyController@addProcess');
Route::get('company/edit/{id}', 'CompanyController@edit');
Route::patch('company/{id}', 'CompanyController@editProcess');
Route::get('/company/delete/{id}','CompanyController@delete');

// Route Projects
Route::get('/projects','ProjectsController@index');
Route::get('/projects/cari','ProjectsController@cari');
Route::get('projects/add', 'ProjectsController@add');
Route::post('projects', 'ProjectsController@addProcess');
Route::get('projects/edit/{id}', 'ProjectsController@edit');
Route::patch('projects/{id}', 'ProjectsController@editProcess');
Route::get('/projects/delete/{id}','ProjectsController@delete');

// Routes Connects
Route::get('/connects','ConnectsController@index');
Route::get('connects/detail/{id}','ConnectsController@detail');