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
                            <h2 class="card-title-lg">Talk To Us</h2>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>

                <div class="card-body">
                    <form class="form-horizontal auth-form my-4" method="post" id="submitForm" action="{{ URL::to('admin/talk/update') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="example-text-input-lg" ></label>

                        </div>
                        <div class="form-group">
                            <label for="example-text-input-lg" >Title</label>
                            <div class="col-md-12">
                                <input class="form-control mb-3" type="text" name="title"
                                    placeholder="Enter Title" id="example-text-input-lg"  value="{{ $data->title }}">
                            </div>
                        </div>
                     
                        <div class="form-group">
                            <label for="example-text-input-lg" >Description</label>
                            <div class="col-sm-12">
                                <textarea class="ckeditor form-control" name="description">{{ $data->description }}</textarea>
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
