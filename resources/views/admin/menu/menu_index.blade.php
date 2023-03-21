@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="page-wrapper">
        <div class="page-content-tab">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="float-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Menus</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Menus</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Menus </h4>
                            </div>
                            <div class="card-body">
                                <div id="simple-list" class="row">
                                    <ul id="sortable">
                                        @foreach ($data as $item)
                                            <li class="list-group-item" data-id="{{ $item->id }}"><span class="ui-icon ui-icon-arrowthick-2-n-s"
                                                    ></span>{{ $item->page }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('js')
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(function() {
                $( "#sortable" ).sortable({
                    update: function() {
                        sendOrderToServer();
                    }
                });
            });
            function sendOrderToServer(){
                var page = [];
                $('.list-group-item').each(function(i, obj) {
                    page.push($(this).data('id'));
                });

                $.ajax({
                    data: {input:page},
                    url: "{{ route('admin.updateMenu') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        swal("Updated!", 'Menu order updated successfully', "success");
                    },
                    error: function(data) {
                        swal("Deleted!", data, "error");
                    }
                });
            }
        </script>
    @endsection
