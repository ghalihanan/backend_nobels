<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('services', 'ServicesController@indexApi');
Route::get('company', 'CompanyController@indexApi'); 
Route::get('projects', 'ProjectsController@indexApi'); 
Route::get('teams', 'TeamsController@indexApi'); 
Route::get('techs', 'TechsController@indexApi'); 
Route::post('connects', 'ConnectsController@create'); 