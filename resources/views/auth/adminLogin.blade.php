<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from mannatthemes.com/unikit/default/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Feb 2023 05:46:03 GMT -->
<head>
    

    <meta charset="utf-8" />
    
    <title>{{generalSettings()->website_title}} </title>
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
            <meta content="" name="author" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />

            <!-- App favicon -->
            {{-- <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.ico')}}"> --}}
            <link rel="shortcut icon" href="{{asset('General_settings/favicon')}}/{{generalSettings()->favicon}}">
       

     <!-- App css -->
     <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
     <link href="{{asset('admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
     <link href="{{asset('admin/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
     <style>
        .button {
  background-color: #9c27b0; /* Green */
  border: none;
  color: white;
  padding: 6px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
.button1:hover {
  background-color: #6a0080
;
  color: white;
}
     </style>

</head>

<body id="body" class="auth-page" style="background-image: url('assets/images/p-1.png'); background-size: cover; background-position: center center;">
   <!-- Log In page -->
    <div class="container-md">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 mx-auto">
                            <div class="card">
                                <div class="card-body p-0 auth-header-box">
                                    <div class="text-center p-3">
                                        <a href="index.html" class="logo logo-admin">
                                            @if(generalSettings()->dark_mode ==1)
                                                <img src="{{asset('General_settings/dark_logo')}}/{{generalSettings()->dark_logo}}" alt="logo-large" height="50" alt="logo" class="auth-logo">
                                            @else
                                                <img src="{{asset('General_settings/light_logo')}}/{{generalSettings()->light_logo}}" alt="logo-large" height="50" alt="logo" class="auth-logo">
                                            @endif
                                        </a>
                                        <h4 class="mt-3 mb-1 fw-semibold text-white font-18">{{generalSettings()->website_title}} </h4>   
                                        <p class="text-muted  mb-0">Sign in to continue.</p>  
                                    </div>
                                </div>
                                <div class="card-body pt-0">                                    
                                    <form class="my-4"  method="post" action="{{ route('login') }}">   
                                        @csrf         
                                        <div class="form-group mb-2">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter username">  
                                            
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div><!--end form-group--> 
            
                                        <div class="form-group">
                                            <label class="form-label" for="userpassword">Password</label>                                            
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="userpassword" placeholder="Enter password">                            
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div><!--end form-group--> 
            
                                        {{-- <div class="form-group row mt-3">
                                            <div class="col-sm-6">
                                                <div class="form-check form-switch form-switch-success">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="customSwitchSuccess" {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="customSwitchSuccess">{{ __('Remember Me') }}</label>
                                                </div>
                                            </div><!--end col--> 
                                            <div class="col-sm-6 text-end">
                                                <a href="{{ route('password.request') }}" class="text-muted font-13"><i class="dripicons-lock"></i> Forgot password?</a>                                    
                                            </div><!--end col--> 
                                        </div><!--end form-group-->  --}}
            
                                        <div class="form-group mb-0 row">
                                            <div class="col-12">
                                                <div class="d-grid mt-3">
                                                    <button class="button button1" type="submit">Log In <i class="fas fa-sign-in-alt ms-1"></i></button>
                                                </div>
                                            </div><!--end col--> 
                                        </div> <!--end form-group-->                           
                                    </form><!--end form-->
                                    {{-- <div class="m-3 text-center text-muted">
                                        <p class="mb-0">Don't have an account ?  <a href="auth-register.html" class="text-primary ms-2">Free Resister</a></p>
                                    </div> --}}
                                    <hr class="hr-dashed mt-4">
                                    {{-- <div class="text-center mt-n5">
                                        <h6 class="card-bg px-3 my-4 d-inline-block">Or Login With</h6>
                                    </div>
                                    <div class="d-flex justify-content-center mb-1">
                                        <a href="#" class="d-flex justify-content-center align-items-center thumb-sm bg-soft-primary rounded-circle me-2">
                                            <i class="fab fa-facebook align-self-center"></i>
                                        </a>
                                        <a href="#" class="d-flex justify-content-center align-items-center thumb-sm bg-soft-info rounded-circle me-2">
                                            <i class="fab fa-twitter align-self-center"></i>
                                        </a>
                                        <a href="#" class="d-flex justify-content-center align-items-center thumb-sm bg-soft-danger rounded-circle">
                                            <i class="fab fa-google align-self-center"></i>
                                        </a>
                                    </div> --}}
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end card-body-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->

    <!-- App js -->
    <script src="{{asset('admin/assets/js/app.js')}}"></script>
    
</body>
<!-- Mirrored from mannatthemes.com/unikit/default/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Feb 2023 05:46:03 GMT -->
</html>