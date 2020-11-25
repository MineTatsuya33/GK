<?php

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
    return view('welcome');
});

Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {
    Route::get('training/create', 'Admin\TrainingController@add');
    Route::post('training/create', 'Admin\TrainingController@create');
    Route::get('training', 'Admin\TrainingController@index');
    Route::get('training/edit', 'Admin\TrainingController@edit');
    Route::post('training/edit', 'Admin\TrainingController@update');
    Route::get('training/delete', 'Admin\TrainingController@delete');
    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::post('profile/create', 'Admin\ProfileController@create');
    Route::get('profile/edit', 'Admin\ProfileController@edit');
    Route::post('profile/edit', 'Admin\ProfileController@update');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/training', 'TrainingController@index');

Route::get('/mypage','MypageController@home');
Route::get('/calendar','CalendarController@show');
Route::get('/search','SearchController@index')->name("search");

Route::get('/training/favorite','LikeController@favorite');

Route::get('/sample','SampleController@index');

Route::get('/holiday_setting', 'Calendar\HolidaySettingController@form')
    ->name("holiday_setting");
Route::post('/holiday_setting', 'Calendar\HolidaySettingController@update')
    ->name("update_holiday_setting");
Route::get('/extra_holiday_setting', 
    'Calendar\HolidaySettingController@form')
    ->name("extra_holiday_setting");
    
Route::post('/extra_holiday_setting',
    'Calendar\HolidaySettingController@update')
    ->name("update_extra_holiday_setting");