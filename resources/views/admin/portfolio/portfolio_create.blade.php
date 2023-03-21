@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
    <link href="{{ asset('admin/assets/plugins/select/selectr.min.css') }}" rel="stylesheet" type="text/css" />
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
                                        <h2 class="card-title-lg">Add portfolio</h2>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>

                            <div class="card-body">
                                <form class="form-horizontal auth-form my-4" method="post" id="submitForm" enctype="multipart/form-data"
                                    action="{{ asset('admin/portfolio/store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="example-text-input-lg">Title</label>
                                        <div class="col-md-12">
                                            <input class="form-control mb-3" type="text" name="title"
                                                placeholder="Enter Title" id="example-text-input-lg">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="example-text-input-lg">Category</label>
                                        <div class="col-md-12 mb-3">
                                            <select id="default" class="form-control" name="category">
                                                <option value="">--Select--</option>
                                                @foreach ($categories as $key => $value)
                                                    <option value="{{ $value->id }}">{{ $value->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg">Description</label>
                                        <div class="col-sm-12 mb-3">
                                            <textarea class="ckeditor form-control mb-3" name="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group imgPreview">
                                        <div class="col-md-2">
                                            <img src="" width="100%">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg">Image</label>
                                        <div class="col-sm-12">
                                            <input class="form-control mb-3 file1" type="file" name="image"
                                                placeholder="Select Image" id="example-text-input-lg">
                                        </div>
                                    </div>
                                    <div class="form-group imgPreview2">
                                        <div class="col-md-2">
                                            <img src="" width="100%">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg">Gallery Image</label>
                                        <div class="col-sm-12">
                                            <input class="form-control mb-3 file2" type="file" name="gallery_image"
                                                placeholder="Select Gallery Image" id="example-text-input-lg">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg">Meta Title</label>
                                        <div class="col-md-12">
                                            <input class="form-control mb-3" type="text" name="meta_title"
                                                placeholder="Enter Meta Titile" id="example-text-input-lg">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg">Meta Description</label>
                                        <div class="col-sm-12 mb-3">
                                            <textarea class="ckeditor form-control mb-3" name="meta_description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg">Meta Keywords</label>
                                        <div class="col-md-12">
                                            <input class="form-control mb-3" type="text" name="meta_keyword"
                                                placeholder="Enter Meta Keywords" id="example-text-input-lg">
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
    <!-- Javascript  -->
@endsection
@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
    <script src="{{ asset('admin/assets/plugins/select/selectr.min.js') }}"></script>
    <script src="{{ asset('admin/assets/pages/forms-advanced.js') }}"></script>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
$('.imgPreview').hide();
$('.file1').change(function(){
    const file = this.files[0];
    if (file){
        let reader = new FileReader();
        reader.onload = function(event){
        console.log(event.target.result);
        $('.imgPreview img').attr('src', event.target.result);
        $('.imgPreview').show();
        }
        reader.readAsDataURL(file);
    }
});
$('.imgPreview2').hide();
$('.file2').change(function(){
    const file = this.files[0];
    if (file){
        let reader = new FileReader();
        reader.onload = function(event){
        console.log(event.target.result);
        $('.imgPreview2 img').attr('src', event.target.result);
        $('.imgPreview2').show();
        }
        reader.readAsDataURL(file);
    }
});
    </script>
@endsection
