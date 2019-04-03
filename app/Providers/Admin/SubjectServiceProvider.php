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

use App\Models\Subject;
use App\Providers\BaseServiceProvider;
use Illuminate\Support\Facades\Input;

class SubjectServiceProvider extends BaseServiceProvider {

    public static function getSubjectList() {
        $classesModel = new Subject();
        $data = array();
        $search = '';
        $input = Input::all();
        if (isset($input['search']['value'])) {
            $search = $input['search']['value'];
        }
        if (!$search) {
            $results = $classesModel->getSubjectList(array('limit' => $input['length'], 'offset' => $input['start']));
        } else {
            $results = $classesModel->getSubjectList(array('q' => $search, 'limit' => $input['length'], 'offset' => $input['start']));
        }
        $i = 1;
//        echo '<pre>';print_r($results['result']);die;
        foreach ($results['result'] as $result) {
            $data[] = array(
                $i,
                ucwords($result->subjcatName),
                $result->subjcatid,
            );
            $i++;
        }
        return array('data' => $data, 'recordsTotal' => $results['count'], "recordsFiltered" => $results['count']);
    }

}
