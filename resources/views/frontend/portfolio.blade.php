@extends('layouts.frontend')
@if (get_seo_data('portfolio'))
@section('description',get_seo_data('portfolio')->meta_description)
@section('keywords',get_seo_data('portfolio')->meta_keyword)
@section('title',get_seo_data('portfolio')->title)
@endif
@section('content')
    <!-- Start Page Title 
    ============================================= -->
    <div class="page-title-area shadow dark bg-fixed text-center text-light" style="background-image: url(/frontend/assets/img/2440x1578.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>Portfolio</h1>
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
                        <li class="active">Portfolio</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Star Portfolio
    ============================================= -->
    <div class="portfolio-area default-padding">
        <div class="container">
            <div class="gallery-items-area">
                <div class="row">
                    <div class="col-md-12 gallery-content">
                        <div class="mix-item-menu text-center">
                            <button class="active" data-filter="*">All</button>
                            @foreach ($portfolio_category as $category)
                                
                            <button data-filter=".{{$category->title}}">{{$category->title}}</button>
                            @endforeach

                        </div>
                        <!-- End Mixitup Nav-->

                        <div class="row magnific-mix-gallery masonary">
                            <div id="portfolio-grid" class="gallery-items col-4">
                                <!-- Single Item -->
                                @foreach ($portfolio as $item)
                                <div class="pf-item {{$item->category_name}} capital">
                                    <div class="effect-box">
                                        <div class="thumb">
                                            <img src="{{ asset('Portfolios') }}/{{ $item->image }}" alt="thumb" width="100%" height="200px">
                                        </div>
                                        <div class="info">
                                            <div class="left">
                                                <h4><a href="{{URL::to('portfolio_singleview/'.$item->id)}}">{{$item->title}}</a></h4> 
                                                <p>{{$item->category_name}}</p>
                                            </div>
                                            <div class="right">
                                                <a href="{{ asset('Portfolios/gallery') }}/{{ $item->gallery_image }}" class="item popup-link"><i class="fa fa-plus"></i></a>
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
    </div>
    <!-- End Portfolio -->

@endsection