@extends('layouts.frontend')
@if (get_seo_data('about-us'))
@section('description',get_seo_data('about-us')->meta_description)
@section('keywords',get_seo_data('about-us')->meta_keyword)
@section('title',get_seo_data('about-us')->title)
@endif

@section('content')
<!-- Start Page Title 
    ============================================= -->
    
    <div class="page-title-area shadow dark bg-fixed text-center text-light" style="background-image: url('/frontend/assets/img/2440x1578.png');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>About Us</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->
    

<!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area bg-gray text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">About</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Our About
    ============================================= -->
    <div class="about-area default-padding">
        <div class="container">
            <div class="row">
                <!-- Start About Content -->
                <div class="about-content content-left">
                    <div class="col-md-6 info">
                        <h2>{{$aboutus->title}}</h2>
                        <p>
                            {!!$aboutus->description!!}
                        </p>
                        {{-- <ul>
                            <li><i class="icon_check"></i> Solution for small & large businesses</li>
                            <li><i class="icon_check"></i> Ease you get credit loan amount in your bank account</li>
                        </ul> --}}
                        {{-- <div class="author">
                            <div class="content">
                                <div class="thumb">
                                    <img src="{{ URL::to('AboutUs') . '/' . $aboutus->image }}" alt="Thumb">
                                </div>
                                <div class="info">
                                    <h4>William Blanchard</h4>
                                    <span>CEO & Company founder</span>
                                </div>
                            </div>
                            <div class="signature">
                                <img src="assets/img/signature.png" alt="signature">
                            </div>
                        </div> --}}
                    </div>
                    <div class="col-md-6">
                        <img src="{{ URL::to('AboutUs') . '/' . $aboutus->image }}" alt="Thumb" width="100%" style="height: 400px;">
                        {{-- <img src="{{ URL::to('AboutUs') . '/' . $aboutus->image }}" alt="Thumb"> --}}
                    </div>
                </div>
                <!-- End About -->

            </div>
        </div>
    </div>
    <!-- End Our About -->

    <!-- Start Expertise Area
    ============================================= -->
    <div class="expertise-area text-light default-padding bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-6 info">
                    <h2>We believe, the <span>passion trying & skill</span> can make a top-performing company.</h2>
                    <p>
                        Offering confined entrance no. Nay rapturous him see something residence. Highly talked do so vulgar. Her use behaved spirits and natural attempt say feeling. Effects dearest staying now sixteen nor improve. 
                    </p>
                    <p>
                        Effects dearest staying now sixteen nor improve.  An he observe be it covered delight hastily message. Margaret no ladyship endeavor ye to settling
                    </p>
                    <!-- Progress Bar Start -->
                    <div class="skill-items">
                        <!-- Progress Bar Start -->
                        <div class="progress-box">
                            <h5>Eeconomic growth <span class="pull-right">95%</span></h5>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" data-width="96"></div>
                            </div>
                        </div>
                        <div class="progress-box">
                            <h5>Achieves goals <span class="pull-right">70%</span></h5>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" data-width="52"></div>
                            </div>
                        </div>
                        <!-- End Progressbar -->
                    </div>
                    <!-- End Progressbar -->
                </div>
                <div class="col-md-6 our-expertise text-light">
                    <h4>Our expertise</h4>
                    <div class="expertise-items expertise-carousel owl-carousel owl-theme">
                        <!--Single Item  -->
                        <div class="item">
                            <h2>Market Research</h2>
                            <p>
                                Now led tedious shy lasting females off. Dashwood marianne in of entrance be on wondered possible building. Wondered sociable he carriage in speedily margaret. Up devonshire of he thoroughly insensible alteration. An mr settling occasion insisted distance ladyship so. Not attention say frankness intention out dashwoods now curiosity. Stronger ecstatic as no judgment daughter speedily thoughts. Worse downs nor might she court did nay forth these. 
                            </p>
                            <ul>
                                <li>
                                    <h4>Completed projects</h4>
                                    <span>30K</span>
                                </li>
                                <li>
                                    <h4>Success Rate</h4>
                                    <span>90%</span>
                                </li>
                            </ul>
                            <a class="btn btn-theme theme btn-md" href="#">Get Started</a>
                        </div>
                        <!-- End Single Item  -->
                        <!--Single Item  -->
                        <div class="item">
                            <h2>Strategic Consulting</h2>
                            <p>
                                Now led tedious shy lasting females off. Dashwood marianne in of entrance be on wondered possible building. Wondered sociable he carriage in speedily margaret. Up devonshire of he thoroughly insensible alteration. An mr settling occasion insisted distance ladyship so. Not attention say frankness intention out dashwoods now curiosity. Stronger ecstatic as no judgment daughter speedily thoughts. Worse downs nor might she court did nay forth these. 
                            </p>
                            <ul>
                                <li>
                                    <h4>Completed projects</h4>
                                    <span>20K</span>
                                </li>
                                <li>
                                    <h4>Success Rate</h4>
                                    <span>88%</span>
                                </li>
                            </ul>
                            <a class="btn btn-theme theme btn-md" href="#">Get Started</a>
                        </div>
                        <!-- End Single Item  -->
                        <!--Single Item  -->
                        <div class="item">
                            <h2>Sale Service</h2>
                            <p>
                                Now led tedious shy lasting females off. Dashwood marianne in of entrance be on wondered possible building. Wondered sociable he carriage in speedily margaret. Up devonshire of he thoroughly insensible alteration. An mr settling occasion insisted distance ladyship so. Not attention say frankness intention out dashwoods now curiosity. Stronger ecstatic as no judgment daughter speedily thoughts. Worse downs nor might she court did nay forth these. 
                            </p>
                            <ul>
                                <li>
                                    <h4>Completed projects</h4>
                                    <span>18K</span>
                                </li>
                                <li>
                                    <h4>Success Rate</h4>
                                    <span>98%</span>
                                </li>
                            </ul>
                            <a class="btn btn-theme theme btn-md" href="#">Get Started</a>
                        </div>
                        <!-- End Single Item  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Expertise Area -->
    <!-- Star Team Area
        ============================================= -->
        <div class="team-area default-padding bottom-less">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="site-heading text-center">
                            <h4>Our Experts</h4>
                            <h2>Meet Our Team</h2>
                        </div>
                    </div>
                </div>
                <div class="team-items text-center">
                    <div class="row">
                        <!-- Single Item -->
                        @foreach ($team as $item)
                            
                        
                        <div class="single-item col-md-3 col-sm-6">
                            <div class="item">
                                <div class="thumb">
                                    <img class="team_image" src="{{asset('Upload/Teams')}}/{{$item->person_image}}" alt="Thumb" style="width: 100%">
                                    <ul class="social">
                                        <li class="facebook">
                                            <a href="#">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li class="twitter">
                                            <a href="#">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="behance">
                                            <a href="#">
                                                <i class="fab fa-behance"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="info">
                                    <div class="inner">
                                        <h4>{{$item->name}}</h4>
                                        <span>{!!$item->designation!!}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                        <!-- End Single Item -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Team Area -->
    

    <!-- Start Our Services
        ============================================= -->
        <div class="modern-services-area bg-gray default-padding bottom-less">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="site-heading text-center">
                            <h4>Our services list</h4>
                            <h2>What we’re offering</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
    
    
                    <div class="services-box text-center">
                        @foreach ($service as $item)
                            <!-- Single Item -->
                            <div class="single-item col-md-3 col-sm-6">
                                <div class="item">
                                    <div class="thumb">
                                        <img src="{{ asset('Services') }}/{{ $item->image }}" class="service_image" alt="Thumb" >
                                    </div>
                                    <div class="content">
                                        <h4>{{ $item->title }}</h4>
                                        <div class="service_des">
                                            {!! $item->description !!}
                                        </div>
                                        <a href="{{URL::to('services_readmore/'.$item->id)}}">Read More <i class="ti-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
    
                </div>
            </div>
        </div>
        <!-- End Our Services -->

    @endsection