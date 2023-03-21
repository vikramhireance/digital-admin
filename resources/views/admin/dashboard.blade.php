@extends('layouts.admin')

<link rel="shortcut icon" href="{{asset('General_settings/favicon')}}/{{generalSettings()->favicon}}">

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
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="float-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Corpo Web</a>
                                    </li>
                                    <!--end nav-item-->
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a>
                                    </li>
                                    <!--end nav-item-->
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Dashboard</h4>
                        </div>
                        <!--end page-title-box-->
                    </div>
                    <!--end col-->
                </div>
                <!-- end page title end breadcrumb -->

                <div class="row">
                    {{-- <div class="col-md-12 col-lg-3 order-lg-1 order-md-2 order-sm-2">
                        <div class="card overflow-hidden">
                            <div class="card-body">
                                <div class="pt-3">
                                    <h3 class="text-dark text-center font-24 fw-bold line-height-lg">Corpo Web
                                        <br>CMS for Corporate Website
                                    </h3>
                                    <div class="text-center text-muted font-16 fw-bold pt-3 pb-1">We Design and Develop
                                        Clean and High Quality Web Applications</div>

                                    <div class="text-center py-3 mb-3">
                                        <a href="#" class="button button1">Buy Now</a>
                                    </div>
                                    <img src="assets/images/small/business.png" alt="" class="img-fluid px-3 mb-2">
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div> --}}
                    <!--end col-->
                    <div class="col-lg-12 order-lg-2 order-md-1 order-sm-1">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 col-md-6">
                                <div class="card overflow-hidden">
                                    <div class="card-body">
                                        <div class="row d-flex">
                                            <div class="col-3">
                                                <i class="ti ti-users font-36 align-self-center text-dark"></i>
                                            </div>
                                            <!--end col-->
                                            <div class="col-12 ms-auto align-self-center">
                                                <div id="dash_spark_1" class="mb-3"></div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-12 ms-auto align-self-center">
                                                <h3 class="text-dark my-0 font-22 fw-bold">24000</h3>
                                                <p class="text-muted mb-0 fw-semibold">Visitors</p>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                            <div class="col-lg-3 col-md-6">
                                <div class="card overflow-hidden">
                                    <div class="card-body">
                                        <div class="row d-flex">
                                            <div class="col-3">
                                                <i class="ti ti-stack font-36 align-self-center text-dark"></i>
                                            </div>
                                            <!--end col-->
                                            <div class="col-auto ms-auto align-self-center">
                                            {{-- <span class="badge badge-soft-success px-2 py-1 font-11">Active</span> --}}
                                        </div><!--end col-->
                                            <div class="col-12 ms-auto align-self-center">
                                                <div id="dash_spark_2" class="mb-3"></div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-12 ms-auto align-self-center">
                                                <h3 class="text-dark my-0 font-22 fw-bold">{{ $services }}</h3>
                                                <p class="text-muted mb-0 fw-semibold">Services</p>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                            <div class="col-lg-3 col-md-6">
                                <div class="card overflow-hidden">
                                    <div class="card-body">
                                        <div class="row d-flex">
                                            <div class="col-3">
                                                <i class="ti ti-stack font-36 align-self-center text-dark"></i>
                                            </div>
                                            <!--end col-->
                                            <div class="col-12 ms-auto align-self-center">
                                                <div id="dash_spark_3" class="mb-3"></div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-12 ms-auto align-self-center">
                                                <h3 class="text-dark my-0 font-22 fw-bold">{{ $portfolio }}</h3>
                                                <p class="text-muted mb-0 fw-semibold">Portfolio</p>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->

                            <div class="col-lg-3 col-md-6">
                                <div class="card overflow-hidden">
                                    <div class="card-body">
                                        <div class="row d-flex">
                                            <div class="col-3">
                                                <i class="ti ti-message font-36 align-self-center text-dark"></i>
                                            </div>
                                            <!--end col-->
                                            {{-- <div class="col-auto ms-auto align-self-center">
                                                <span class="badge badge-soft-danger px-2 py-1 font-11">-2%</span>
                                            </div> --}}
                                            <!--end col-->
                                            <div class="col-12 ms-auto align-self-center">
                                                <div id="dash_spark_4" class="mb-3"></div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-12 ms-auto align-self-center">
                                                <h3 class="text-dark my-0 font-22 fw-bold">{{ $messages }}</h3>
                                                <p class="text-muted mb-0 fw-semibold">Messages</p>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->


                        {{-- <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Manage Contact Messages</h4>
                                    </a>
                                    </div>
                                    <!--end card-header-->
                                    <div class="card-body">
                                        <div class="T">
                                            <table class="table table-bordered data-table">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>Title</th>
                                                        <th>Message</th>
                                                        <th>Date</th>
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
                        </div> --}}
                    </div>
                    <!--end row-->
                </div>
                <!--end card-header-->

            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->



    <!--Start Footer-->
    <!-- Footer Start -->
    @extends('admin.main.footer')

    <!-- end Footer -->
    <!--end footer-->
    </div>
    <!-- end page content -->
    </div>
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
        var url = "{{ URL::to('image') }}";
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.contact.messages') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'message',
                    name: 'message'
                },
                {
                    data: 'date',
                    name: 'date'
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
                        url: "{{ route('admin.contact.messages.delete') }}",
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
