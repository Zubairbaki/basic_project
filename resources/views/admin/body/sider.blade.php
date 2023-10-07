<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        @php
        $adminData=  Auth::user();
    @endphp
        <div class="user-profile text-center mt-3">
            <div class="">
                <img src="{{ (!empty($adminData->profile_image))?url('upload/admin_images/'.$adminData->profile_image):url('upload/no_image')}}" alt="" class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">{{$adminData->name}}</h4>
                <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="index.html" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                        <span>Dashboard</span>
                    </a>
                </li>



                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Home Slider Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('home.slide')}}">Home Slide</a></li>

                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>About Page</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('about.page') }}">About Page</a></li>
                        <li><a href="{{ route('about.multi.image') }}">About Multi Image</a></li>
                        <li><a href="{{ route('all.multi.image') }}">All Multi Image</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>PortFolio Page</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.portfolio') }}">All Portfolio Page</a></li>
                        <li><a href="{{ route('add.portfolio') }}">Add PortFolio</a></li>
                    </ul>
                </li>





                <li class="menu-title">Pages</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Blog Category</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('all.blog.category')}}">All Blog category </a></li>
                        <li><a href="{{route('add.blog.category')}}">Add Blog category</a></li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-profile-line"></i>
                        <span>Blog Page</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('all.blog')}}"> ALL Blog</a></li>
                        <li><a href="{{route('add.blog')}}">Add Blog</a></li>

                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-profile-line"></i>
                        <span>Footer Page setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('footer.setup')}}"> Footer</a></li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-profile-line"></i>
                        <span>Contact Page </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('Contact.info')}}"> Contact Info</a></li>

                    </ul>
                </li>



            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
