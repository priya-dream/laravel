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
Route::get('/login', 'EmployeeController@login');

//Route::get('/', function () {
   // return view('layouts.admin',['name'=>'job banking system']);
//};
//Route::get('/test', function () {
   // return view('layouts.test');
//};


//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/admin', 'DashboardController@login')->name('admin');
