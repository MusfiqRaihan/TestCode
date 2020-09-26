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

Route::get('/', 'App\Http\Controllers\Controller@welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/product/type/add','App\Http\Controllers\Controller@addtype');
Route::post('/product/type/store','App\Http\Controllers\Controller@storetype');
Route::get('/product/type/delete/{id}','App\Http\Controllers\Controller@typedelete');

Route::get('/product/details/add','App\Http\Controllers\Controller@adddetails');
Route::post('/product/details/store','App\Http\Controllers\Controller@storedetails');
Route::get('/product/details/delete/{id}','App\Http\Controllers\Controller@detailsdelete');

Route::get('/product/details/search', 'App\Http\Controllers\Controller@search');
