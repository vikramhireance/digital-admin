@extends('layouts.frontend')
@if (get_seo_data('services'))
@section('description',get_seo_data('services')->meta_description)
@section('keywords',get_seo_data('services')->meta_keyword)
@section('title',get_seo_data('services')->title)
@endif
@section('content')
<!-- Start Page Title 
    ============================================= -->
    <div class="page-title-area shadow dark bg-fixed text-center text-light" style="background-image: url('/frontend/assets/img/2440x1578.png');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>Our Services</h1>
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
                        <li class="active">Services</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

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
    
                    <div class="col-md-12">
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
                    <div  class="col-md-12 text-center">
                        {!! $service->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Our Services -->

    

    <!-- Star Testimonials Area
    ============================================= -->
    <div class="testimonials-area carousel-shadow default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h4>Testimonials</h4>
                        <h2>What Client Says</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="testimonial-box">
                    <div class="row">
                        <div class="testimonial-items testimonial-carousel owl-carousel owl-theme">
                            <!-- Single Item -->
                            @foreach ($testimonial as $item)
                                
                            
                            <div class="item">
                                <i class="fas fa-quote-right"></i>
                                <p>
                                    {!!$item->message!!}
                                </p>
                                <div class="author">
                                    <div class="avatar">
                                        <img src="{{ asset('Testimonials') }}/{{ $item->person_image}}" alt="Thumb">
                                    </div>
                                    <div class="info">
                                        <h4>{{$item->name}}</h4>
                                        <span>{{$item->designation}}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- End Single Item -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonials Area -->

@endsection