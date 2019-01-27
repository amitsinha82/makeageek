@extends('admin.layout.default_layout')
@section('title') {{{ 'School List' }}} @parent @stop {{-- Content --}}
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
                        <p><strong>Schools</strong></p>
                        <ul class="breadcrumb pull-right mr-t-7"> 
                            <li><a href="{{url('admin/dashboard')}}"><i class="icon icon-home"></i> Home</a></li> 
                            <li class="active">School List</li> 
                        </ul>
                    </header> 
                    <!-- End of Page Heading -->     
                            
                    <section class="scrollable wrapper w-f"> 
                        <div class="main-container padd-bottom-70">
                            <div style="margin-bottom: 10px;float: right"></div>
                              @if (count($errors) > 0)
                                <!-- Form Error List -->
                                <div class="alert alert-danger">
                                    <strong>Whoops! Something went wrong!</strong>
                                    <br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @elseif(Session::has('message') && !Session::has('status'))
                                <div class="alert alert-danger text-left">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul><li>{{ Session::get('message') }}</li></ul>
                                </div>
                            @elseif(Session::has('message') && Session::has('status'))
                                <div class="alert alert-success text-left">
                                    <ul><li>{{ Session::get('message') }}</li></ul>
                                </div>
                            @endif  
                            <section class="">
                                <div class="col-md-6">

                                <form action="addSubmit" method="post" enctype="multipart/form-data">

                                    {{ csrf_field() }}

                                    <div class="form-group">

                                        <label for="Product Name">School Name</label>

                                        <input type="text" name="name" class="form-control"  placeholder="Product Name" >

                                    </div>

                                    <label for="Product Name">Product photos (can attach more than one):</label>

                                    <br />

                                    <input type="file" class="" name="photos[]" multiple />

                                    <br /><br />

                                    <input type="submit" class="btn btn-primary" value="submit" />

                                </form>

                            </div>
                            </section>
                        </div>
                    </section>

                </section> 
            </section>
        </section>
    </section>
</section>
<!-- /#page-wrapper -->
<!--END PAGE WRAPPER-->
@section('scriptjs')
@stop
@stop
