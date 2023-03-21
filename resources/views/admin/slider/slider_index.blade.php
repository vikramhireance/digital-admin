@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="page-wrapper">
        <!-- Page Content-->
        <div class="page-content-tab">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-box">
                            <div class="float-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Slider</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Datatables</h4>
                        </div>
                        <!--end page-title-box-->
                    </div>
                    <!--end col-->
                </div>
                <!-- end page title end breadcrumb -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Sliders Details </h4>

                                <a href="{{URL::to('admin/slider/add')}}" class="button button1" style="float: right;">
                                    + Add Slider
                            </a>
                            </div>
                            <!--end card-header-->
                            <div class="card-body">
                                <div class="T">
                                    <table class="table table-bordered data-table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Subtitle</th>
                                                <th>Button Text</th>
                                                <th>Button URL</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div><!-- container -->

            <!--Start Footer-->
            <!-- Footer Start -->
            <footer class="footer text-center text-sm-start">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script> Unikit <span class="text-muted d-none d-sm-inline-block float-end">Crafted with
                    <i class="mdi mdi-heart text-danger"></i> by Mannatthemes</span>
            </footer>
            <!-- end Footer -->
            <!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- Javascript  -->
@endsection
@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
        var url = "{{ URL::to('image') }}";
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.slider') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'image',
                    name: 'image'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'subtitle',
                    name: 'subtitle'
                },
                {
                    data: 'button_text',
                    name: 'button_text'
                },
                {
                    data: 'button_url',
                    name: 'button_url'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function deleteButton(id) {
            swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this imaginary file!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false
                },
                function() {

                    $.ajax({
                        data: {
                            id: id
                        },
                        url: "{{ route('admin.deleteslider') }}",
                        type: "POST",
                        dataType: 'json',
                        success: function(data) {
                            if (data.status) {
                                swal("Deleted!", data.message, "success");
                                location.reload();
                            }
                        },
                        error: function(data) {
                            swal("Deleted!", "Your imaginary file has been deleted.", "success");
                        }
                    });
                });

            $.confirm({
                title: 'Confirm!',
                content: 'Are you sore this item deleted !',
                buttons: {
                    confirm: function() {
                        location.reload();
                    },
                    cancel: function() {
                        swal("Canceled!");
                    }
                }
            });
        }
    </script>
@endsection
