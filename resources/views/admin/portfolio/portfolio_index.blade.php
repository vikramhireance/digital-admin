@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content-tab">

            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="float-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Portfolio</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Portfolio</h4>
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
                                <h4 class="card-title" style="float: left;">Portfolio Details </h4>

                                <a href="{{asset('admin/portfolio/add')}}" class="button button1" style="float: right;">
                                    + Add Portfolio
                                </a>
                            </div>
                            <!--end card-header-->
                            <div class="card-body">
                                <div class="T">
                                    <table class="table table-bordered data-table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Image</th>
                                                <th>Meta Title</th>
                                                <th>Meta Description</th>
                                                <th>Meta Keyword</th>

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

            <!--end Rightbar/offcanvas-->
            <!--end Rightbar-->

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
    <script>
        var url = "{{ asset('image') }}";
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.portfolio') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'category_title',
                    name: 'category_title'
                },
                
                {
                    data: 'image',
                    name: 'image'
                },
                {
                    data: 'meta_title',
                    name: 'meta_title'
                },
                {
                    data: 'meta_description',
                    name: 'meta_description'
                },
                {
                    data: 'meta_keyword',
                    name: 'meta_keyword'
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
                    text: "You will not be able to recover this item!",
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
                        url: "{{ route('admin.portfolio_delete') }}",
                        type: "POST",
                        dataType: 'json',
                        success: function(data) {
                            if (data.status) {
                                swal("Deleted!", data.message, "success");
                                location.reload();
                            }
                        },
                        error: function(data) {
                            swal("Deleted!", data, "error");
                        }
                    });
                });
        }
    </script>
@endsection
