@extends('layouts.admin')
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
@endsection
@section('content')
    <div class="page-wrapper">
        <div class="page-content-tab">
            <div class="container-fluid">
                <div class="row" style="justify-content: center">
                    <div class="col-12">
                        <div class="card p-2 m-5">

                            <div class="card-header">
                                <div class="row align-items-left">
                                    <div class="col">
                                        <h2 class="card-name-lg">Profile</h2>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <form class="form-horizontal auth-form my-4" method="post" id="submitForm"
                            action="{{ URL::to('admin/profile/update') }}" enctype="multipart/form-data">
                            @csrf
                                <div class="card-body">
                                        <div class="form-group">
                                            <label for="example-text-input-lg"></label>

                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="example-text-input-lg">Name</label>
                                                    <input class="form-control mb-3" type="text" name="name"
                                                        placeholder="Enter name" id="example-text-input-lg"
                                                        value="{{ $data->name }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="example-text-input-lg">email</label>
                                                    <input class="form-control mb-3" type="text" name="email"
                                                        placeholder="Enter email" id="example-text-input-lg"
                                                        value="{{ $data->email }}">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group imgPreview">
                                            <div class="col-sm-2">
                                                <img src="{{ URL::to('profile') . '/' . $data->image }}" class="editImg mb-2"
                                                    width="100%">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input-lg">Image</label>
                                            <div class="col-sm-12">
                                                <input class="form-control mb-3 file1" type="file" name="image"
                                                    placeholder="Select Image" id="example-text-input-lg">
                                            </div>

                                        </div>
                                    
                                </div>
                                <div class="card-footer">
                                    <center class="col-md-12">
                                        <button class="btn btn-primary mb-2 submitButton col-md-12" type="submit">Save <i
                                                class="fas fa-sign-in-alt ml-1"></i></button>
                                    </center>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card p-2 m-5">

                            <div class="card-header">
                                <div class="row align-items-left">
                                    <div class="col">
                                        <h2 class="card-name-lg">Profile</h2>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <form class="form-horizontal auth-form my-4" method="post" id="submitForm"
                                    action="{{ URL::to('admin/profile/update/password') }}" enctype="multipart/form-data">
                                    @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="example-text-input-lg">Password</label>
                                                <input class="form-control mb-3" type="text" name="password"
                                                    placeholder="Enter password" id="example-text-input-lg"
                                                    >
                                            </div>
                                            <div class="col-md-6">
                                                <label for="example-text-input-lg">Confirm Password</label>
                                                <input class="form-control mb-3" type="text" name="password_confirmation"
                                                    placeholder="Enter Confirm password" id="example-text-input-lg"
                                                    >
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <center>
                                    <button class="btn btn-primary mb-2 submitButton" type="submit" name="type" value="password">Save <i
                                            class="fas fa-sign-in-alt ml-1"></i></button>
                                </center>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
    <!-- Javascript  -->
@endsection
@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
    <script>
        $('.file1').change(function() {
            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    console.log(event.target.result);
                    $('.imgPreview img').attr('src', event.target.result);
                    $('.imgPreview').show();
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
