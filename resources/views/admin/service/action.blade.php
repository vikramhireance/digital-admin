<div class="d-flex justify-content-end align-items-center" id="action">
    <a href="{{URL::to('admin/service/edit/'.$data->id)}}" class="btn btn-success btn-sm mr-2">
        <i class="far fa-edit text-light"></i>
    </a>
    <a class="btn btn-danger btn-sm" onclick="deleteButton('{{$data->id}}')">
        <i class="far fa-trash-alt text-light"></i>
    </a>
</div>