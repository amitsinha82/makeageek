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

class Subject extends \Eloquent {

    protected $table = 'subjectcat';
    protected $primaryKey = 'subjcatid';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * function is used to get  class list with subject id
     * @param array $data
     * @return type
     */
    public function getSubjectList($data = array()) {
        $totalResult = DB::table($this->table)
                ->select($this->table . '.*');
        $searchQuery = '';
        if (isset($data['q'])) {
            $searchQuery = $data['q'];
        }

        if ($data) {
            if (isset($searchQuery) && !empty($searchQuery)) {
                $totalResult->where(function($query) use($searchQuery) {
                    $query->orWhere($this->table . '.subjcatName', 'like', '%' . $searchQuery . '%');
                });
            }
            $resultCount = $totalResult->get();
            $totalResult->orderby($this->table . '.subjcatName', 'asc');
            $result = $totalResult->skip($data['offset'])->take($data['limit'])->get();
        } else {
            $result = $totalResult->get();
            $resultCount = $result;
        }
        $resultCount = count($resultCount);
        return array('count' => $resultCount, 'result' => $result);
    }

}
