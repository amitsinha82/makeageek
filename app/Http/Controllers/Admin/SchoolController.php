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
use App\Models\School;
use Input;
use Validator;
use DB;

class SchoolController extends Controller {

    public function getSchoolDelete(Request $request, $id) {
        School::where('school_id', $id)->delete();
        return redirect('admin/school/school-list');
    }

    public function getSchoolEdit(Request $request, $id) {
        $data = array('form_url' => '');
        $school = DB::table('school')->select('school.*')->where('school.school_id', $id)->first();
        $data['school_name'] = $school->school_name;
        $data['school_email'] = $school->school_email;
        $data['logo'] = $school->logo;
        $data['view_logo'] = url('../storage/app/images/school_images/' . $school->logo);
        return view('admin.school.school_edit', $data);
    }

    public function postSchoolEdit(Request $request, $id) {
        $data = array('form_url' => '');
        $validation_rules = array(
            'school_name' => 'required',
            'school_email' => 'required|email|unique:school,school_email,' . $id . ',school_id',
        );
        $validation_rules['school_logo'] = 'mimes:jpeg,jpg,png,gif|max:4096';
        $validator = Validator::make(
                        Request::all(), $validation_rules
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput(Request::all());
        } else {
            $school = array();
            $school['school_name'] = Request::input('school_name');
            $school['school_email'] = Request::input('school_email');
            if (Request::file('school_logo')) {
                $destinationPath = storage_path('app/images/school_images');
                $extension = Request::file('school_logo')->getClientOriginalExtension(); // getting image extension
                $fileName = 's' . rand(11, 99) . strtotime('now') . '.' . $extension; // renameing image
                Request::file('school_logo')->move($destinationPath, $fileName);
                $school['logo'] = $fileName;
                $oldFile = storage_path('app/images/school_images/' . Request::input('logo'));
                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }
            }
            $id = DB::table('school')->where('school.school_id', $id)->update($school);
            return redirect('admin/school/school-list');
        }
    }

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
        $data = array('form_url' => 'add');
        return view('admin.school.school_add', $data);
    }

    public function postSchoolAdd() {
        $data = array('form_url' => 'add');
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
                $fileName = 's' . rand(11, 99) . strtotime('now') . '.' . $extension; // renameing image
                Request::file('school_logo')->move($destinationPath, $fileName);
                $school['logo'] = $fileName;
            }
            $id = DB::table('school')->insertGetId($school);
            return redirect('admin/school/school-list');
        }
    }

}
