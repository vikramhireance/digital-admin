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
                                    <h2 class="card-name-lg">Edit Team</h2>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>

                        <div class="card-body">
                            <form class="form-horizontal auth-form my-4" method="post" id="submitForm" enctype="multipart/form-data"
                                action="{{ asset('/admin/team/update') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{$data->id}}">
                                <div class="form-group">
                                    <label for="example-text-input-lg">Name</label>
                                    <div class="col-md-12">
                                        <input class="form-control mb-3" type="text" name="name" value="{{$data->name}}" required
                                            placeholder="Enter Name" id="example-text-input-lg">
                                    </div>                          
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input-lg">Designation</label>
                                    <div class="col-md-12">
                                        <input class="form-control mb-3" type="text" name="designation" value="{{$data->designation}}" required
                                            placeholder="Enter Designation" id="example-text-input-lg">
                                    </div>
                                </div>
                                <div class="form-group imgPreview">
                                    <div class="col-sm-3">
                                        <img src="{{asset('Upload/Teams')}}/{{$data->person_image}}" width="100%">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input-lg">Person Image</label>
                                    <div class="col-sm-12">
                                        <input class="form-control mb-3 file1" type="file" name="person_image"
                                            placeholder="Select Image" id="example-text-input-lg">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-t00ext-input-lg">Description</label>
                                    <div class="col-md-12 mb-3">
                                        <textarea class="ckeditor form-control" name="description">{{$data->description}}</textarea>
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
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script src="{{ asset('/admin/assets/plugins/select/selectr.min.js') }}"></script>
<script src="{{ asset('/admin/assets/pages/forms-advanced.js') }}"></script>
<script>
    $('.file1').change(function(){
        const file = this.files[0];
        if (file){
            let reader = new FileReader();
            reader.onload = function(event){
            console.log(event.target.result);
            $('.imgPreview img').attr('src', event.target.result);
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
