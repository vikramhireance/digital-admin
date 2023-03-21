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
                        <div class="card p-2">
                            <div class="card-header">
                                <div class="row align-items-left">
                                    <div class="col">
                                        <h2 class="card-title-lg">Add Gallery</h2>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>

                            <div class="card-body">

                                <form class="form-horizontal auth-form my-4" method="post" id="submitForm"
                                    enctype="multipart/form-data" action="{{ URL::to('admin/gallery/store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="example-text-input-lg"></label>

                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg">Title</label>
                                        <div class="col-md-12">
                                            <input class="form-control mb-3" type="text" name="title" required
                                                placeholder="Enter Title" id="example-text-input-lg">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="example-text-input-lg">Type</label>
                                        <div class="col-md-12">
                                            <select id="option1" class="form-control mb-3" name="type" required>
                                                <option value="">--Select--</option>
                                                <option value="image">Image</option>
                                                <option value="video">Video</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group" id='opp2'>
                                        <label for="example-text-input-lg">Video</label>
                                        <div class="col-md-12">
                                            <input class="form-control mb-3" type="file" name="video"
                                                placeholder="Enter Video" id="example-text-input-lg" accept="video/*">
                                        </div>
                                    </div>
                                    <div class="form-group imgPreview">
                                        <div class="col-md-2">
                                            <img src="" width="100%">
                                        </div>
                                    </div>
                                    <div class="form-group" id='opp1'>
                                        <label for="example-text-input-lg">Image</label>
                                        <div class="col-md-12">
                                            <input class="form-control mb-3 file1" type="file" name="image"
                                                placeholder="Enter Image" id="example-text-input-lg">
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
        $("#opp2").hide();
        $("#option1").on("change", function() {
            if ($(this).val() == "image") {
                $("#opp1").show();
                $("#opp2").hide();
            } else {
                $("#opp2").show();
                $("#opp1").hide();
            }
        });
    </script>
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
        </script>
    @endsection
