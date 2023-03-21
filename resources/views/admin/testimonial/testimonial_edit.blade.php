@extends('layouts.admin')
@section('css')
<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
<link href="{{asset('admin/assets/plugins/select/selectr.min.css')}}" rel="stylesheet" type="text/css" />
<style>
    .rating{
        cursor: pointer;
    }
    .checked {
        color: orange;
    }
    </style>
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
                                    <h2 class="card-name-lg">Edit testimonials</h2>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>

                        <div class="card-body">
                            <form class="form-horizontal auth-form my-4" method="post" id="submitForm" enctype="multipart/form-data" action="{{ asset('admin/testimonial/update') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{$data->id}}">
                                <div class="form-group">
                                    <label for="example-text-input-lg" ></label>

                                </div>
                                <div class="form-group">
                                    <label for="example-text-input-lg" >Name</label>
                                    <div class="col-md-12">
                                        <input class="form-control mb-3" type="text" name="name" value="{{$data->name}}"
                                            placeholder="Enter Name" id="example-text-input-lg">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input-lg" >Message</label>
                                    <div class="col-sm-12">
                                        <textarea class="ckeditor form-control mb-3" name="message">{{$data->message}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group imgPreview">
                                    <label for="example-text-input-lg" ></label>
                                    <div class="col-sm-2">
                                        <img src="{{asset('Testimonials')}}/{{$data->person_image}}" width="100%">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input-lg" >Person Image</label>
                                    <div class="col-sm-12">
                                        <input class="form-control mb-3 file1" type="file" name="person_image"
                                            placeholder="Select person_image" id="example-text-input-lg">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input-lg" >Designation</label>
                                    <div class="col-md-12">
                                        <input class="form-control mb-3" type="text" name="designation" value="{{$data->designation}}"
                                            placeholder="Enter designation" id="example-text-input-lg">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input-lg" >rating</label>
                                    <div class="col-md-12 mt-2">
                                        <span class="fa fa-star fa-lg rating @if($data->rating > 0) checked @endif" data-id="1" id="ratingno_1"></span>
                                        <span class="fa fa-star fa-lg rating @if($data->rating > 1) checked @endif" data-id="2" id="ratingno_2"></span>
                                        <span class="fa fa-star fa-lg rating @if($data->rating > 2) checked @endif" data-id="3" id="ratingno_3"></span>
                                        <span class="fa fa-star fa-lg rating @if($data->rating > 3) checked @endif" data-id="4" id="ratingno_4"></span>
                                        <span class="fa fa-star fa-lg rating @if($data->rating > 4) checked @endif" data-id="5" id="ratingno_5"></span>
                                    </div>
                                    <input type="hidden" name="rating" value="{{$data->rating}}" class="rating_value">
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
@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script src="{{asset('admin/assets/plugins/select/selectr.min.js')}}"></script>
<script src="{{asset('admin/assets/pages/forms-advanced.js')}}"></script>
<script>
    $(".rating").click(function(){
        var no = $(this).attr('data-id');
        $('.rating_value').val(no);
        $('.rating').removeClass('checked');
        for(let index = 0; index <= no; index++) {
            $('#ratingno_'+index).attr('class','fa fa-star fa-lg rating checked');
        }
    });
</script>
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
