<?php

/*
 * Copyright 2019 makeageek. 
 * All rights reserved.
 * File: AdminController.php
 * CodeLibrary/Project: makeageek
 * Author:Amit kumar
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginUserRequest;
use App\Providers\Admin\UserServiceProvider;
use Illuminate\Http\Request;
use App\Http\Requests;

class AdminController extends Controller {

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct() {
        //Log out Back
        header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
        header("Pragma: no-cache"); // HTTP 1.0.
        header("Expires: 0"); // Proxies.
    }

    public function getDashboard() {
        return view('admin.dashboard');
    }

    public function getLogin(Request $request) {
        $adminData = $request->session()->get('admindata');
        if ($adminData) {
            return redirect('admin/dashboard');
        } else {
            return view('admin.login');
        }
    }

    public function postLogin(LoginUserRequest $request) {
        $response = UserServiceProvider::userLogin($request->all());
        if ($response['success'] == true) {
            $userType = isset($response['data']['role']) ? $response['data']['role'] : '';
            $request->session()->put('admindata', $response['data']);
            $redirectObj = new \StdClass();
            if ($userType == 'admin') {
                $redirectObj = redirect('admin/dashboard');
            } else {
                $errorMsg = trans('messages.invalid_login_credentials');
                $redirectObj = redirect('admin/login')->with('error_msg', $errorMsg);
            }
            return $redirectObj;
        } else {
            return redirect()->back()->with('error_msg', $response['message']);
        }
    }

    public function getLogout(Request $request) {
        $request->session()->forget('admindata');
        return redirect('admin/login');
    }

}
