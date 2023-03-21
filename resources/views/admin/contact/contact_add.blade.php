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
                                        <h2 class="card-title-lg">Add Contact</h2>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>

                            <div class="card-body">

                                <form class="form-horizontal auth-form my-4" method="post" id="submitForm"
                                    enctype="multipart/form-data" action="{{ URL::to('admin/contact/store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="example-text-input-lg"></label>

                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg">Phone</label>
                                        <div class="col-md-12">
                                            <input class="form-control mb-3" type="text" name="phone"
                                                placeholder="Enter Phone" id="example-text-input-lg" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg">Email</label>
                                        <div class="col-md-12">
                                            <input class="form-control mb-3" type="text" name="email"
                                                placeholder="Enter Email" id="example-text-input-lg" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg">Address Title</label>
                                        <div class="col-md-12">
                                            <input class="form-control mb-3" type="text" name="address_title"
                                                placeholder="Enter Address Title" id="example-text-input-lg" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg">Address Details</label>
                                        <div class="col-md-12">
                                            <input class="form-control mb-3" type="text" name="address_details"
                                                placeholder="Enter Address Details" id="example-text-input-lg" required>
                                        </div>
                                    </div>

                                    <center class="col-md-12">
                                        <button class="btn btn-primary mb-2 submitButton col-md-12" type="submit">Save <i
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
        <!-- Javascript  -->
    @endsection
    @section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
$("#opp2").hide();
$("#option1").on("change", function(){  
    if ($(this).val()=="image"){
        $("#opp1").show();
        $("#opp2").hide();
    }else{
        $("#opp2").show();
        $("#opp1").hide();
    }
});
</script>
@endsection 
