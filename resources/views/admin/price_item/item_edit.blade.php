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
                                        <h2 class="card-title-lg">Edit Pricing Items</h2>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>

                            <div class="card-body">

                                <form class="form-horizontal auth-form my-4" method="post" id="submitForm"
                                    enctype="multipart/form-data" action="{{ URL::to('admin/pricing_items/update') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $data->id }}">
                                    <div class="form-group">
                                        <label for="example-text-input-lg">Title</label>
                                        <div class="col-md-12">
                                            <input class="form-control mb-3" type="text" name="title"
                                                value="{{ $data->title }}" id="example-text-input-lg">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Price</label>
                                        <div class="col-md-12">
                                            <select name="price_id" class="form-control mb-3">
                                                {{-- <option value="">--Select Price--</option> --}}
                                                  
                                                @foreach ($pricing as $item)
                                                    
                                                    <option value="{{ $item->id }}" @if ($data->price_id == $item->id) selected @endif>{{ $item->price }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                      
                                        <div class="col-md-12">
                                            <select name="status" id="" class="form-control mb-3">
                                                <option  @if ($data->status == 1) selected @endif  value="1">1</option>
                                                <option  @if ($data->status == 2) selected @endif  value="2">2</option>
                                            </select>
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
        $('.file1').change(function() {
            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    console.log(event.target.result);
                    $('.imgPreview img').attr('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
