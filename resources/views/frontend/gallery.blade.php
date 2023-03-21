@extends('layouts.frontend')
@if (get_seo_data('gallery'))
@section('description',get_seo_data('gallery')->meta_description)
@section('keywords',get_seo_data('gallery')->meta_keyword)
@section('title',get_seo_data('gallery')->title)
@endif
@section('content')
    <!-- Start Page Title
            ============================================= -->
    <div class="page-title-area shadow dark bg-fixed text-center text-light"
        style="background-image: url(/frontend/assets/img/2440x1578.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>Gallery </h1>
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
                        <li class="active">Gallery</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Star Portfolio
            ============================================= -->
    <div class="portfolio-area gallery-carousel default-padding">
        <div class="container-full">
            <div class="gallery-items-area">
                <div class="col-md-12 gallery-content">
                    <div class="row magnific-mix-gallery masonary">
                        <h4>Images</h4>
                        <div class="gallery-items portfolio-carousel owl-carousel owl-theme">
                            <!-- Single Item -->
                            @foreach ($images as $item)
                                <div class="pf-item">
                                    <div class="effect-box">
                                        <div class="thumb">
                                            <img src="{{ URL::to('Upload/Gallery') }}/{{ $item->image }}" alt="thumb">
                                        </div>
                                        <div class="info">
                                            <div class="left">
                                                <h4><a href="#">{{ $item->title }}</a></h4>
                                                <p>{{ $item->type }}</p>
                                            </div>
                                            <div class="right">
                                                <a href="{{ URL::to('Upload/Gallery') }}/{{ $item->image }}"
                                                    class="item popup-link"><i class="fa fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- End Single Item -->

                        </div>
                        <h4 class="">Video</h4>
                        <div class="gallery-items portfolio-carousel owl-carousel owl-theme">
                            <!-- Single Item -->
                            @foreach ($videos as $item)
                                <div class="pf-item">
                                    <div class="effect-box">
                                        <div class="thumb">
                                            <video width="400" controls>
                                                <source src="{{ URL::to('Upload/Gallery') }}/{{ $item->video }}" type="video/mp4">
                                              </video>
                                        </div>
                                        <div class="info">
                                            <div class="left">
                                                <h4><a href="#">{{ $item->title }}</a></h4>
                                                <p>{{ $item->type }}</p>
                                            </div>
                                            <div class="right">
                                                <a href="{{ URL::to('Upload/Gallery') }}/{{ $item->video }}" target="_blank"
                                                    class=" "><i class="fa fa-plus"></i></a>
                                            </div>
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
    <!-- End Portfolio -->
@endsection
