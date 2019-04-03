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
use App\Providers\Admin\SubjectServiceProvider;
use Illuminate\Support\Facades\Request;
use App\Models\Subject;
use Input;
use Validator;
use DB;
use Illuminate\Validation\Rule;

class SubjectController extends Controller {

    public function getSubjectList() {
        try {
            return view('admin.subject.list');
        } catch (Exception $e) {
            Log::error(__CLASS__ . "::" . __METHOD__ . ' ' . $e->getFile() . $e->getLine() . $e->getMessage());
            return Redirect::back();
        }
    }

    public function getSubjectListAjax() {

        try {
            if (Request::ajax()) {
                return SubjectServiceProvider::getSubjectList();
            }
            abort(404);
        } catch (Exception $e) {
            Log::error(__CLASS__ . "::" . __METHOD__ . ' ' . $e->getFile() . $e->getLine() . $e->getMessage());
            abort(404);
        }
    }

    public function getSubjectAdd(Request $request) {
        $data = array('form_url' => 'add');
        return view('admin.subject.add', $data);
    }

    public function postSubjectAdd() {
        $data = array('form_url' => 'add');
//        echo '<pre>';print_r(Request::all());die;
        $subject = array();
        $subject['subjcatName'] = Request::input('subjcatName');
        $validation_rules = array(
            'subjcatName' => 'required|unique:subjectcat,subjcatName',
        );
        $validator = Validator::make(
                        Request::all(), $validation_rules
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput(Request::all());
        } else {
            $id = DB::table('subjectcat')->insertGetId($subject);
            return redirect('admin/subject/list');
        }
    }

    public function getSchoolDelete(Request $request, $id) {
        School::where('school_id', $id)->delete();
        return redirect('admin/school/school-list');
    }

    public function getSubjectEdit(Request $request, $id) {
        $data = array('form_url' => '');
        $subject = DB::table('subjectcat')->select('subjectcat.*')->where('subjectcat.subjcatid', $id)->first();
        $data['subjcatName'] = $subject->subjcatName;
        return view('admin.subject.edit', $data);
    }

    public function postSubjectEdit(Request $request, $id) {
        $data = array('form_url' => '');
//        echo '<pre>';print_r(Request::all());die;
        $subject = array();
        $subject['subjcatName'] = Request::input('subjcatName');
        $validation_rules = array(
            'subjcatName' => 'required|unique:subjectcat,subjcatName,' . $id . ',subjcatid',
        );
        $validator = Validator::make(
                        Request::all(), $validation_rules
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput(Request::all());
        } else {
            $id = DB::table('subjectcat')->where('subjectcat.subjcatid', $id)->update($subject);
            return redirect('admin/subject/list');
        }
    }

    public function index() {
        return view('admin.dashboard');
    }

}
