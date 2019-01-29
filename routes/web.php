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
use Illuminate\Http\Request;
Route::get('/', 'Front\IndexController@getDashboard');
Route::get('/admin', function () {
    return redirect('admin/login');
});
Route::group(['prefix' => 'admin'], function () {
    Route::get('login', 'Admin\AdminController@getLogin');
    Route::post('login', 'Admin\AdminController@postLogin');
    Route::group(['middleware' => ['Role']], function () {
        Route::get('school/add', 'Admin\SchoolController@getSchoolAdd');
        Route::post('school/add', 'Admin\SchoolController@postSchoolAdd');
        Route::get('school/edit/{id}', 'Admin\SchoolController@getSchoolEdit');
        Route::post('school/edit/{id}', 'Admin\SchoolController@postSchoolEdit');
        Route::get('school/delete/{id}', 'Admin\SchoolController@getSchoolDelete');
        Route::get('logout', 'Admin\AdminController@getlogout');
        Route::get('dashboard', 'Admin\AdminController@getDashboard');
        Route::get('school/school-list', 'Admin\SchoolController@getSchoolList');
        Route::get('school/school-list-ajax', 'Admin\SchoolController@getSchoolListAjax');
        Route::get('school-details/{id}', 'Admin\SchoolController@getSchoolDetails');
    });
});
