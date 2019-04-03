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

class Classes extends \Eloquent {

    protected $table = 'classname';
    protected $primaryKey = 'classid';

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
    public function getClassList($data = array()) {
        $totalResult = DB::table($this->table)
                ->select($this->table . '.*','subjectcat.subjcatName')
                ->leftjoin('subjectcat', $this->table . '.subctFKid', '=', 'subjectcat.subjcatid');
        $searchQuery = '';
        if (isset($data['q'])) {
            $searchQuery = $data['q'];
        }

        if ($data) {
            if (isset($searchQuery) && !empty($searchQuery)) {
                $totalResult->where(function($query) use($searchQuery) {
                    $query->orWhere($this->table . '.classname', 'like', '%' . $searchQuery . '%');
                    $query->orWhere($this->table . '.subctFKid', 'like', '%' . $searchQuery . '%');
                });
            }
            $resultCount = $totalResult->get();
            $totalResult->orderby($this->table . '.classname', 'asc');
            $result = $totalResult->skip($data['offset'])->take($data['limit'])->get();
        } else {
            $result = $totalResult->get();
            $resultCount = $result;
        }
        $resultCount = count($resultCount);
        return array('count' => $resultCount, 'result' => $result);
    }

}
