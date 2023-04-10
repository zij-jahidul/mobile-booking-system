<div class="left side-menu">

    <div class="slimscroll-menu" id="remove-scroll">

        <!-- LOGO -->
        <div class="topbar-left">
            <a href="{{ url('admin/dashboard') }}" class="logo">
                <span>
                    <img src="{{ asset('admin') }}/images/logo.png" alt="" height="22">
                </span>
                <i>
                    <img src="{{ asset('admin') }}/images/logo_sm.png" alt="" height="28">
                </i>
            </a>
        </div>

        <!-- User box -->
        <div class="user-box">
            <div class="user-img">
                <img src="{{ asset('images/admin_images/admin_profile_image') }}/{{ Auth::guard('admin')->user()->image }}" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid">
            </div>
            <h5><a href="{{ url('admin/dashboard') }}">{{ Auth::guard('admin')->user()->name }}</a> </h5>
            {{-- <p class="text-muted">Admin Head</p> --}}
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <!--<li class="menu-title">Navigation</li>-->

                <li>
                    <a href="{{ url('/') }}" target="_blank">
                        <i class="fab fa-firefox-browser"></i><span></span> <span> Front-End </span>
                    </a>
                </li>


                <li>
                    <a href="{{ url('admin/dashboard') }}">
                        <i class="fi-air-play"></i><span class="@yield('sidebar_status_Dashboard')"></span> <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);"><i class="fi-layers"></i> <span>  Settings </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ url('admin/settings') }}">Update Admin Password</a></li>
                        <li><a href="{{ url('admin/update-admin-details') }}">Update Admin Details</a></li>

                    </ul>
                </li>

                <li class="@yield('sidebar_status_Catalogues')">
                    <a href="javascript: void(0);" class="@yield('sidebar_status_Catalogues')"><i class="fi-mail"></i><span> Catalogues </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li class="@yield('sidebar_status_Section')"><a href="{{ url('admin/section') }}">Category Active</a></li>
                        <li class="@yield('sidebar_status_Categories')"><a href="{{ url('admin/category') }}">Category</a></li>
                        <li class="@yield('sidebar_status_Product')"><a href="{{ url('admin/product') }}">Product</a></li>
                        <li class="@yield('sidebar_status_Banner')"><a href="{{ url('admin/banner') }}">Banner</a></li>
                        <li class="@yield('sidebar_status_Contact')"><a href="{{ url('admin/conatct/message') }}">Contact Message</a></li>
                        {{-- <li class="@yield('sidebar_status_Social')"><a href="{{ url('admin/social/link/1') }}">Social Media</a></li> --}}


                    </ul>
                </li>




            </ul>

        </div>
        <!-- Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
