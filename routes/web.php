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



Route::get('generate-thana', 'GeneratorController@thana_generate');

Route::get('', 'CovidRegisterController@index');

Route::get('paynow', 'CovidRegisterController@paynow');

Route::post('covidregister', 'CovidRegisterController@store');