<?php

/*
 * Copyright 2018 OMS infoservices. 
 * All rights reserved.
 * File: User.php
 * CodeLibrary/Project: oms
 * Author: Amit
 * CreatedOn: date (25/08/2017) 
 */

namespace App\Models;

use DB;

class User extends \Eloquent {

    protected $table = 'usertable';
    protected $primaryKey = 'user_id';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['u_password'];

    /**
     * function is used to get  user list
     * @param array $data
     * @return type
     */
    public function getUserList($data = array()) {
        $totalResult = DB::table($this->table)
                ->leftjoin('school', $this->table.'.u_school_code', '=', 'school.school_id')
                ->leftjoin('classname', $this->table.'.class', '=', 'classname.classid')
                ->leftjoin('user_role', $this->table.'.user_type', '=', 'user_role.type_id')
                ->leftjoin('usertable as teacher', $this->table.'.tech_id', '=', 'teacher.user_id')
                ->select($this->table.'.*',DB::raw("concat(usertable.u_first_name,' ',usertable.u_last_name) as name"),DB::raw("concat(teacher.u_first_name,' ',teacher.u_last_name) as teacer_name"),'school.school_name','classname.classname as classname','user_role.user_type');
                
        $searchQuery = '';
        if (isset($data['q'])) {
            $searchQuery = $data['q'];
        }

        if ($data) {
            if (isset($searchQuery) && !empty($searchQuery)) {
                $totalResult->where(function($query) use($searchQuery) {
                    $query->orWhere($this->table . '.u_first_name', 'like', '%' . $searchQuery . '%');
                    $query->orWhere($this->table . '.u_last_name', 'like', '%' . $searchQuery . '%');
                    $query->orWhere($this->table . '.u_email', 'like', '%' . $searchQuery . '%');
                });
            }
            $resultCount = $totalResult->get();
            $totalResult->orderby($this->table . '.user_id', 'desc');
            $result = $totalResult->skip($data['offset'])->take($data['limit'])->get();
        } else {
            $result = $totalResult->get();
            $resultCount = $result;
        }
        $resultCount = count($resultCount);
        return array('count' => $resultCount, 'result' => $result);
    }

}
