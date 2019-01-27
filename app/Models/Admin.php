<?php

/*
 * Copyright 2018 OMS infoservices. 
 * All rights reserved.
 * File: Admin.php
 * CodeLibrary/Project: oms
 * Author: Amit
 * CreatedOn: date (25/08/2017) 
 */

namespace App\Models;

//use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Admin extends \Eloquent {

    protected $table = 'admin';
    protected $primaryKey = 'ad_id';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'ad_password', 'user_registered'
    ];

}
