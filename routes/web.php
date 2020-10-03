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

// Route::get('/', function () {
//     return view('admin');
// });
//Route::resource('vacancies','VacancyController');
Route::get('/vacancies/login','VacancyController@login');
Route::get('/vacancies/create','VacancyController@create');
Route::get('/vacancies/create_account','VacancyController@create_account');
Route::resource('vacancies', 'VacancyController');
//Route::get('vacancies','VacancyController@index');


// Route::get('/typography', function () {
//     return view('typography');
// });
// Route::get('/setting_panel', function () {
//     return view('setting_panel');
// });
// Route::get('/navbar', function () {
//     return view('navbar');
// });
// Route::get('/mdi', function () {
//     return view('mdi');
// });
// Route::get('/footer', function () {
//     return view('footer');
// });
// Route::get('/dropdowns', function () {
//     return view('dropdowns');
// });
// Route::get('/chartjs', function () {
//     return view('chartjs');
// });
// Route::get('/buttons', function () {
//     return view('buttons');
// });
// Route::get('/basic_table', function () {
//     return view('basic_table');
// });
// Route::get('/ui_basic', function () {
//     return view('basic_elements');
// });

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/admin', 'AdminController@dashboard')->name('admin');
