<div class="topbar">            
    <!-- Navbar -->
    <nav class="navbar-custom" id="navbar-custom">    
        <ul class="list-unstyled topbar-nav float-end mb-0">
            {{-- <li class="dropdown">
                <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#" role="button"
                aria-haspopup="false" aria-expanded="false">
                <img src="{{asset('admin/assets/images/flags/us_flag.jpg')}}" alt="" class="thumb-xxs rounded">
            </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#"><img src="{{asset('admin/assets/images/flags/us_flag.jpg')}}" alt="" height="15" class="me-2">English</a>
                    <a class="dropdown-item" href="#"><img src="{{asset('admin/assets/images/flags/spain_flag.jpg')}}" alt="" height="15" class="me-2">Spanish</a>
                    <a class="dropdown-item" href="#"><img src="{{asset('admin/assets/images/flags/germany_flag.jpg')}}" alt="" height="15" class="me-2">German</a>
                    <a class="dropdown-item" href="#"><img src="{{asset('admin/assets/images/flags/french_flag.jpg')}}" alt="" height="15" class="me-2">French</a>
                </div>
            </li><!--end topbar-language--> --}}
    
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#" role="button"
                    aria-haspopup="false" aria-expanded="false">
                    <i class="ti ti-mail"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-lg pt-0">
        
                    <h6 class="dropdown-item-text font-15 m-0 py-3 border-bottom d-flex justify-content-between align-items-center">
                        Emails <span class="badge bg-soft-primary badge-pill">{{ getLetestMessageCount() }}</span>
                    </h6> 
                    <div class="notification-menu" data-simplebar>
                        <!-- item-->
                        @foreach(getLetestMessage() as $key => $val)
                        <a href="#" class="dropdown-item py-3">
                            <small class="float-end text-muted ps-2">{{timeFormate1($val->created_at)}}</small>
                            <div class="media">
                                <div class="avatar-md bg-soft-primary">
                                    <i class="ti ti-mail"></i>
                                </div>
                                <div class="media-body align-self-center ms-2 text-truncate">
                                    <h6 class="my-0 fw-normal text-dark">{{$val->name}}</h6>
                                    <small class="text-muted mb-0">{{$val->title}}</small>
                                </div><!--end media-body-->
                            </div><!--end media-->
                        </a><!--end-item-->
                       @endforeach
                    </div>
                    <!-- All-->
                    <a href="{{ URL::to('admin/contact/messages') }}" class="dropdown-item text-center text-primary">
                        View all <i class="fi-arrow-right"></i>
                    </a>
                </div>
            </li>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#" role="button"
                    aria-haspopup="false" aria-expanded="false">
                    <i class="ti ti-bell"></i>
                    <span class="alert-badge"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-lg pt-0">
        
                    <h6 class="dropdown-item-text font-15 m-0 py-3 border-bottom d-flex justify-content-between align-items-center">
                        Notifications <span class="badge bg-soft-primary badge-pill">{{ getSubscriberCount() }}</span>
                    </h6> 
                    <div class="notification-menu" data-simplebar>
                        <!-- item-->
                        @foreach(getSubscribers() as $key => $val)
                        <a href="#" class="dropdown-item py-3">
                            <small class="float-end text-muted ps-2">{{timeFormate1($val->created_at)}}</small>
                            <div class="media">
                                <div class="avatar-md bg-soft-primary">
                                    <i class="ti ti-chart-arcs"></i>
                                </div>
                                <div class="media-body align-self-center ms-2 text-truncate">
                                    <h6 class="my-0 fw-normal text-dark">{{$val->email}}</h6>
                                </div><!--end media-body-->
                            </div><!--end media-->
                        </a><!--end-item-->
                        @endforeach
                    </div>
                    <!-- All-->
                    <a href="{{ URL::to('admin/email/subscribers') }}" class="dropdown-item text-center text-primary">
                        View all <i class="fi-arrow-right"></i>
                    </a>
                </div>
            </li>

            <li class="dropdown">
                <a class="nav-link dropdown-toggle nav-user" data-bs-toggle="dropdown" href="#" role="button"
                    aria-haspopup="false" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        @if(Auth::user()->image)
                            <img src="{{ URL::to('profile') . '/' . Auth::user()->image }}" alt="user" class="rounded-circle me-2 thumb-sm">
                        @else
                        <img src="{{asset('admin/assets/images/users/user-4.jpg')}}" alt="profile-user" class="rounded-circle me-2 thumb-sm" />
                        @endif
                        
                        <div>
                            <small class="d-none d-md-block font-11">{{Auth::user()->name}}</small>
                            <span class="d-none d-md-block fw-semibold font-12">{{Auth::user()->email}}<i
                                    class="mdi mdi-chevron-down"></i></span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item" href="{{URL::to('admin/profile')}}"><i class="ti ti-user font-16 me-1 align-text-bottom"></i> Profile</a>
                {{-- <a class="dropdown-item" href="crypto-settings.html"><i class="ti ti-settings font-16 me-1 align-text-bottom"></i> Settings</a> --}}
                <div class="dropdown-divider mb-0"></div>
                {{-- <a class="dropdown-item" href="{{ URL::to('logout') }}"><i class="ti ti-power font-16 me-1 align-text-bottom"></i> Logout</a> --}}
                <form  action="{{ URL::to('logout') }}" method="post">
                    @csrf
                   
                    <button type="submit" class="dropdown-item"><i class="ti ti-power font-16 me-1 align-text-bottom"></i>Logout</button>
                </form>
            </div>
            </li><!--end topbar-profile-->
            {{-- <li class="notification-list">
                <a class="nav-link arrow-none nav-icon offcanvas-btn" href="{{ asset('admin/general_settings') }}">
                    <i class="ti ti-settings ti-spin"></i>
                </a>
            </li>    --}}
        </ul><!--end topbar-nav-->

        <ul class="list-unstyled topbar-nav mb-0">                        
            <li>
                <button class="nav-link button-menu-mobile nav-icon" id="togglemenu">
                    <i class="ti ti-menu-2"></i>
                </button>
            </li> 
            {{-- <li class="hide-phone app-search">
                <form role="search" action="#" method="get">
                    <input type="search" name="search" class="form-control top-search mb-0" placeholder="Type text...">
                    <button type="submit"><i class="ti ti-search"></i></button>
                </form>
            </li>                        --}}
        </ul>
    </nav>
    <!-- end navbar-->
</div>