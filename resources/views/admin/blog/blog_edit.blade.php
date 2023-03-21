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
                                        <h2 class="card-title-lg">Edit Service Category</h2>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>

                            <div class="card-body">

                                <form class="form-horizontal auth-form my-4" method="post" id="submitForm" enctype="multipart/form-data"
                                    action="{{ asset('admin/blog/update') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $data->id }}">
                                    <div class="form-group">
                                        <label for="example-text-input-lg"
                                            >Title</label>
                                        <div class="col-md-12">
                                            <input class="form-control mb-3" type="text" name="title"
                                                value="{{ $data->title }}" placeholder="Enter Title"
                                                id="example-text-input-lg">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg"
                                            >Description</label>
                                        <div class="col-sm-12 mb-3">
                                            <textarea class="ckeditor form-control" name="description">{{ $data->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg"
                                            >Category</label>
                                        <div class="col-md-12 mb-3">
                                            <select id="default" class="form-control mb-3" name="category[]">
                                                <option value="">--Select--</option>
                                                @foreach ($categories as $key => $value)
                                                    <option value="{{ $value->id }}"
                                                        @if ($data->category == $value->id) selected @endif>
                                                        {{ $value->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class=" form-group imgPreview">
                                        <div class="col-sm-2">
                                            <img src="{{ asset('Blogs') }}/{{ $data->image }}" width="100%">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg"
                                            >Image</label>
                                        <div class="col-sm-12">
                                            <input class="form-control mb-3 file1" type="file" name="image"
                                                placeholder="Select Image" id="example-text-input-lg">
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg" >Meta
                                            Title</label>
                                        <div class="col-md-12">
                                            <input class="form-control mb-3" type="text" name="meta_title"
                                                value="{{ $data->meta_title }}" placeholder="Enter Meta Titile"
                                                id="example-text-input-lg">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg" >Meta
                                            Description</label>
                                        <div class="col-sm-12  mb-3">
                                            <textarea class="form-control" name="meta_description">{{ $data->meta_description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg" >Meta
                                            Keywords</label>
                                        <div class="col-md-12">
                                            <input class="form-control mb-3" type="text" name="meta_keyword"
                                                value="{{ $data->meta_keyword }}" placeholder="Enter Meta Keywords"
                                                id="example-text-input-lg">
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
<script src="{{ asset('admin/assets/plugins/select/selectr.min.js') }}"></script>
<script src="{{ asset('admin/assets/pages/forms-advanced.js') }}"></script>
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
</script>
@endsection
