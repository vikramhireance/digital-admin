@extends('layouts.frontend')
@section('description','Buscom - Multipurpose Business and Corporate Template')
@section('keywords','Buscom - Multipurpose Business and Corporate Template')
@section('content')

<!-- Start Page Title 
    ============================================= -->
    <div class="page-title-area shadow dark bg-fixed text-center text-light" style="background-image: url(/frontend/assets/img/2440x1578.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>Contact Us</h1>
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
                        <li class="active">Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

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
                                        <h4>{{$item->address_title}}</h4>
                                        <span>{{$item->address_details}}</span>
                                        @endforeach
                                    </li>
                                    <li>
                                        <div class="icon"><i class="flaticon-call-center"></i></div>
                                        <h4>Phone</h4>
                                        @foreach ($contact as $item)
                                            
                                        <span>{{$item->phone}}<br></span>
                                        @endforeach
                                    </li>
                                    <li>
                                        <div class="icon"><i class="flaticon-email"></i> </div>
                                        <h4>Email</h4>
                                        @foreach ($contact as $item)
                                            
                                        <span>{{$item->email}}<br></span>
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
                            <form action="{{route('sendmessage')}}" method="POST" class="contact-form" id="contectForm">
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
                    <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d14767.262289338461!2d70.79414485000001!3d22.284975!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1424308883981"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- End Google Maps -->
    
@endsection