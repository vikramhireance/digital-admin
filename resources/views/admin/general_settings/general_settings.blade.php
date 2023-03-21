@extends('layouts.admin')
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
    <link href="{{ asset('admin/assets/plugins/select/selectr.min.css') }}" rel="stylesheet" type="text/css" />
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
                                        <h2 class="card-title-lg">General Settings</h2>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>

                            <div class="card-body">

                                <form class="form-horizontal auth-form my-4" method="post" id="submitForm"
                                    action="{{ URL::to('admin/general_settings/update') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="example-text-input-lg" ></label>

                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg"
                                            >Website Title</label>
                                        <div class="col-md-12">
                                            <input class="form-control mb-3" type="text" name="website_title"
                                                placeholder="Enter Website Title" id="example-text-input-lg"
                                                value="{{ $data->website_title }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg"
                                            >website Description</label>
                                        <div class="col-sm-12">
                                            <textarea class="ckeditor form-control" name="website_description">{{ $data->website_description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group imgPreview1">
                                        <div class="col-sm-2">
                                            <img src="{{ URL::to('General_settings/light_logo') . '/' . $data->light_logo }}"
                                                class="editImg mb-2" width="100%">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg"
                                            >Light Logo</label>
                                        <div class="col-sm-12">
                                            <input class="form-control mb-3 file1" type="file" name="light_logo"
                                                placeholder="Select Light Logo" id="example-text-input-lg">
                                        </div>

                                    </div>
                                    <div class="form-group imgPreview2">
                                        <div class="col-sm-2">
                                            <img src="{{ URL::to('General_settings/dark_logo') . '/' . $data->dark_logo }}"
                                                class="editImg mb-2" width="100%">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg"
                                            >Dark Logo</label>
                                        <div class="col-sm-12">
                                            <input class="form-control mb-3 file2" type="file" name="dark_logo"
                                                placeholder="Select Dark Logo" id="example-text-input-lg">
                                        </div>

                                    </div>
                                    <div class="form-group imgPreview3">
                                        <div class="col-sm-2">
                                            <img src="{{ URL::to('General_settings/mobile_logo') . '/' . $data->mobile_logo }}"
                                                class="editImg mb-2" width="100%">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg"
                                            >Mobile Logo</label>
                                        <div class="col-sm-12">
                                            <input class="form-control mb-3 file3" type="file" name="mobile_logo"
                                                placeholder="Select Mobile Logo" id="example-text-input-lg">
                                        </div>

                                    </div>
                                    <div class="form-group imgPreview4">
                                        <div class="col-sm-2">
                                            <img src="{{ URL::to('General_settings/favicon') . '/' . $data->favicon }}"
                                                class="editImg mb-2" width="100%">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg"
                                            >Favicon</label>
                                        <div class="col-sm-12">
                                            <input class="form-control mb-3 file4" type="file" name="favicon"
                                                placeholder="Select favicon" id="example-text-input-lg">
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input-lg"
                                                    >Primary Color</label>
                                                <div class="col-md-12">
                                                    <input class="form-control mb-3" type="color"
                                                        name="primary_color" placeholder="Enter Primary Color"
                                                        id="example-text-input-lg" value="{{ $data->primary_color }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input-lg"
                                                    >Secondary Color</label>
                                                <div class="col-md-12">
                                                    <input class="form-control mb-3" type="color"
                                                        name="secondary_color" placeholder="Enter Secondary Color"
                                                        id="example-text-input-lg" value="{{ $data->secondary_color }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="example-text-input-lg"
                                            >Dark Mode</label>
                                        <div class="col-sm-6 m-2">
                                            <div class="form-check form-switch form-switch-success">
                                                <input class="form-check-input" type="checkbox" id="customSwitchSuccess" value="1" name="dark_mode" @if($data->dark_mode == 1) checked @endif>
                                                <label class="form-check-label" for="customSwitchSuccess"></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" id="dark">
                                        <div class="col-md-6" >
                                            <div class="form-group">
                                                <label for="example-text-input-lg"
                                                    >Dark Primary Color</label>
                                                <div class="col-md-12">
                                                    <input class="form-control mb-3" type="color"
                                                        name="dark_primary_color" placeholder="Enter Primary Color"
                                                        id="example-text-input-lg" value="{{ $data->dark_primary_color }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" id="">
                                                <label for="example-text-input-lg"
                                                    >Dark Secondary Color</label>
                                                <div class="col-md-12">
                                                    <input class="form-control mb-3" type="color"
                                                        name="dark_secondary_color" placeholder="Enter Secondary Color"
                                                        id="example-text-input-lg" value="{{ $data->dark_secondary_color }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="example-text-input-lg"
                                            >Live Mode</label>
                                        <div class="col-sm-6 m-2">
                                            <div class="form-check form-switch form-switch-success">
                                                <input class="form-check-input" type="checkbox" id="customSwitchlive_mode" value="1" name="live_mode" @if($data->live_mode == 1) checked @endif>
                                                <label class="form-check-label" for="customSwitchlive_mode"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg"
                                            >Website Type</label>
                                        <div class="col-sm-12">
                                            <select name="website_type" id="default" class="form-control">
                                                <option value="Digital Marketing" @if($data->website_type == 'Digital Marketing') selected @endif >Digital Marketing</option>
                                                <option value="Web Design"  @if($data->website_type =='Web Design') selected @endif>Web Design</option>
                                                <option value="Mobile Apps Development"  @if($data->website_type == 'Mobile Apps Development') selected @endif>Mobile Apps Development</option>
                                                <option value="Graphics Design"  @if($data->website_type == 'Graphics Design') selected @endif>Graphics Design</option>
                                                <option value="Web Hosting"  @if($data->website_type == 'Web Hosting') selected @endif>Web Hosting</option>
                                                <option value="Branding"  @if($data->website_type == 'Branding') selected @endif>Branding</option>
                                                <option value="Plumbing"  @if($data->website_type == 'Plumbing') selected @endif>Plumbing</option>
                                                <option value="Construction"  @if($data->website_type == 'Construction') selected @endif>Construction</option>
                                                <option value="Real Estate"  @if($data->website_type == 'Real Estate') selected @endif>Real Estate</option>
                                                <option value="Medical"  @if($data->website_type == 'Medical') selected @endif>Medical</option>
                                                <option value="Event Management"  @if($data->website_type == 'Event Management') selected @endif>Event Management</option>
                                                <option value="Education"  @if($data->website_type == 'Education') selected @endif>Education</option>
                                                <option value="Electrician"  @if($data->website_type == 'Electrician') selected @endif>Electrician</option>
                                                <option value="Car Servicing"  @if($data->website_type =='Car Servicing') selected @endif>Car Servicing</option>
                                                <option value="AC Servicing"  @if($data->website_type == 'AC Servicing') selected @endif>AC Servicing</option>
                                                <option value="Salon"  @if($data->website_type == 'Salon') selected @endif>Salon</option>
                                                <option value="Pest Control"  @if($data->website_type == 'Pest Control') selected @endif>Pest Control</option>
                                                <option value="Home Painting"  @if($data->website_type == 'Home Painting') selected @endif>Home Painting</option>
                                                <option value="Cleaning"  @if($data->website_type == 'Cleaning') selected @endif>Cleaning</option>
                                                <option value="Water Purifier"  @if($data->website_type == 'Water Purifier') selected @endif>Water Purifier</option>
                                                <option value="Export & Import"  @if($data->website_type =='Export & Import') selected @endif>Export & Import</option>
                                            </select>
                                        </div>
                                        <div class="form-group mt-3">
                                            <label>Chat GPT Api Key</label>
                                            <div class="col-md-12">
                                                <input class="form-control mb-3" type="text" name="chat_gpt_api_key"
                                                    placeholder="Enter Meta Titile" id="example-text-input-lg" value="{{ $data->chat_gpt_api_key}}">
                                            </div>
                                        </div>
                                        <div class="form-group mt-3">
                                            <label>Copyright text</label>
                                            <div class="col-md-12">
                                                <input class="form-control mb-3" type="text" name="copyright_text"
                                                    placeholder="Enter Office Hours" id="example-text-input-lg" value="{{ $data->copyright_text}}">
                                            </div>
                                        </div>
                                        <div class="form-group mt-3">
                                            <label>Office Hours</label>
                                            <div class="col-md-12">
                                                <input class="form-control mb-3" type="text" name="office_hours"
                                                    placeholder="Enter Office Hours" id="example-text-input-lg" value="{{ $data->office_hours}}">
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
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<script src="{{ asset('admin/assets/plugins/select/selectr.min.js') }}"></script>
<script src="{{ asset('admin/assets/pages/forms-advanced.js') }}"></script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>


<script>
    var dk = '{{$data->dark_mode}}';
    if(dk == 1){
        $("#dark").show();
    }else{
        $("#dark").hide();
    }
    
    $("#customSwitchSuccess ").on("click", function() {
        let isChecked = $('#customSwitchSuccess').is(':checked');
        if(isChecked){
            $("#dark").show();
        }else{
            $("#dark").hide();
        }
    });

$('.file1').change(function(){
    const file = this.files[0];
    if (file){
        let reader = new FileReader();
        reader.onload = function(event){
        console.log(event.target.result);
        $('.imgPreview1 img').attr('src', event.target.result);
        $('.imgPreview1').show();
        }
        reader.readAsDataURL(file);
    }
});
$('.file2').change(function(){
    const file = this.files[0];
    if (file){
        let reader = new FileReader();
        reader.onload = function(event){
        console.log(event.target.result);
        $('.imgPreview2 img').attr('src', event.target.result);
        $('.imgPreview2').show();
        }
        reader.readAsDataURL(file);
    }
});
$('.file3').change(function(){
    const file = this.files[0];
    if (file){
        let reader = new FileReader();
        reader.onload = function(event){
        console.log(event.target.result);
        $('.imgPreview3 img').attr('src', event.target.result);
        $('.imgPreview3').show();
        }
        reader.readAsDataURL(file);
    }
});
$('.file4').change(function(){
    const file = this.files[0];
    if (file){
        let reader = new FileReader();
        reader.onload = function(event){
        console.log(event.target.result);
        $('.imgPreview4 img').attr('src', event.target.result);
        $('.imgPreview4').show();
        }
        reader.readAsDataURL(file);
    }
});
</script>
@endsection
