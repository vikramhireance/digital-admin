@extends('layouts.admin')
@section('css')
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
                                    <h2 class="card-title-lg">Edit Trusted By</h2>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>

                        <div class="card-body">
                            <div class="tab-pane fade show active p-3 pt-3" id="LogIn_Tab" role="tabpanel">
                                <form class="form-horizontal auth-form my-4" action="{{ URL::to('admin/trusted_by/update') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">Review</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="review" value="{{$data->review}}"
                                                id="title" placeholder="Enter Review">
                                        </div>
                                    </div>
                                    <!--end form-group-->

                                    <!--end form-group-->
                                    <div class="form-group imgPreview">
                                        <div class="col-sm-2">
                                            @if($data->image)
                                            <img src="{{URL::to('Trusted')}}/{{$data->image}}" width="100%">
                                        @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <div class="col-sm-12 mb-3">
                                            <input type="file" class="form-control file1" name="image" 
                                                id="image" placeholder="Select Image">
                                            
                                        </div>
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
