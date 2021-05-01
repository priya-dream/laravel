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

Route::resource('contacts','ContactController');


Route::get('/account','NavigationController@myaccount');

    Route::get('/vacancy/apply/{id}','VacancyController@apply');
    Route::get('/vacancy/view/','VacancyController@show')->name('show');
    Route::post('/vacancy/add','VacancyController@store');
    Route::post('/vacancy_type/delete/{id}','VacancyController@destroy');
    Route::post('/vacancy_type/update/{id}','VacancyController@change_vacancy_type');
    Route::get('/vacancy/type','VacancyController@type');
    Route::resource('/vacancies', 'VacancyController');

    Route::get('/cv/download/{cv}', 'ResumeController@download');
    Route::get('/resume_view/{id}', 'ResumeController@show');
    Route::get('/cv', 'ResumeController@index');
    Route::post('/add/resume', 'ResumeController@store');
    Route::resource('/resumes', 'ResumeController');

    
    Route::post('/job_seeker/cv', 'JobSeekerController@add_cv');
    Route::post('/employee/resume', 'JobSeekerController@store');
    Route::resource('/resume', 'JobSeekerController');


    Route::get('/application_report','AdminController@application_report');
    Route::post('/admin/verify','AdminController@verify');
    Route::get('/company/data','AdminController@company_data');
    Route::post('admin/publish/{id}','AdminController@publish');
    Route::post('/admin/add_payment/{id}','AdminController@payment');
    Route::get('/admin/job_seeker','AdminController@job_seeker');
    Route::get('/admin/for_publish','AdminController@for_publish');
    Route::get('/admin/dashboard','AdminController@dashboard');
    Route::resource('/admin','AdminController');

    Route::get('/shortlist/restore/{id}','InterviewController@restore');
    Route::get('/myaccount/interview_list/{id}','InterviewController@show');
    Route::post('/add/interview-list/{id}','InterviewController@store');
    Route::resource('/interview','InterviewController');

    Route::get('/myaccount/applicant/data/{id}','ApplicationController@show');
    Route::get('/myaccount/application/accept/{id}','ApplicationController@accept');
    Route::post('/myaccount/application/remove/{id}','ApplicationController@update');
    Route::get('/myaccount/applications/{id}','ApplicationController@index');
    Route::resource('/applications','ApplicationController');


    Route::post('/ad/update/{id}','SettingController@update');
    Route::get('/post/edit/{id}','SettingController@edit');
    Route::post('/post/delete/{id}','SettingController@destroy');
    Route::get('/myaccount/details/{id}','SettingController@detail');
    Route::get('/myaccount/posts/{id}','SettingController@post');
    Route::post('/account/verify','SettingController@verify');
    Route::resource('/myaccount','SettingController');


    Route::post('/join/store', 'UserController@store');
    // Route::post('checklogin', 'PageController@checklogin');
    // Route::get('successlogin', 'PageController@successlogin');
    Route::post('/user/change/{id}', 'UserController@update');
    // Route::get('/user/log/{id}', 'UserController@log');
    Route::resource('user', 'UserController');
    
    Route::post('company/detail/update','CompanyController@update');
    Route::post('company/logo/update/{id}','CompanyController@update_logo');
    Route::post('/login/verify', 'CompanyController@verify');
    Route::get('/login/create', 'CompanyController@create');
    Route::get('company/login','CompanyController@index');
    Route::get('company/log/{id}','CompanyController@log');
    Route::resource('company', 'CompanyController');

    Route::get('/post/view/{id}','PostController@show');
    Route::any('/list','PostController@store');
    Route::get('search', 'PostController@search');
    Route::post('/post/type_search', 'PostController@type_search');
    Route::get('/post', 'PostController@index');
    Route::resource('post/{id}', 'PostController');

    // Password reset link request routes...
    Route::get('password/email', 'Auth\ForgotPasswordController@getEmail');
    Route::post('password/email', 'Auth\ForgotPasswordController@postEmail');
    


    Route::get('locale/(locale)',function ($locale){
        Session::put('locale',$locale);
        return redirect()->back();
    });

    
    



Auth::routes();