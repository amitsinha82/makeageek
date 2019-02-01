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
use App\Providers\BaseServiceProvider;
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

}
