@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
    <link href="{{ asset('admin/assets/plugins/select/selectr.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .get_chatgpt_data{float: right;}
    </style>
@endsection
@section('content')
    <div class="login">
        <img src="{{asset('/admin/assets/images/load.gif')}}">
    </div>
    <div class="page-wrapper">
        <div class="page-content-tab">
            <div class="container-fluid">
                <div class="row" style="justify-content: center">
                    <div class="col-12">
                        <div class="card p-2 m-5">


                            <div class="card-header">
                                <div class="row align-items-left">
                                    <div class="col">
                                        <h2 class="card-title-lg">Add Service</h2>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>

                            <div class="card-body">
                                <form class="form-horizontal auth-form my-4" method="post" id="submitForm"
                                    enctype="multipart/form-data" action="{{ asset('admin/service/store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>Title</label>
                                        <div class="col-md-12">
                                            <input class="form-control mb-3" type="text" name="title"
                                                placeholder="Enter Title" id="title">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Description
                                            <button class="btn btn-primary get_chatgpt_data mb-2 generateBTN">Generate Description</button>
                                        </label>
                                        
                                        <div class="col-sm-12 mb-3">
                                            <textarea class="ckeditor form-control" id="ckeditor" name="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <div class="col-md-12 mb-3">
                                            <select id="default" class="form-control" multiple name="category[]">
                                                <option value="">--Select--</option>
                                                @foreach ($categories as $key => $value)
                                                    <option value="{{ $value->id }}">{{ $value->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label>Meta Title</label>
                                        <div class="col-md-12">
                                            <input class="form-control mb-3" type="text" name="meta_title"
                                                placeholder="Enter Meta Titile" id="example-text-input-lg">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg ">Meta Description</label>
                                        <div class="col-sm-12 mb-3">
                                            <textarea class="form-control" name="meta_description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Keywords</label>
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
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script src="{{ asset('admin/assets/plugins/select/selectr.min.js') }}"></script>
<script src="{{ asset('admin/assets/pages/forms-advanced.js') }}"></script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(".get_chatgpt_data").click(function(e){

    e.preventDefault();
    $('.generateBTN').html(`Loding... <i class="fa fa-spinner fa-pulse"></i>`);
    
    var title = $("#title").val();
    
    $.ajax({
        type:'POST',
        url:"{{ route('admin.chatGptData') }}",
        data:{title:title},
        success:function(data){
        CKEDITOR.instances['ckeditor'].setData(data);
        $('.generateBTN').html(`Generate Description`);
        }
    });

});

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
</script>
@endsection
