<div class="left-sidebar">
    <!-- LOGO -->
    <div class="brand">
        <a href="{{URL::to('admin/dashboard')}}" class="logo">
            <span>
                @if(generalSettings()->dark_mode ==1)
                    <img src="{{asset('General_settings/dark_logo')}}/{{generalSettings()->dark_logo}}" alt="logo-large" class="logo-sm">
                @else
                    <img src="{{asset('General_settings/light_logo')}}/{{generalSettings()->light_logo}}" alt="logo-large" class="logo-sm">
                @endif
            </span>
            <span>
                <img src="{{ asset('admin/assets/images/logo.png') }}" alt="logo-large" class="logo-lg logo-light">
                <img src="{{ asset('admin/assets/images/logo-dark.png') }}" alt="logo-large" class="logo-lg logo-dark">
            </span>
        </a>
    </div>
    <div class="sidebar-user-pro media border-end">
        <div class="position-relative mx-auto">
            @if(Auth::user()->image)
                <img src="{{ URL::to('profile') . '/' . Auth::user()->image }}" alt="user" class="rounded-circle thumb-md">
            @else
                <img src="{{ asset('admin/assets/images/users/user-4.jpg') }}" alt="user" class="rounded-circle thumb-md">
            @endif
            <span class="online-icon position-absolute end-0"><i class="mdi mdi-record text-success"></i></span>
        </div>
        <div class="media-body ms-2 user-detail align-self-center">
            <h5 class="font-14 m-0 fw-bold">{{Auth::user()->name}} </h5>
            <p class="opacity-50 mb-0">{{Auth::user()->email}}</p>
        </div>
    </div>
    <div class="border-end">
        <ul class="nav nav-tabs menu-tab nav-justified" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#Main" role="tab"
                    aria-selected="true">M<span>ain</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#Extra" role="tab"
                    aria-selected="false">E<span>xtra</span></a>
            </li>
        </ul>
    </div>
    <!-- Tab panes -->

    <!--end logo-->
    <div class="menu-content h-100" data-simplebar>
        <div class="menu-body navbar-vertical">
            <div class="collapse navbar-collapse tab-content" id="sidebarCollapse">
                <!-- Navigation -->
                <ul class="navbar-nav tab-pane active" id="Main" role="tabpanel">
                    <!-- <li class="menu-label mt-0 text-primary font-12 fw-semibold">M<span>ain</span>
                    <br><span class="font-10 text-secondary fw-normal">Unique Dashboard</span></li>                     -->

                    <li class="nav-item mt-2">
                        <a class="nav-link" href="{{ URL::to('admin/dashboard') }}"><i
                                class="ti ti-dashboard menu-icon"></i><span>Dashboard</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('admin/slider') }}"><i
                                class="ti ti-map menu-icon"></i><span>Manage Slider</span></a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('admin/about_us') }}"><i
                                class="ti ti-file-diff menu-icon"></i><span>Manage About Us</span></a>
                    </li>
                       
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarService" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarService">
                            <i class="ti ti-brand-asana menu-icon"></i>
                            <span>Manage Service</span>
                        </a>
                        <div class="collapse " id="sidebarService">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ URL::to('admin/service_category') }}"></i><span>Category</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ URL::to('admin/service') }}"></i><span>Services</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('admin/talk') }}"><i
                                class="ti ti-file-diff menu-icon"></i><span>Talk To Us</span></a>
                    </li>
                    {{--
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('admin/manage_seo') }}"><i
                                class="ti ti-file-diff menu-icon"></i><span>Manage SEO</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('admin/header_image') }}"><i
                                class="ti ti-file-diff menu-icon"></i><span>Header Image</span></a>
                    </li>
                    
                 
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarPortfolio" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarPortfolio">
                            <i class="ti ti-stack menu-icon"></i>
                            <span>Manage Portfolio</span>
                        </a>
                        <div class="collapse " id="sidebarPortfolio">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ URL::to('admin/portfolio-category') }}"><span>Category</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ URL::to('admin/portfolio') }}"><span> Portfolio</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarBlog" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarBlog">
                            <i class="ti ti-stack menu-icon"></i>
                            <span>Manage Blog</span>
                        </a>
                        <div class="collapse " id="sidebarBlog">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ URL::to('admin/blog-category') }}"><span>Category</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ URL::to('admin/blog') }}"><span>Blog</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item mt-2">
                        <a class="nav-link" href="{{ URL::to('admin/team') }}"><i
                            class="ti ti-users menu-icon"></i><span>Manage Team</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarWebsite" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarWebsite">
                            <i class="ti ti-stack menu-icon"></i>
                            <span>Manage Website</span>
                        </a>
                        <div class="collapse " id="sidebarWebsite">
                            <ul class="nav flex-column">
                                <li class="nav-item mt-2">
                                    <a class="nav-link" href="{{ URL::to('admin/menu') }}"><span>Manage Menu</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ URL::to('admin/contents') }}"><span>Manage Contents</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ URL::to('admin/social_media') }}"><span>Manage Social Media</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ URL::to('admin/general_settings') }}">
                                        <span>Manage General Settings</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    
                    
                   
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('admin/gallery') }}"><i
                                class="ti ti-stack menu-icon"></i><span>Manage Gallery</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('admin/contact') }}"><i
                                class="ti ti-headphones menu-icon"></i><span>Manage Contact</span></a>
                    </li>
                    
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('admin/testimonial') }}"><i
                                class="ti ti-basket menu-icon"></i><span>Manage Testimonials</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('admin/statistics') }}"><i
                                class="ti ti-basket menu-icon"></i><span>Manage Statistics</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('admin/contact/messages') }}">
                            <i class="ti ti-message menu-icon"></i><span>Manage Messages</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('admin/email/subscribers') }}">
                            <i class="ti ti-settings menu-icon"></i><span>Email Subscribers</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav tab-pane" id="Extra" role="tabpanel">
                    <li>
                        <div class="update-msg text-center position-relative">
                            <button type="button" class="btn-close position-absolute end-0 me-2"
                                aria-label="Close"></button>
                            <img src="{{asset('admin/assets/images/speaker-light.png')}}" alt="" class="" height="110">
                            <h5 class="mt-0">Mannat Themes</h5>
                            <p class="mb-3">We Design and Develop Clean and High Quality Web Applications</p>
                            <a href="javascript: void(0);" class="btn btn-outline-warning btn-sm">Upgrade your plan</a>
                        </div>
                    </li> --}}
                </ul>
                <!--end navbar-nav--->
            </div>
            <!--end sidebarCollapse-->
        </div>
    </div>
</div>
