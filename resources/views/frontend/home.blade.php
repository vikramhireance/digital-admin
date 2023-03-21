@extends('layouts.frontend')
@if (get_seo_data('home'))
@section('description',get_seo_data('home')->meta_description)
@section('keywords',get_seo_data('home')->meta_keyword)
@section('title',get_seo_data('home')->title)
@endif
@section('content')
    <!-- Start Banner
            ============================================= -->
    <div class="banner-area">
        <div id="bootcarousel" class="carousel inc-top-heading slide animate_text" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner text-light carousel-zoom">
                @foreach ($slider as $key => $item)
                    <div class="item bg-cover @if ($key == 0) active @endif"
                        style="background-image: url('{!! $img = asset('/Image/' . $item->image) !!}');">
                        <div class="box-table shadow dark">
                            <div class="box-cell">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="content">
                                                <h3 data-animation="animated slideInUp">{{ $item->subtitle }}</h3>
                                                <h2 data-animation="animated slideInDown">{{ $item->title }}</h2>
                                                <a data-animation="animated slideInUp" class="btn btn-light border btn-md"
                                                    href="{{ $item->button_url }}">{{ $item->button_text }}</a>
                                                <a data-animation="animated slideInUp" class="btn btn-theme effect btn-md"
                                                    href="{{ $item->button_url }}">{{ $item->button_text }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <!-- End Wrapper for slides -->

            <!-- Left and right controls -->
            <a class="left carousel-control shadow" href="#bootcarousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control shadow" href="#bootcarousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- End Banner -->

    <!-- Start Our About
        ============================================= -->
    <div class="about-area default-padding">
        <div class="container">
            <div class="row">
                <!-- Start About Content -->
                <div class="about-content content-left">
                    <div class="col-md-6 info">
                        <h2>{{ $aboutus->title }}</h2>
                        <p>
                            {!! $aboutus->description !!}
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
                        <img src="{{ URL::to('AboutUs') . '/' . $aboutus->image }}" alt="Thumb" width="100%"
                            style="height: 400px;">
                        {{-- <img src="{{ URL::to('AboutUs') . '/' . $aboutus->image }}" alt="Thumb"> --}}
                    </div>
                </div>
                <!-- End About -->

            </div>
        </div>
    </div>
    <!-- End Our About -->

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
                                    <img src="{{ asset('Services') }}/{{ $item->image }}" class="service_image"
                                        alt="Thumb">
                                </div>
                                <div class="content">
                                    <h4>{{ $item->title }}</h4>
                                    <div class="service_des">
                                        {!! $item->description !!}
                                    </div>
                                    <a href="{{ URL::to('services_readmore/' . $item->id) }}">Read More <i
                                            class="ti-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    <!-- End Our Services -->

    <!-- Start Why Choose Us
            ============================================= -->
    <div class="choose-us-area default-padding">
        <!-- Fixed Shape -->
        <div class="fixed-shape">
            <img src="{{ URL::to('frontend/assets/img/building-bg.png') }}" alt="Shape">
        </div>
        <!-- End Fixed Shape -->
        <div class="container">
            <div class="row item-flex center">
                <div class="col-md-6 thumb">
                    <div class="thumb-box">
                        <img src="{{ URL::to('Content') . '/' . $content->image }}" alt="Thumb">
                        <img src="{{ URL::to('Content') . '/' . $content->vision_image }}" alt="Thumb">
                    </div>
                </div>
                <div class="col-md-6 info">
                    <div class="content">
                        <h4>Why Choose Us</h4>
                        <h2>{{ $content->title }}</h2>
                        <p>
                            {{ $content->description }}
                        </p>
                        <ul>
                            <li>
                                <div class="icon">
                                    <i style="background: url('{!! $img = asset('/Content/' . $content->mission_image) !!}')">
                                        {{-- <img src="{{ URL::to('Content') . '/' . $content->mission_image }}" alt="Thumb" width="50%"> --}}
                                    </i>
                                </div>
                                <div class="info">
                                    <h4>{{ $content->mission_title }}</h4>
                                    <p>
                                        {!! $content->mission_description !!}
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i style="background: url('{!! $img = asset('/Content/' . $content->vision_image) !!}')">
                                        {{-- <img src="{{ URL::to('Content') . '/' . $content->mission_image }}" alt="Thumb" width="50%"> --}}
                                    </i>
                                </div>
                                <div class="info">
                                    <h4>{{ $content->vision_title }}</h4>
                                    <p>
                                        {!! $content->vision_description !!}
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Why Choose Us -->

    <!-- Start Fun Fact Area
            ============================================= -->
    <div class="fun-factor-box bg-dark text-center text-light default-padding">
        <div class="fun-fact-area">
            <div class="container">
                <div class="row">
                    @foreach ($statistic as $item)
                        <div class="col-md-3 item">
                            <div class="fun-fact">
                                <div class="content">
                                    <div class="timer" data-to="{{ $item->number }}" data-speed="5000">
                                        {{ $item->number }}</div>
                                    <span class="medium">{{ $item->title }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
    <!-- End Fun Fact Area -->

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
                                    <img class="team_image" src="{{ asset('Upload/Teams') }}/{{ $item->person_image }}"
                                        alt="Thumb" style="width: 100%">
                                    <ul class="social">
                                        @if (check_social_icon('Facebook'))
                                            <li>
                                                <a href="{{ check_social_icon('Facebook')->URL }}"><i
                                                        class="fab fa-facebook-f"></i></a>
                                            </li>
                                        @endif
                                        @if (check_social_icon('Instagram'))
                                            <li>
                                                <a href="{{ check_social_icon('Instagram')->URL }}"><i
                                                        class="fab fa-instagram"></i></a>
                                            </li>
                                        @endif
                                        @if (check_social_icon('LinkedIn'))
                                            <li>
                                                <a href="{{ check_social_icon('LinkedIn')->URL }}"><i
                                                        class="fab fa-linkedin-in"></i></a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="info">
                                    <div class="inner">
                                        <h4>{{ $item->name }}</h4>
                                        <span>{!! $item->designation !!}</span>
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

    <!-- Star Blog Area
            ============================================= -->
    <div class="blog-area bg-gray default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h4>Our Blog</h4>
                        <h2>Latest News</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="blog-items">
                    <!-- Single Item -->
                    @foreach ($blog as $item)
                        <div class="col-md-4 single-item">
                            <div class="item">
                                <div class="thumb">
                                    <a href="#">
                                        <img class="blog_image" src="{{ asset('Blogs') }}/{{ $item->image }}"
                                            alt="Thumb">
                                        <div class="post-date">
                                            12 Jul
                                        </div>
                                    </a>
                                </div>
                                <div class="info">
                                    <div class="tags">
                                        @foreach ($item->category as $cat)
                                            <a href="{{ URL::to('blog_readmore/' . $cat->id) }}">{{ $cat->title }}</a> ,
                                        @endforeach

                                    </div>
                                    <h4>
                                        <a href="{{ URL::to('blog_readmore/' . $item->id) }}">{{ $item->title }}</a>
                                    </h4>
                                    <p>
                                        {!! $item->description !!}
                                    </p>
                                </div>
                                <div class="meta">
                                    <ul>
                                        <li>
                                            <a href="{{ URL::to('blog_readmore/' . $item->id) }}"> <img
                                                    src="{{ URL::to('frontend/assets/img/100x100.png') }}"
                                                    alt="Author"> Author</a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::to('blog_readmore/' . $item->id) }}"><i
                                                    class="ti-arrow-right"></i>Read More</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Item -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Area -->

    <!-- Start Contact Area
            ============================================= -->
    <div class="contact-area default-padding-top bottom-half">
        <div class="container">
            <div class="contact-items">



                <div class="row">
                    <div class="col-md-6 address">
                        <div class="address-items text-center text-light"
                            style="background-image: url(/frontend/assets/img/800x800.png);">
                            <ul class="info">
                                <li>
                                    <div class="icon"><i class="flaticon-location"></i></div>
                                    @foreach ($contact as $item)
                                        <h4>{{ $item->address_title }}</h4>
                                        <span>{{ $item->address_details }}</span>
                                    @endforeach
                                </li>
                                <li>
                                    <div class="icon"><i class="flaticon-call-center"></i></div>
                                    <h4>Phone</h4>
                                    @foreach ($contact as $item)
                                        <span>{{ $item->phone }}<br></span>
                                    @endforeach
                                </li>
                                <li>
                                    <div class="icon"><i class="flaticon-email"></i> </div>
                                    <h4>Email</h4>
                                    @foreach ($contact as $item)
                                        <span>{{ $item->email }}<br></span>
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 form-box">
                        <h2>Let's lalk about your idea</h2>
                        <p>
                            Our next drew much you with rank. Tore many held age hold rose than our. She literature
                            sentiments any contrasted. Set aware joy sense young now tears china shy.
                        </p>
                        <form action="{{ route('sendmessage') }}" method="POST" class="contact-form" id="contectForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" id="name" name="name" placeholder="Name"
                                            type="text" required>
                                        <span class="alert-error"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" id="title" name="title" placeholder="Title"
                                            type="text" required>
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" id="email" name="email" placeholder="Email*"
                                            type="email" required>
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" id="phone" name="phone" placeholder="Phone"
                                            type="text" required>
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group message">
                                        <textarea class="form-control" id="message" name="message" placeholder=" Message *" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <button type="submit" name="submit" id="submit">
                                        Send Message <i class="fa fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- @endforeach --}}
            </div>
        </div>
    </div>
    <!-- End Contact Area -->

    <!-- Star Google Maps
            ============================================= -->
    <div class="maps-area">
        <div class="container-full">
            <div class="row">
                <div class="google-maps">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d14767.262289338461!2d70.79414485000001!3d22.284975!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1424308883981"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- End Google Maps -->
@endsection
