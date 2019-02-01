<?php

/*
 * Copyright 2018 OMS infoservices. 
 * All rights reserved.
 * File: UserController.php
 * CodeLibrary/Project: oms
 * Author: Amit kumar
 * CreatedOn: date (03/05/2017) 
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\Admin\UserServiceProvider;
use Illuminate\Support\Facades\Request;
use App\Models\User;
use Input;
use Validator;
use DB;
use View;

class UserController extends Controller {

    public function getTeacherListAjax(Request $request) {
        $schoolId = Request::input('school_id');
        $teachers = DB::table('usertable as u')->where('u.u_school_code', $schoolId)->where('u.user_type', '=', '2')->where('u.status', '=', '1')->select('u.user_id', DB::raw("concat(u.u_first_name,' ',u.u_last_name) as name"))->get();
//        $teachers = DB::table('usertable')->select('usertable.*')->where('usertable.user_type','=','2')->where('usertable.u_school_code', $schoolId)->get();
        return response($teachers)->header('Content-Type', 'application/json');
    }

    public function getUserDelete(Request $request, $id) {
        User::where('user_id', $id)->delete();
        return redirect('admin/user/user-list');
    }

    public function getUserEdit(Request $request, $id) {
        $data = array('form_url' => '');
        $data['statuses'][] = (object) ['id' => '1', 'name' => 'Active'];
        $data['statuses'][] = (object) ['id' => '0', 'name' => 'InActive'];
        $data['roleArray'] = array('1' => 'Student', '2' => 'Teacher', '3' => 'Intern');
        $data['schools'] = DB::table('school')->select('school_id', 'school_name')->get();
        $data['classes'] = DB::table('classname')->select('classid', 'classname')->orderby('classname', 'asc')->get();
        $data['teachers'] = DB::table('usertable')->where('user_type', '=', '2')->where('status', '=', '1')->select('user_id', DB::raw("concat(u_first_name,' ',u_last_name) as name"))->get();
        $user = DB::table('usertable')->select('usertable.*')->where('usertable.user_id', $id)->first();
//        echo "<pre>";print_r($user);die;
        $data['user_type'] = $user->user_type;
        $data['u_school_code'] = $user->u_school_code;
        $data['class'] = $user->class;
        $data['user_id'] = $user->user_id;
        $data['tech_id'] = $user->tech_id;
        $data['u_first_name'] = $user->u_first_name;
        $data['u_last_name'] = $user->u_last_name;
        $data['u_email'] = $user->u_email;
        $data['co_code'] = $user->co_code;
        $data['u_phone'] = $user->u_phone;
        $data['account_start_date'] = $user->account_start_date;
        $data['account_end_date'] = $user->account_end_date;
        $data['per_email'] = '';
        $data['status'] = $user->status;
        return view('admin.user.edit', $data);
    }

    public function postUserEdit(Request $request, $id) {
//        echo '<pre>';print_r(Request::all());die;
        $data = array('form_url' => '');
        $data['statuses'][] = (object) ['id' => '1', 'name' => 'Active'];
        $data['statuses'][] = (object) ['id' => '0', 'name' => 'InActive'];
        $data['roleArray'] = array('1' => 'Student', '2' => 'Teacher', '3' => 'Intern');
        $data['schools'] = DB::table('school')->select('school_id', 'school_name')->get();
        $data['classes'] = DB::table('classname')->select('classid', 'classname')->orderby('classname', 'asc')->get();
        $data['teachers'] = DB::table('usertable')->where('user_type', '=', '2')->where('status', '=', '1')->select('user_id', DB::raw("concat(u_first_name,' ',u_last_name) as name"))->get();
        $validation_rules = array(
            'user_type' => 'required',
            'u_first_name' => 'required',
            'u_email' => 'required|email|unique:usertable,u_email,' . $id . ',user_id',
        );
        $validator = Validator::make(
                        Request::all(), $validation_rules
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput(Request::all());
        } else {
//            echo '<pre>';print_r(Request::all());die;
            $user = array();
            $user['user_type'] = Request::input('user_type');
            $user['u_school_code'] = Request::input('u_school_code');
            $user['class'] = Request::input('class') != '' ? Request::input('class') : 0;
            $user['tech_id'] = Request::input('tech_id') != '' ? Request::input('tech_id') : 0;
            $user['u_first_name'] = Request::input('u_first_name');
            $user['u_last_name'] = Request::input('u_last_name');
            $user['u_email'] = Request::input('u_email');
            $user['co_code'] = Request::input('co_code');
            $user['u_phone'] = Request::input('u_phone');
            $user['account_start_date'] = Request::input('account_start_date');
            $user['account_end_date'] = Request::input('account_end_date');
            if(Request::input('u_password') != ''){
                $user['u_password'] = md5(trim(Request::input('u_password')));
            }
            $user['status'] = Request::input('status');
            $id = DB::table('usertable')->where('usertable.user_id', $id)->update($user);
            return redirect('admin/user/list');
        }
    }

    public function index() {
        return view('admin.dashboard');
    }

    public function getUserList() {
        try {
            return view('admin.user.list');
        } catch (Exception $e) {
            Log::error(__CLASS__ . "::" . __METHOD__ . ' ' . $e->getFile() . $e->getLine() . $e->getMessage());
            return Redirect::back();
        }
    }

    public function getUserListAjax() {

        try {
            if (Request::ajax()) {
                return UserServiceProvider::getUserList();
            }
            abort(404);
        } catch (Exception $e) {
            Log::error(__CLASS__ . "::" . __METHOD__ . ' ' . $e->getFile() . $e->getLine() . $e->getMessage());
            abort(404);
        }
    }

    public function getUserAdd(Request $request) {
        $data = array('form_url' => '');
        $data['roleArray'] = array('1' => 'Student', '2' => 'Teacher', '3' => 'Intern');
        $data['schools'] = DB::table('school')->select('school_id', 'school_name')->get();
        $data['classes'] = DB::table('classname')->select('classid', 'classname')->orderby('classname', 'asc')->get();
//        $data['teachers'] = DB::table('usertable')->where('user_type', '=', '2')->where('status', '=', '1')->select('user_id', DB::raw("concat(u_first_name,' ',u_last_name) as name"))->get();
        return view('admin.user.add', $data);
    }

    public function postUserAdd(Request $request) {
        $data = array('form_url' => '');
        $validation_rules = array(
            'user_type' => 'required',
            'u_first_name' => 'required',
            'u_email' => 'required|email|unique:usertable,u_email',
            'u_password' => 'required',
            'u_confirm_password' => 'required',
        );
        $validator = Validator::make(
                        Request::all(), $validation_rules
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput(Request::all());
        } else {
            $user = array();
            $user['user_type'] = Request::input('user_type');
            $user['u_school_code'] = Request::input('u_school_code');
            $user['class'] = Request::input('class') != '' ? Request::input('class') : 0;
            $user['register_date'] = date('Y-m-d H:i:s', strtotime('now'));
            $user['tech_id'] = Request::input('tech_id') != '' ? Request::input('tech_id') : 0;
            $user['u_first_name'] = Request::input('u_first_name');
            $user['u_last_name'] = Request::input('u_last_name');
            $user['u_email'] = Request::input('u_email');
            $user['co_code'] = Request::input('co_code');
            $user['u_phone'] = Request::input('u_phone');
            $user['account_start_date'] = Request::input('account_start_date');
            $user['account_end_date'] = Request::input('account_end_date');
            $user['u_password'] = md5(trim(Request::input('u_password')));
            $user['per_email'] = '';
            $user['token'] = '';
            $user['status'] = '1';
            $id = DB::table('usertable')->insertGetId($user);
            return redirect('admin/user/list');
        }
    }

}
