@extends('admin.layout.default_layout')
@section('title') {{{ 'Edit School' }}} @parent @stop {{-- Content --}}
@section('content')

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
                        <p><strong>Edit School</strong></p>
                        <ul class="breadcrumb pull-right mr-t-7"> 
                            <li><a href="{{url('admin')}}"><i class="fa fa-home"></i> Home</a></li> 
                            <li class="active">Edit School</li>
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
                            <form action="{{$form_url}}" name="school_form" id="school_form" class="stream-form change_password" method="post" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                <div class="row">
                                    <div class="panel-body"> 
                                        <div class="form-group"> 
                                            <label>School Name</label> 
                                            <div class="">
                                                <input required="required" type="text" value="<?php echo old('school_name') ? old('school_name') : (empty($school_name) ? '' : $school_name) ?>" class="form-control tb-big band_name" name="school_name" id="school_name" />
                                            </div>
                                        </div>
                                        <div class="form-group"> 
                                            <label>School Email</label> 
                                            <div class="">
                                                <input required="required" type="email" value="<?php echo old('school_email') ? old('school_email') : (empty($school_email) ? '' : $school_email) ?>" class="form-control tb-big band_name" name="school_email" id="school_email" />
                                            </div>
                                        </div>
                                        <div class="form-group"> 
                                            <label>School Logo</label> 
                                            <div class="">
                                                <input type="file" id="school_logo" name="school_logo" />
                                                <img src="<?php echo $view_logo;?>" height="40" width="40" />
                                                <input type="hidden" name="logo" value="<?php echo old('logo') ? old('logo') : (empty($logo) ? '' : $logo) ?>" />
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group"> 
                                    <div class="custom-file-input">
                                        <button type="submit" class="btn btn-s-md green-button">Save</button>
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
@stop
@stop
