@extends('layouts.frontend')
@section('description',$blog->meta_description)
@section('title',$blog->meta_title)
@section('keywords',$blog->meta_keyword)
@section('content')
     <!-- Start Page Title 
    ============================================= -->
    <div class="page-title-area shadow dark bg-fixed text-center text-light" style="background-image: url(/frontend/assets/img/2440x1578.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>Blog Single</h1>
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
                        <li><a href="#">Blog</a></li>
                        <li class="active">Single</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start 404 
    ============================================= -->
    <div class="gallery-single-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="thumb">
                        <img src="{{ asset('Blogs') }}/{{ $blog->image }}" alt="Thumb">
                    </div>
                    <div class="info">
                        <h2>{{$blog->title}}</h2>
                        <ul class="project-info">
                            <li><strong>Category:</strong> 
                                @foreach ($blog->category as $key => $item)
                                    {{$item->title }}
                                    @if($key+1 != count($blog->category)),@endif
                                    
                                @endforeach
                            </li>
                            <li><strong>Date:</strong> {{$blog->created_at->format('d M y')}}</li>
                            {{-- <li><strong>Address</strong> California, TX 70240</li> --}}
                        </ul>
                        <p>
                           {!!$blog->description!!} 
                        </p>
                       
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End 404 -->
@endsection