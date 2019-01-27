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

use App\Models\School;
//use Illuminate\Support\Facades\Auth;
//use App\Utilities\Mail;
use App\Providers\BaseServiceProvider;
//use DateTime;
use Illuminate\Support\Facades\Input;

/**
 * UserServiceProvider class conatains methods for user management
 */
class SchoolServiceProvider extends BaseServiceProvider {

    public static function getSchoolList() {
        $schoolModel = new School();
        $data = array();
        $search = '';
        $input = Input::all();
        if (isset($input['search']['value'])) {
            $search = $input['search']['value'];
        }
        if (!$search) {
            $results = $schoolModel->getSchoolList(array('limit' => $input['length'], 'offset' => $input['start']));
        } else {
            $results = $schoolModel->getSchoolList(array('q' => $search, 'limit' => $input['length'], 'offset' => $input['start']));
        }
        $i = 1;
//        echo '<pre>';print_r($results['result']);die;
        foreach ($results['result'] as $result) {
            $data[] = array(
                $i,
                ucwords($result->school_name),
                ucwords($result->school_email),
                $result->school_code,
                url('../storage/app/images/school_images/' . $result->logo),
                $result->school_id,
            );
            $i++;
        }
        return array('data' => $data, 'recordsTotal' => $results['count'], "recordsFiltered" => $results['count']);
    }

    /**
     * used to get list of all  user Detail by id
     *
     * @return void
     */
    public static function getUserDetails($id) {
        try {
            $query = User::where(function($query) use($id) {
                        $query->where('users.role', '!=', User::IS_ADMIN)
                                ->where('users.id', '=', $id);
                    });

            $query->where('users.status', User::IS_ACTIVE);
            $query->select('users.*');
            $users = $query->orderBy('users.id', 'ASC')->first();

            static::$data['data'] = $users;
            static::$data['success'] = true;
            static::$data['message'] = trans('messages.record_listed');
        } catch (\Exception $e) {
            static::setExceptionError($e);
        }

        return static::$data;
    }

    /**
     * function is used to get user list
     * @return type
     */
    public static function deleteUserWithReaon() {
        $input = Input::all();
        $status = User::where('id', '=', $input['user_id'])
                ->update([
            'status' => 3,
        ]);
        if ($status) {
            static::$data['success'] = true;
            static::$data['message'] = trans('messages.user_blocked');
        } else {
            static::$data['success'] = false;
            static::$data['message'] = trans('messages.user_not_exist');
        }
        return static::$data;
        /*
         * 
         * @todo, we will uncomment this code when we send email
         */
        /* if ($user) {

          $password = str_random(8);
          $hashedPassword = \Hash::make($password);
          static::$mailData['view'] = 'email.admin.delete_user';
          static::$mailData['data'] = array('password' => $reason);
          static::$mailData['user'] = $user;
          static::$mailData['subject'] = config('constants.SUBJECT.admin_forgot_password');

          $mail = new Mail();
          $status = $mail->sendMail(static::$mailData);

          if ($status) {

          $user->password = $hashedPassword;
          $user->save();
          static::$data['success'] = true;
          static::$data['message'] = trans('messages.forgot_password_email');
          }
          } else {
          static::$data['success'] = false;
          static::$data['message'] = trans('messages.user_not_exist');
          }
         * 
         */
    }

}
