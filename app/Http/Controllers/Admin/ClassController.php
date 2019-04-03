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
use App\Providers\Admin\ClassnameServiceProvider;
use Illuminate\Support\Facades\Request;
use App\Models\Classes;
use Input;
use Validator;
use DB;
use Illuminate\Validation\Rule;

class ClassController extends Controller {

    public function getClassList() {
        try {
            return view('admin.class.list');
        } catch (Exception $e) {
            Log::error(__CLASS__ . "::" . __METHOD__ . ' ' . $e->getFile() . $e->getLine() . $e->getMessage());
            return Redirect::back();
        }
    }

    public function getClassListAjax() {

        try {
            if (Request::ajax()) {
                return ClassnameServiceProvider::getClassList();
            }
            abort(404);
        } catch (Exception $e) {
            Log::error(__CLASS__ . "::" . __METHOD__ . ' ' . $e->getFile() . $e->getLine() . $e->getMessage());
            abort(404);
        }
    }

    public function getClassAdd(Request $request) {
        $data = array('form_url' => 'add');
        $data['subjects'] = DB::table('subjectcat')->select('subjectcat.*')->get();
        return view('admin.class.add', $data);
    }

    public function postClassAdd() {
        $data = array('form_url' => 'add');
        $classname = array();
        $classname['subctFKid'] = Request::input('subctFKid');
        $classname['classname'] = Request::input('classname');
        $validation_rules = array(
            'subctFKid' => 'required',
            'classname' => [
                'required',
                Rule::unique('classname')->where(function ($query) use($classname) {
                            return $query->where('classname', $classname['classname'])
                                            ->where('subctFKid', $classname['subctFKid']);
                        }),
            ],
        );
        $validator = Validator::make(
                        Request::all(), $validation_rules
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput(Request::all());
        } else {
            $id = DB::table('classname')->insertGetId($classname);
            return redirect('admin/class/list');
        }
    }

    public function getSchoolDelete(Request $request, $id) {
        School::where('school_id', $id)->delete();
        return redirect('admin/school/school-list');
    }

    public function getClassEdit(Request $request, $id) {
        $data = array('form_url' => '');
        $data['subjects'] = DB::table('subjectcat')->select('subjectcat.*')->get();
        $classessubjects = DB::table('classname')->select('classname.*')->where('classname.classid', $id)->first();
        $data['classname'] = $classessubjects->classname;
        $data['subctFKid'] = $classessubjects->subctFKid;
        return view('admin.class.edit', $data);
    }

    public function postClassEdit(Request $request, $id) {
        $data = array('form_url' => '');
        $classname = array();
        $classname['subctFKid'] = Request::input('subctFKid');
        $classname['classname'] = Request::input('classname');
        $validation_rules = array(
            'subctFKid' => 'required',
            'classname' => [
                'required',
                Rule::unique('classname')->where(function ($query) use($classname, $id) {
                            return $query->where('classname', $classname['classname'])
                                            ->where('subctFKid', $classname['subctFKid'])->where('classid', '<>', $id);
                        }),
            ],
        );
        $validator = Validator::make(
                        Request::all(), $validation_rules
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput(Request::all());
        } else {
            $id = DB::table('classname')->where('classname.classid', $id)->update($classname);
            return redirect('admin/class/list');
        }
    }

    public function index() {
        return view('admin.dashboard');
    }

}
