<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from mannatthemes.com/unikit/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Feb 2023 05:44:31 GMT -->
<head>
        

        <meta charset="utf-8" />
        <title>{{generalSettings()->website_title}} </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('General_settings/favicon')}}/{{generalSettings()->favicon}}">
         <!-- App css -->
         <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
         <link href="{{asset('admin/assets/css/icons.min.css')}}"rel="stylesheet" type="text/css" />
         <link href="{{asset('admin/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" /> 
         <link href="{{asset('admin/assets/css/custome.css')}}" rel="stylesheet" type="text/css" /> 
         <link href="{{asset('admin/assets/plugins/datatables/datatable.css')}}" rel="stylesheet" type="text/css" />
         <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" rel="stylesheet">
         @yield('css')
    </head>

    <body id="body" class="dark-sidebar">
        <!-- leftbar-tab-menu -->
        @extends('admin.main.sidebar')
        <!-- end left-sidenav-->
        <!-- end leftbar-menu-->

        <!-- Top Bar Start -->
        <!-- Top Bar Start -->
        @extends('admin.main.header')
        <!-- Top Bar End -->
        <!-- Top Bar End -->

       @yield('content')
        <!-- end page-wrapper -->

        <!-- Javascript  -->  
        <script src="{{URL::to('admin/assets/js/app.js')}}"></script>
        <script src="{{URL::to('admin/assets/pages/forms-advanced.js')}}"></script>
        @extends('admin.main.script')
        @yield('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
    </body>
    <!--end body-->

<!-- Mirrored from mannatthemes.com/unikit/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Feb 2023 05:44:59 GMT -->
</html>