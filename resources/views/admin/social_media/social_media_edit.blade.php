@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
    <link href="{{asset('admin/assets/plugins/select/selectr.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="row" style="justify-content: center">

        <div class="col-8">
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
                        action="{{ asset('admin/social_media/update') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <div class="form-group">
                            <label for="example-text-input-lg" >Social Media
                                Type</label>
                            <div class="col-md-12">
                                <select name="social_media_type" id="default"
                                    class="form-control mb-3">
                                    <option value=""> -- Select Your Social Media Type --</option>
                                    <option value="Facebook" @if($data->social_media_type == 'Facebook') selected @endif>Facebook</option>
                                    <option value="Instagram" @if($data->social_media_type == 'Instagram') selected @endif>Instagram</option>
                                    <option value="Twitter" @if($data->social_media_type == 'Twitter') selected @endif>Twitter</option>
                                    <option value="Google" @if($data->social_media_type == 'Google') selected @endif>Google</option>
                                    <option value="LinkedIn" @if($data->social_media_type == 'LinkedIn') selected @endif>LinkedIn</option>
                                    <option value="Youtube" @if($data->social_media_type == 'Youtube') selected @endif>Youtube</option>
                                    <option value="Pinterest" @if($data->social_media_type == 'Pinterest') selected @endif>Pinterest</option>
                                </select>
                            </div>
    
                        </div>
                        <div class="form-group">
                            <label for="example-text-input-lg" >URL</label>
                            <div class="col-md-12">
                                <input class="form-control mb-3" type="text" name="URL" value="{{$data->URL}}"
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
    <!-- Javascript  -->
@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<script src="{{asset('admin/assets/plugins/select/selectr.min.js')}}"></script>
<script src="{{asset('admin/assets/pages/forms-advanced.js')}}"></script>
@endsection
