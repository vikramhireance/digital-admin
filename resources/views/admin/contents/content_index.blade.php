@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="page-wrapper">
        <div class="page-content-tab">
            <div class="container-fluid">
                <div class="row mt-0" style="justify-content: center">
                    <div class="col-12 mt-0">
                        <div class="card p-2 m-5">

                            <div class="card-header">
                                <div class="row align-items-left">
                                    <div class="col">
                                        <h2 class="card-title-lg">Edit Content</h2>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>

                            <div class="card-body">

                                <form class="form-horizontal auth-form my-4" method="post" id="submitForm"
                                    enctype="multipart/form-data" action="{{ URL::to('admin/content/update') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $data->id }}">
                                    <div class="form-group">
                                        <label for="example-text-input-lg"></label>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg"> Why Choose Us Title</label>
                                        <div class="col-md-12">
                                            <input class="form-control mb-3" type="text" name="title"
                                                value="{{ $data->title }}" placeholder="Enter Title"
                                                id="example-text-input-lg">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg">Why Choose Us Description</label>
                                        <div class="col-sm-12">
                                            <textarea class="ckeditor form-control" name="description">{{ $data->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group imgPreview">
                                        <label for="example-text-input-lg"></label>
                                        <div class="col-sm-2">
                                            <img src="{{ URL::to('Content') . '/' . $data->image }}" class="editImg mb-2"
                                                width="100%">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg"> Why Choose Us Image</label>
                                        <div class="col-sm-12">
                                            <input class="form-control mb-3 file1" type="file" name="image"
                                                placeholder="Select Image" id="example-text-input-lg">
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg">Mission Title</label>
                                        <div class="col-md-12">
                                            <input class="form-control mb-3" type="text" name="mission_title"
                                                value="{{ $data->mission_title }}" placeholder="Enter Meta Titile"
                                                id="example-text-input-lg">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg">Mission Description</label>
                                        <div class="col-sm-12">
                                            <textarea class="ckeditor form-control" name="mission_description">{{ $data->mission_description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group imgPreview2">
                                        <label for="example-text-input-lg"></label>
                                        <div class="col-sm-2">
                                            <img src="{{ URL::to('Content') . '/' . $data->mission_image }}"
                                                class="editImg mb-2" width="100%">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg">Mission Image</label>
                                        <div class="col-sm-12">
                                            <input class="form-control mb-3 file2" type="file" name="mission_image"
                                                placeholder="Select Image" id="example-text-input-lg">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg">Vision Title</label>
                                        <div class="col-md-12">
                                            <input class="form-control mb-3" type="text" name="vision_title"
                                                value="{{ $data->vision_title }}" placeholder="Enter Meta Titile"
                                                id="example-text-input-lg">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg">Vision Description</label>
                                        <div class="col-sm-12">
                                            <textarea class="ckeditor form-control" name="vision_description">{{ $data->vision_description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group imgPreview3">
                                        <label for="example-text-input-lg"></label>
                                        <div class="col-sm-2">
                                            <img src="{{ URL::to('Content') . '/' . $data->vision_image }}"
                                                class="editImg mb-2" width="100%">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg">Vision Image</label>
                                        <div class="col-sm-12">
                                            <input class="form-control mb-3 file3" type="file" name="vision_image"
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
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
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
    $('.file3').change(function(){
        const file = this.files[0];
        if (file){
            let reader = new FileReader();
            reader.onload = function(event){
            console.log(event.target.result);
            $('.imgPreview3 img').attr('src', event.target.result);
            $('.imgPreview3').show();
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
