<?php
/*
 * Copyright 2018 OMS infoservices. 
 * All rights reserved.
 * File: IndexController.php
 * CodeLibrary/Project: oms
 * Author: Amit kumar
 * CreatedOn: date (03/05/2017) 
 */

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;


class IndexController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDashboard() {
         return view('front.dashboard');
    }
    
}
