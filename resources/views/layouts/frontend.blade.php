<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description')">
    <meta name="title" content="@yield('title')">
    <meta name="keywords" content="@yield('keywords')">

    <!-- ========== Page Title ========== -->
    <title>@yield('title')</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="{{asset('General_settings/favicon')}}/{{generalSettings()->favicon}}" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    <link href="{{URL::to('frontend/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{URL::to('frontend/assets/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{URL::to('frontend/assets/css/themify-icons.css')}}" rel="stylesheet" />
    <link href="{{URL::to('frontend/assets/css/elegant-icons.css')}}" rel="stylesheet" />
    <link href="{{URL::to('frontend/assets/css/flaticon-set.css')}}" rel="stylesheet" />
    <link href="{{URL::to('frontend/assets/css/magnific-popup.css')}}" rel="stylesheet" />
    <link href="{{URL::to('frontend/assets/css/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href="{{URL::to('frontend/assets/css/owl.theme.default.min.css')}}" rel="stylesheet" />
    <link href="{{URL::to('frontend/assets/css/animate.css')}}" rel="stylesheet" />
    <link href="{{URL::to('frontend/assets/css/bootsnav.css')}}" rel="stylesheet" />
    <link href="{{URL::to('frontend/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{URL::to('frontend/assets/css/responsive.css')}}" rel="stylesheet" />
    <!-- ========== End Stylesheet ========== -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5/html5shiv.min.js"></script>
      <script src="assets/js/html5/respond.min.js"></script>
    <![endif]-->

    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap" rel="stylesheet">

</head>

<body>

    @include('frontend.main.header')
    @yield('content')
    @include('frontend.main.footer')

    

    <!-- jQuery Frameworks
    ============================================= -->
    <script src="{{URL::to('frontend/assets/js/jquery-1.12.4.min.js')}}"></script>
    <script src="{{URL::to('frontend/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::to('frontend/assets/js/equal-height.min.js')}}"></script>
    <script src="{{URL::to('frontend/assets/js/jquery.appear.js')}}"></script>
    <script src="{{URL::to('frontend/assets/js/jquery.easing.min.js')}}"></script>
    <script src="{{URL::to('frontend/assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{URL::to('frontend/assets/js/modernizr.custom.13711.js')}}"></script>
    <script src="{{URL::to('frontend/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{URL::to('frontend/assets/js/wow.min.js')}}"></script>
    <script src="{{URL::to('frontend/assets/js/progress-bar.min.js')}}"></script>
    <script src="{{URL::to('frontend/assets/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{URL::to('frontend/assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{URL::to('frontend/assets/js/count-to.js')}}"></script>
    <script src="{{URL::to('frontend/assets/js/YTPlayer.min.js')}}"></script>
    <script src="{{URL::to('frontend/assets/js/circle-progress.js')}}"></script>
    <script src="{{URL::to('frontend/assets/js/bootsnav.js')}}"></script>
    <script src="{{URL::to('frontend/assets/js/main.js')}}"></script>

</body>
</html>