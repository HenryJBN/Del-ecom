@extends('layouts.admin.main')


@section('css')
 <!-- Plugins css -->
 <link href="{{ asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}" rel="stylesheet">

 <style>
    #upload {
    opacity: 0;
}

#upload-label {
    position: absolute;
    top: 50%;
    left: 1rem;
    transform: translateY(-50%);
}

.image-area {
    border: 2px dashed rgba(255, 255, 255, 0.7);
    padding: 1rem;
    position: relative;
}

.image-area::before {
    content: 'Uploaded image result';
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 0.8rem;
    z-index: 1;
}

.image-area img {
    z-index: 2;
    position: relative;
}

</style>


@endsection

 @section('title')
{{$PageTitle}}
 @endsection


 @section('content')


    <div class="page-content-wrapper">

        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">{{$PageTitle}}</h4>

                    <table id="datatable-button" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>

                            <th>Site Name</th>
                            <th>Site Email</th>
                            <th>Site Phone Number</th>
                            <th width="280px">Others</th>
                            <th>Action</th>


                        </tr>
                        </thead>

                        <tbody>
                            {{-- @foreach($settings as $setting) --}}
                            <tr>
                                <td>
                                    {{ $setting->site_title ?? '' }}
                                </td>
                                <td>
                                    {{ $setting->site_email ?? '' }}
                                </td>
                                <td>
                                    {{ $setting->site_mobile ?? '' }}
                                </td>
                                <td>
                                  @if($setting->metadata != null)

                                  @foreach ($setting->metadata as $property)
                                  <b>{{ $property['key'] }}</b>: {{ $property['value'] }}<br />
                                   @endforeach

                              @endif
                                </td>

                                <td>
                                    <a class="btn btn-primary" href="{{ route('admin-set-gen-edit',$setting->id) }}">Edit</a>
                                </td>
                            </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>


                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->


        <div class="row h-100">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body h-100 justify-content-center align-items-center mx-auto d-block">


                        {!! Form::open(array('route' => 'admin-set-gen-logo','method'=>'POST', 'files' => true)) !!}

                        @csrf
                        <div class="">
                            <label >Site Logo</label>
                         <!-- Upload image input-->
                         <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm ">
                             {{-- {!! Form::file('image_url', null, array('placeholder' => 'Image_url','class' => 'form-control border-0','onchange'=>'readURL(this)','id'=>'upload')) !!} --}}
                             <input id="upload" name="site_logo" type="file" onchange="readURL(this);" accept=".png,.jpg,.gif" class="form-control border-0">
                             <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose Image</label>
                             <div class="input-group-append">
                                 <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                             </div>
                         </div>

                         <!-- Uploaded image area-->
                         <p class="font-italic text-white text-center">The image uploaded will be rendered inside the box below.</p>
                        <div class="image-area mt-4"><img id="imageResult" name="imageResult"
                            src="{{\App\Setting::logo('site_logo','small')}}" style="width:20%; margin-top:10px;" alt="" height="20" class="img-fluid rounded shadow-sm mx-auto d-block"></div>

                     </div>

                        <div class="form-group">
                            <div class="">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    Update Site Logo
                                </button>

                            </div>
                        </div>


                     {!! Form::close() !!}

                    </div>
                </div>
            </div> <!-- end col -->
        </div>

</div> <!-- container-fluid -->
 @endsection


 @section('js')

<script>
    /*  ==========================================
    SHOW UPLOADED IMAGE
* ========================================== */
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imageResult')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(function () {
    $('#upload').on('change', function () {
        readURL(input);
    });
});

/*  ==========================================
    SHOW UPLOADED IMAGE NAME
* ========================================== */
var input = document.getElementById( 'upload' );
var infoArea = document.getElementById( 'upload-label' );
input.addEventListener( 'change', showFileName(this,input) );




function showFileName( event ) {
  var input = event.srcElement;
  var fileName = input.files[0].name;
  infoArea.textContent = 'File name: ' + fileName;
}



function preview_image()
{
 var total_file=document.getElementById("upload_file").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'><br>");
 }
}
</script>


 @endsection
