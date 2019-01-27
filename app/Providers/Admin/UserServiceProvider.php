<?php

/*
 * Copyright 2018 OMS infoservices. 
 * All rights reserved.
 * File: UserServiceProvider.php
 * CodeLibrary/Project: oms
 * Author: Amit kumar
 * CreatedOn: date (02/05/2017) 
 */

namespace App\Providers\Admin;

use App\Models\Admin;

//use App\Models\Report;
use Illuminate\Support\Facades\Auth;
//use App\Utilities\Mail;
use App\Providers\BaseServiceProvider;
//use DateTime;
//use Illuminate\Support\Facades\Input;

/**
 * UserServiceProvider class conatains methods for user management
 */
class UserServiceProvider extends BaseServiceProvider {

    /**
     * function is used to admin login
     * @param array $data
     * @return json
     */
    public static function userLogin($data) {
//        print_r($request->all());die;
        try {
            $user = Admin::where('user_email', '=', $data['email'])->where('ad_password', '=', md5($data['password']))->first();
//            echo '<pre>asd';print_r($user->ad_password);die;
            if ($user) { 
//                Auth::login($user);
//                die('success');
//                $loginToken = static::appUserLoginWithEmailMobil($data);
//                $userData = Auth::user()->id;echo '<pre>';print_r($userData);die;
//                $CompanyData = Company::where('id', '=', $userData['company_id'])
//                        ->first();
//                if ($loginToken) { //if login token exist then return it with success status
                    static::$data['success'] = true;
                    static::$data['data']['role'] = 'admin';
                    static::$data['data']['email'] = $data['email'];
//                    static::$data['data']['company'] = $CompanyData;
//                    static::$data['accessToken'] = $loginToken;
                    static::$data['accessToken'] = $data['_token'];
                    static::$data['message'] = trans('messages.login_success');
//                }
            } else {
                static::$data['success'] = false;
                static::$data['accessToken'] = '';
                static::$data['message'] = trans('messages.invalid_login_credentials');
            }
        } catch (\Exception $e) {
            static::setExceptionError($e);
        }

        return static::$data;
    }

}
