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

 Route::get('/home', function () {
    return view('welcome');
});
//Route::resource('vacancies','VacancyController');
// Route::get('/', function () {
//          return view('sms');
//      });
//Route::resource('sms', 'SmsController');

//default id=0
// Route::get('company/{id?}', function ($id=0) {
//     return "Hi!";
// });


// Route::resource('admin/vacancy', 'VacancyController');
// Route::resource('admin/company','CompanyController');

//Route::get('admin/company/login','CompanyController@login');
//Route::get('admin/company/show','CompanyController@show');

//Route::get('admin/company/test','CompanyController@show');
//Route::post('/companies','CompanyController@store')->name(company.store);
// Route::post("/companies", ["as" => "company.store", "uses" => "CompanyController@store"]);


Route::get('/destroy/{id}',
[
    'uses' => 'VacancyController@destroy',
    'as' => 'vacancy.index',
]);

    Route::get('/vacancy/apply','VacancyController@apply');
    Route::get('/vacancy/view/','VacancyController@show')->name('show');
    Route::post('/vacancy/add','VacancyController@store');
    Route::get('/vacancy/type','VacancyController@type');
    Route::resource('/vacancies', 'VacancyController');
    
    
    
    Route::post('/join/store', 'UserController@store');
    Route::post('checklogin', 'PageController@checklogin');
    Route::get('successlogin', 'PageController@successlogin');
    Route::get('/join/logout', 'UserController@logout');
    Route::get('/user/log', 'UserController@log');
    Route::resource('user', 'UserController');
    
    Route::post('/login/verify', 'CompanyController@verify');
    Route::get('/login/create', 'CompanyController@create');
    Route::get('company/login','CompanyController@index');
    Route::resource('company', 'CompanyController');

    Route::get('/post/view','PostController@show');
    Route::any('/list','PostController@store');
    Route::resource('post', 'PostController');
    
    



Auth::routes();