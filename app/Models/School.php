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

class School extends \Eloquent {

    protected $table = 'school';
    protected $primaryKey = 'school_id';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * function is used to get  user list
     * @param array $data
     * @return type
     */
    public function getSchoolList($data = array()) {
        $totalResult = DB::table($this->table)
                ->select($this->table . '.*');
        $searchQuery = '';
        if (isset($data['q'])) {
            $searchQuery = $data['q'];
        }

        if ($data) {
            if (isset($searchQuery) && !empty($searchQuery)) {
                $totalResult->where(function($query) use($searchQuery) {
                    $query->orWhere($this->table . '.school_name', 'like', '%' . $searchQuery . '%');
                    $query->orWhere($this->table . '.school_email', 'like', '%' . $searchQuery . '%');
                    $query->orWhere($this->table . '.school_code', 'like', '%' . $searchQuery . '%');
                });
            }
            $resultCount = $totalResult->get();
            $totalResult->orderby($this->table . '.school_id', 'desc');
            $result = $totalResult->skip($data['offset'])->take($data['limit'])->get();
        } else {
            $result = $totalResult->get();
            $resultCount = $result;
        }
        $resultCount = count($resultCount);
        return array('count' => $resultCount, 'result' => $result);
    }

}
