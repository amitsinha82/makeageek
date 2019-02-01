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
use Illuminate\Support\Facades\Auth;
use App\Providers\BaseServiceProvider;
use Illuminate\Support\Facades\Input;
use App\Models\User;

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
        try {
            $user = Admin::where('user_email', '=', $data['email'])->where('ad_password', '=', md5($data['password']))->first();
            if ($user) {
                static::$data['success'] = true;
                static::$data['data']['role'] = 'admin';
                static::$data['data']['email'] = $data['email'];
                static::$data['accessToken'] = $data['_token'];
                static::$data['message'] = trans('messages.login_success');
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

    public static function getUserList() {
        $userModel = new User();
        $data = array();
        $search = '';
        $input = Input::all();
        if (isset($input['search']['value'])) {
            $search = $input['search']['value'];
        }
        if (!$search) {
            $results = $userModel->getUserList(array('limit' => $input['length'], 'offset' => $input['start']));
        } else {
            $results = $userModel->getUserList(array('q' => $search, 'limit' => $input['length'], 'offset' => $input['start']));
        }
        $i = 1;
        foreach ($results['result'] as $result) {
            $data[] = array(
                $i,
                $result->user_type,
                ucwords($result->name),
                $result->u_email,
                $result->co_code.'-' . $result->u_phone,
                $result->school_name,
                $result->classname,
                $result->teacer_name,
                $result->account_start_date,
                $result->account_end_date,
                $result->status == '1'?'Active':'Inactive',
                $result->user_id,
            );
            $i++;
        }
        return array('data' => $data, 'recordsTotal' => $results['count'], "recordsFiltered" => $results['count']);
    }

}
