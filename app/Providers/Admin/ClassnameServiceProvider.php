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

use App\Models\Classes;
use App\Providers\BaseServiceProvider;
use Illuminate\Support\Facades\Input;

class ClassnameServiceProvider extends BaseServiceProvider {

    public static function getClassList() {
        $classesModel = new Classes();
        $data = array();
        $search = '';
        $input = Input::all();
        if (isset($input['search']['value'])) {
            $search = $input['search']['value'];
        }
        if (!$search) {
            $results = $classesModel->getClassList(array('limit' => $input['length'], 'offset' => $input['start']));
        } else {
            $results = $classesModel->getClassList(array('q' => $search, 'limit' => $input['length'], 'offset' => $input['start']));
        }
        $i = 1;
//        echo '<pre>';print_r($results['result']);die;
        foreach ($results['result'] as $result) {
            $data[] = array(
                $i,
                ucwords($result->classname),
                ucwords($result->subjcatName),
                $result->classid,
            );
            $i++;
        }
        return array('data' => $data, 'recordsTotal' => $results['count'], "recordsFiltered" => $results['count']);
    }

}
