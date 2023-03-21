<!-- Start Header Top 
    ============================================= -->
    <div class="top-bar-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3 logo">
                    <span>
                        @if(generalSettings()->dark_mode ==1)
                            <img src="{{asset('General_settings/dark_logo')}}/{{generalSettings()->dark_logo}}" alt="logo-large" class="logo-sm">
                        @else
                            <img src="{{asset('General_settings/light_logo')}}/{{generalSettings()->light_logo}}" alt="logo-large" class="logo-sm">
                        @endif
                    </span>
                </div>
                <div class="col-md-9 address-info text-right">
                    <div class="info box">
                        <ul>
                            <li>
                                <div class="icon">
                                    <i class="flaticon-email"></i>
                                </div>
                                <div class="info">
                                    <span>Email</span>
                                    {{contact()->email}} <br>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="flaticon-call-center"></i>
                                </div>
                                <div class="info">
                                    <span>Phone</span>
                                    
                                    {{contact()->phone}} <br>
                                    
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="flaticon-countdown"></i>
                                </div>
                                <div class="info">
                                    <span>Office Hours</span> {{generalSettings()->office_hours}}
                                </div> 
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top -->

    <!-- Header 
    ============================================= -->
    <header id="home">

        <!-- Start Navigation -->
        <nav class="navbar navbar-default attr-border active-border logo-less small-pad navbar-sticky bootsnav">

            <!-- Start Top Search -->
            <div class="top-search">
                <div class="container">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                    </div>
                </div>
            </div>
            <!-- End Top Search -->

            <div class="container">

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        {{-- <li class="search"><a href="#"><i class="fas fa-search"></i></a></li> --}}
                    </ul>
                    <ul class="social">
                            @if(check_social_icon('Facebook'))
                            <li>
                                <a href="{{check_social_icon('Facebook')->URL}}"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            @endif
                            @if(check_social_icon('Instagram'))
                            <li>
                                <a href="{{check_social_icon('Instagram')->URL}}"><i class="fab fa-instagram"></i></a>
                            </li>
                            @endif
                            @if(check_social_icon('Twitter'))
                            <li>
                                <a href="{{check_social_icon('Twitter')->URL}}"><i class="fab fa-twitter"></i></a>
                            </li>
                            @endif
                            @if(check_social_icon('Google'))
                            <li>
                                <a href="{{check_social_icon('Google')->URL}}"><i class="fab fa-google"></i></a>
                            </li>
                            @endif
                            @if(check_social_icon('LinkedIn'))
                            <li>
                                <a href="{{check_social_icon('LinkedIn')->URL}}"><i class="fab fa-linkedin-in"></i></a>
                            </li>
                            @endif
                            @if(check_social_icon('Youtube'))
                            <li>
                                <a href="{{check_social_icon('Youtube')->URL}}"><i class="fab fa-youtube"></i></a>
                            </li>
                            @endif
                            @if(check_social_icon('Pinterest'))
                            <li>
                                <a href="{{check_social_icon('Pinterest')->URL}}"><i class="fab fa-pinterest-p"></i></a>
                            </li>
                            @endif
                        </ul>
                </div>        
                <!-- End Atribute Navigation -->

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="index.html">
                        <img src="{{URL::to('frontend/assets/img/logo.png')}}" class="logo" alt="Logo">
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-left" data-in="fadeInDown" data-out="fadeOutUp">
                        @foreach (get_menu() as $item)
                        <li>
                            <a href="{{URL::to('pages/'.$item->slug)}}">{{$item->page}}</a>
                        </li>
                        @endforeach
                        
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </nav>
        <!-- End Navigation -->

    </header>
    <!-- End Header -->