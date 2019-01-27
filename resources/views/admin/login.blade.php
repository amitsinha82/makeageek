@extends('admin.layout.default_layout')
@section('title') {{'Admin Login'}}  @parent @stop {{-- Content --}}
@section('content')
<div class="login-bg">
<section id="content" class="">
    <div class="container aside-xxl">
        <a class="navbar-brand block" href="#">
            <img src="{{URL::asset('assets/admin/images/nlogo.png')}}" class="" alt="">
            <span class="textLogo">Makeageek</spakn>
        </a> 
        <section id="signIn" class="panel panel-default bg-white m-t-lg animated fadeInUp">
            <header class="panel-heading text-center"> 
                <strong>Admin Login</strong> 
            </header>
            <form action="{{url('admin/login')}}" id="admin_login" class="panel-body wrapper-lg admin_login" method="post">
                {!! csrf_field() !!}


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


                <div class="form-group"> 
                    <label class="control-label">Email</label>
                    <input type="hidden" name="user_type" value="{{config('constants.USER_TYPE.admin')}}" />
                    <input type="email" name="email" id="login_email" required="true" placeholder="Please enter email" class="form-control input-lg login_email" value="" /> 
                </div>
                <div class="form-group"> 
                    <label class="control-label">Password</label> 
                    <input type="password" name="password" required="true" id="password" placeholder="Please enter password" class="form-control input-lg" value="" /> 
                </div>
            
                <a href="{{url('admin/user/forget-password')}}" class="pull-right m-t-xs">
                    <small>Forgot password?</small>
                </a> 
                <button type="submit" class="btn btn-s-md btn-login ">
                    <b>Login</b>
                </button>
            </form>
        </section>


    </div>
</section>
<!-- footer --> 
<footer id="footer">
    <div class="text-center padder">
        <p> <small>2019 © Makeage</small> </p>
    </div>
</footer>
@section('admin.layout.footer')
</div>
<!--<script src="{{URL::asset('/assets/admin/js/login.js')}}"></script> -->
@stop
@stop