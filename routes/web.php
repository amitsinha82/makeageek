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
        //user start
        Route::get('user/add', 'Admin\UserController@getUserAdd');
        Route::post('user/add', 'Admin\UserController@postUserAdd');
        Route::get('user/edit/{id}', 'Admin\UserController@getUserEdit');
        Route::post('user/edit/{id}', 'Admin\UserController@postUserEdit');
        Route::get('user/delete/{id}', 'Admin\UserController@getUserDelete');
        Route::get('user/list', 'Admin\UserController@getUserList');
        Route::get('user/list-ajax', 'Admin\UserController@getUserListAjax');
        Route::get('user/detail/{id}', 'Admin\UserController@getUserDetail');
        Route::get('user/teacher-list-ajax', 'Admin\UserController@getTeacherListAjax');
        //user end
        //school start
        Route::get('school/add', 'Admin\SchoolController@getSchoolAdd');
        Route::post('school/add', 'Admin\SchoolController@postSchoolAdd');
        Route::get('school/edit/{id}', 'Admin\SchoolController@getSchoolEdit');
        Route::post('school/edit/{id}', 'Admin\SchoolController@postSchoolEdit');
        Route::get('school/delete/{id}', 'Admin\SchoolController@getSchoolDelete');
        Route::get('school/school-list', 'Admin\SchoolController@getSchoolList');
        Route::get('school/school-list-ajax', 'Admin\SchoolController@getSchoolListAjax');
        Route::get('school-details/{id}', 'Admin\SchoolController@getSchoolDetails');
        //school end
        //class start
        Route::get('class/add', 'Admin\ClassController@getClassAdd');
        Route::post('class/add', 'Admin\ClassController@postClassAdd');
        Route::get('class/edit/{id}', 'Admin\ClassController@getClassEdit');
        Route::post('class/edit/{id}', 'Admin\ClassController@postClassEdit');
        Route::get('clss/delete/{id}', 'Admin\ClassController@getClassDelete');
        Route::get('class/list', 'Admin\ClassController@getClassList');
        Route::get('class/list-ajax', 'Admin\ClassController@getClassListAjax');
        //class end
        Route::get('logout', 'Admin\AdminController@getlogout');
        Route::get('dashboard', 'Admin\AdminController@getDashboard');
    });
});
