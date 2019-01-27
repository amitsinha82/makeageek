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
use App\Providers\Admin\SchoolServiceProvider;
use Illuminate\Support\Facades\Request;
use Input;
use Validator;
use DB;

class SchoolController extends Controller {

    public function index() {
        return view('admin.dashboard');
    }

    public function getSchoolList() {
        try {
            return view('admin.school.school_list');
        } catch (Exception $e) {
            Log::error(__CLASS__ . "::" . __METHOD__ . ' ' . $e->getFile() . $e->getLine() . $e->getMessage());
            return Redirect::back();
        }
    }

    public function getSchoolListAjax() {

        try {
            if (Request::ajax()) {
                return SchoolServiceProvider::getSchoolList();
            }
            abort(404);
        } catch (Exception $e) {
            Log::error(__CLASS__ . "::" . __METHOD__ . ' ' . $e->getFile() . $e->getLine() . $e->getMessage());
            abort(404);
        }
    }

    public function getSchoolAdd(Request $request) {
        $data = array('form_url' => 'school-add');
        return view('admin.school.school_add', $data);
    }

    public function postSchoolAdd() {
        $data = array('form_url' => 'school-add');
        $validation_rules = array(
            'school_name' => 'required',
            'school_email' => 'required|email|unique:school,school_email',
        );
        $validation_rules['school_logo'] = 'required|mimes:jpeg,jpg,png,gif|max:4096';

        $validator = Validator::make(
                        Request::all(), $validation_rules
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput(Request::all());
        } else {
            $school = array();
            $school['school_name'] = Request::input('school_name');
            $school['school_email'] = Request::input('school_email');
            $length = config('constants.schoo_code_limit');
            $number = '1234567890';
            $numberLength = strlen($number);
            $randomNumber = '';
            for ($i = 0; $i < $length; $i++) {
                $randomNumber .= $number[rand(0, $numberLength - 1)];
            }

            $school['school_code'] = 'make' . $randomNumber;
            if (Request::file('school_logo')) {
                $destinationPath = storage_path('app/images/school_images');
                $extension = Request::file('school_logo')->getClientOriginalExtension(); // getting image extension
                $fileName = 'school' . rand(11111, 99999) . '.' . $extension; // renameing image
                Request::file('school_logo')->move($destinationPath, $fileName);
                $school['logo'] = $fileName;
            }
            $id = DB::table('school')->insertGetId($school);
            return redirect('admin/school/school-list');
        }
    }

}
