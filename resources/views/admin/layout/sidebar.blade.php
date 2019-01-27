<aside class="bg-left-nav lter aside-md hidden-print hidden-xs" id="nav">
    <section class="vbox">
        <section class="w-f scrollable">
            <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
                <!-- nav --> 
                <nav class="nav-primary hidden-xs">
                    <ul class="nav">
                        <li class="{{ Request::is('admin/school') ||Request::is('admin/school/*') ? 'active treeview' : ''}}" >
                            <a href="#" class=""> <span class="pull-right"> <i class="fa fa-angle-down text"></i> <i class="fa fa-angle-up text-active"></i> </span> <span>School List</span> </a> 
                            <ul class="nav lt">
                                <li class="{{ Request::is('admin/school/school-list') ? 'active' : ''}}"> <a href="{{ url('admin/school/school-list')}}"> <i class="fa fa-angle-right"></i> <span>All Schools</span> </a> </li>

                                <li class="{{ Request::is('admin/school/school-add') ? 'active' : ''}}"> <a href="{{ url('admin/school/school-add')}}"> <i class="fa fa-angle-right"></i> <span>Add School</span> </a> </li>


                            </ul>
                        </li>
                        <!--
                         <li class="{{Request::is('admin/user/*') ? 'active treeview' : ''}}" >
                             <a href="#" class=""> <span class="pull-right"> <i class="fa fa-angle-down text"></i> <i class="fa fa-angle-up text-active"></i> </span> <span>Reported Users</span> </a> 
                             <ul class="nav lt">
                                 <li class="{{ Request::is('admin/user/get-suspended-user-list') ? 'active' : ''}}"> <a href="{{ url('admin/user/get-suspended-user-list')}}"> <i class="fa fa-angle-right"></i> <span>Suspended User's List</span> </a> </li>
                                 <li class="{{ Request::is('admin/user/get-flagged-user-list') ? 'active' : ''}}"> <a href="{{ url('admin/user/get-flagged-user-list')}}"> <i class="fa fa-angle-right"></i> <span>Flagged User's List</span> </a> </li>
                             </ul>
                         </li>
                        -->
                    </ul>

                </nav>
                <!-- / nav --> 
            </div> 
        </section>

    </section>
</aside>
