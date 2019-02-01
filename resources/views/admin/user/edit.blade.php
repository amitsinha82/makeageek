@extends('admin.layout.default_layout')
@section('title') {{{ 'Edit User' }}} @parent @stop {{-- Content --}}
@section('content')
<link rel="stylesheet" href="{{URL::asset('assets/admin/css/bootstrap-datepicker.css')}}" type="text/css" />
<script src="{{URL::asset('assets/admin/js/bootstrap-datepicker.js')}}"></script>
<!--BEGIN PAGE WRAPPER-->
<section class="vbox">
    @include('admin.layout.menu_header')
    <section>
        <section class="hbox stretch">
            <!-- .aside --> 
            @include('admin.layout.sidebar')
            <!-- /.aside --> 
            <section id="content"> 
                <section class="vbox"> 
                    <!-- Page Heading -->
                    <header class="header bg-white b-b b-light"> 
                        <p><strong>Add User</strong></p>
                        <ul class="breadcrumb pull-right mr-t-7"> 
                            <li><a href="{{url('admin')}}"><i class="fa fa-home"></i> Home</a></li> 
                            <li class="active">Edit User</li>
                        </ul>
                    </header> 
                    <!-- End of Page Heading -->     

                    <section class="scrollable wrapper w-f"> 
                        <div class="main-container">

                            @if (isset($errors) && $errors->any())
                            <div class="alert alert-danger alert-dismissable server-error alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-ban"></i> Error!</h4>
                                @foreach($errors->all() as $key=>$message)
                                <label class="error-msg">* {{$message}}</label><br/>
                                @endforeach
                            </div>
                            @elseif (Session::has('status'))
                            <div class="alert alert-danger alert-dismissable server-error alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-ban"></i> Error!</h4>
                                <label class="text-success">{{Session::get('status')}}</label><br/>
                            </div>
                            @endif
                            @if(Session::get('error_msg')) 
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-ban"></i> Error!</h4>
                                {{Session::get('error_msg')}}
                            </div>
                            @elseif(Session::get('success_msg'))
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> Success !</h4>
                                {{Session::get('success_msg')}}
                            </div>
                            @endif 

                            <form action="{{$form_url}}" name="user_form" id="user_form" class="stream-form change_password" method="post" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                <div class="row">
                                    <div class="panel-body"> 
                                        <div class="form-group"> 
                                            <label>User Type</label> 
                                            <div class="">
                                                <select disabled="disabled" class="form-control" name="user_type" id="user_type">
                                                    <option value="">Select</option>
                                                    @foreach($roleArray as $k => $v)
                                                    @if($k == $user_type) 
                                                    <option selected="selected" value="{{$k}}">{{$v}}</option>
                                                    @else
                                                    <option selected="selected" value="{{$k}}">{{$v}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                                <input type="hidden" name="user_type" value="{{$user_type}}" />
                                            </div>
                                        </div>
                                        <div class="form-group"> 
                                            <label>School Code</label> 
                                            <div class="">
                                                <select class="form-control" name="u_school_code" id="u_school_code">
                                                    <option value="">Select</option>
                                                    @foreach($schools as $item)
                                                    @if($item->school_id == $u_school_code)
                                                    <option selected="selected" value="{{$item->school_id}}">{{$item->school_name}}</option>
                                                    @else
                                                    <option value="{{$item->school_id}}">{{$item->school_name}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" id="ClassDiv"> 
                                            <label>Class
                                            <div class="">
                                                <select class="form-control" name="class" id="class">
                                                    <option value="">Select</option>
                                                    @foreach($classes as $item)
                                                    @if($item->classid == $class)
                                                    <option selected="selected" value="{{$item->classid}}">{{$item->classname}}</option>
                                                    @else
                                                    <option value="{{$item->classid}}">{{$item->classname}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" id="TeacherDiv"> 
                                            <label>School Teacher</label> 
                                            <div class="">
                                                <select class="form-control" name="tech_id" id="tech_id">
                                                    <option value="">Select</option>
                                                    @foreach($teachers as $item)
                                                    @if($item->user_id == $tech_id)
                                                    <option selected="selected" value="{{$item->user_id}}">{{$item->name}}</option>
                                                    @else
                                                    <option value="{{$item->user_id}}">{{$item->name}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group"> 
                                            <label>First Name</label> 
                                            <div class="">
                                                <input required="required" type="text" value="<?php echo old('u_first_name') ? old('u_first_name') : (empty($u_first_name) ? '' : $u_first_name) ?>" class="form-control tb-big band_name" name="u_first_name" id="u_first_name" />
                                            </div>
                                        </div>
                                        <div class="form-group"> 
                                            <label>Last Name</label> 
                                            <div class="">
                                                <input type="text" value="<?php echo old('u_last_name') ? old('u_last_name') : (empty($u_last_name) ? '' : $u_last_name) ?>" class="form-control tb-big band_name" name="u_last_name" id="u_last_name" />
                                            </div>
                                        </div>
                                        <div class="form-group"> 
                                            <label>Email Id</label> 
                                            <div class="">
                                                <input required="required" type="text" value="<?php echo old('u_email') ? old('u_email') : (empty($u_email) ? '' : $u_email) ?>" class="form-control tb-big band_name" name="u_email" id="u_email" />
                                            </div>
                                        </div>
                                        <div class="form-group"> 
                                            <label>Country Code</label> 
                                            <div class="">
                                                <input maxlength="5" type="text" value="<?php echo old('co_code') ? old('co_code') : (empty($co_code) ? '' : $co_code) ?>" class="form-control tb-big band_name" name="co_code" id="co_code" />
                                            </div>
                                        </div>
                                        <div class="form-group"> 
                                            <label>Phone</label> 
                                            <div class="">
                                                <input maxlength="5" type="text" value="<?php echo old('u_phone') ? old('u_phone') : (empty($u_phone) ? '' : $u_phone) ?>" class="form-control tb-big band_name" name="u_phone" id="u_phone" />
                                            </div>
                                        </div>

                                        <div class="form-group" id="StartDateDiv"> 
                                            <label>User Account Start Date</label> 
                                            <div class="">
                                                <input type="text" value="<?php echo old('account_start_date') ? old('account_start_date') : (empty($account_start_date) ? '' : $account_start_date) ?>" class="form-control tb-big band_name" name="account_start_date" id="account_start_date" />
                                            </div>
                                        </div>
                                        <div class="form-group" id="EndDateDiv"> 
                                            <label>User Account End Date</label> 
                                            <div class="">
                                                <input type="text" value="<?php echo old('account_end_date') ? old('account_end_date') : (empty($account_end_date) ? '' : $account_end_date) ?>" class="form-control tb-big band_name" name="account_end_date" id="account_end_date" />
                                            </div>
                                        </div>
                                        <div class="form-group"> 
                                            <label>Password</label> 
                                            <div class="">
                                                <input type="password" value="" class="form-control tb-big band_name" name="u_password" id="u_password" />
                                            </div>
                                        </div>
                                        <div class="form-group"> 
                                            <label>Confirm Password</label> 
                                            <div class="">
                                                <input type="password" value="" class="form-control tb-big band_name" name="u_confirm_password"  id="u_confirm_password" />
                                            </div>
                                        </div>
                                        <div class="form-group"> 
                                            <label>Status</label> 
                                            <div class="">
                                                <select class="form-control" name="status" id="status">
                                                    <option value="">Select</option>
                                                    @foreach($statuses as $item)
                                                    @if($item->id == $status)
                                                    <option selected="selected" value="{{$item->id}}">{{$item->name}}</option>
                                                    @else
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group"> 
                                    <div class="custom-file-input">
                                        <button type="submit" class="btn btn-s-md green-button" onclick="return formvalidation()">Save</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="mar-b-40"></div>
                    </section>

                </section> 
            </section>
        </section>
    </section>
</section>
<!-- /#page-wrapper -->
<!--END PAGE WRAPPER-->
@section('admin.layout.footer')

<!--<script src="{{URL::asset('admin-panel/assets/js/user-list.js')}}"></script>-->
<script type="text/javascript">
    function formvalidation() {
        var firstdate = $('#account_start_date').val();
        var seconddate = $('#account_end_date').val();
        if (firstdate != '' || seconddate != '') {
            if (dateGreater(firstdate, seconddate)) {
                alert('Account start date should be less than end date.');
                return false;
            }
        }

        if ($('#u_password').val() != $('#u_confirm_password').val()) {
            alert('Password is not same as confirm password.');
            return false;
        }
    }
    $(document).ready(function () {
        $('#account_start_date').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayBtn: true,
            todayHighlight: true,
            startDate: '-0d'
        });

        $('#account_end_date').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayBtn: true,
            todayHighlight: true,
            startDate: '-0d'
        });
        $("#u_school_code").change(function () {
            $('#tech_id').find('option').not(':first').remove();
            var selectedSchool = $("#u_school_code option:selected").val();
            $.ajax({
                type: "get",
                url: SITE_URL + '/admin/user/teacher-list-ajax',
                data: {school_id: selectedSchool}
            }).done(function (data) {
                var jsonCategoryList = data;
                var newOption = '';
                jQuery.each(jsonCategoryList, function (index, element) {
                    newOption = document.createElement('option');
                    newOption.value = element.user_id;
                    newOption.text = element.name;
                    $('#tech_id').append(newOption);
                });
            });
        });
        $("#user_type").change(function () {
            if($("#user_type").val() == '2'){
                $('#TeacherDiv').hide();
                $('#ClassDiv').hide();
            }else{
                $('#TeacherDiv').show();
                $('#ClassDiv').show();
            }
        });
    });

    //function to check if first date is greater than second date
    function dateGreater(firstdate, seconddate) {
        if (firstdate == 'undefined' || seconddate == 'undefined' || firstdate == '' || seconddate == '')
            return true;
        var dateArray = firstdate.split('-');
        var dateToCompare = new Date(dateArray[0], dateArray[1] - 1, dateArray[2]).getTime();
        dateArray = seconddate.split('-');
        var currentDate = new Date(dateArray[0], dateArray[1] - 1, dateArray[2]).getTime();
        if (dateToCompare > currentDate)
            return true;
        else
            return false;
    }
</script>
@stop
@stop
