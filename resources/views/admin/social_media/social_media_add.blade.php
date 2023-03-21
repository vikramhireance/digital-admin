@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
    <link href="{{asset('admin/assets/plugins/select/selectr.min.css')}}" rel="stylesheet" type="text/css" />
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
                                    <h2 class="card-title-lg">Add Contact</h2>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>

                        <div class="card-body">

                            <form class="form-horizontal auth-form my-4" method="post" id="submitForm" enctype="multipart/form-data"
                                action="{{ asset('admin/social_media/store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="example-text-input-lg" ></label>

                                </div>
                                <div class="form-group">
                                    <label for="example-text-input-lg" >Social Media
                                        Type</label>
                                    <div class="col-md-12 mb-3">
                                        <select name="social_media_type" id="default"
                                            class="form-control mb-3">
                                            <option value=""> -- Select Your Social Media Type --</option>
                                            <option value="Facebook">Facebook</option>
                                            <option value="Instagram">Instagram</option>
                                            <option value="Twitter">Twitter</option>
                                            <option value="Google">Google</option>
                                            <option value="LinkedIn">LinkedIn</option>
                                            <option value="Youtube">Youtube</option>
                                            <option value="Pinterest">Pinterest</option>
                                        </select>
                                    </div>
            
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input-lg" >URL</label>
                                    <div class="col-md-12">
                                        <input class="form-control mb-3" type="text" name="URL"
                                            placeholder="Enter URL" id="example-text-input-lg" required>
                                    </div>
                                </div>


                                <center>
                                    <button class="btn btn-primary mb-2 submitButton" type="submit">Save <i
                                            class="fas fa-sign-in-alt ml-1"></i></button>
                                </center>
                            </form>
                            @if (count($errors) > 0)
                                <small class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </small>
                            @endif
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<script src="{{asset('admin/assets/plugins/select/selectr.min.js')}}"></script>
<script src="{{asset('admin/assets/pages/forms-advanced.js')}}"></script>
@endsection
