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





                            <div class="span3 well">
                                <center>
                                <a href="#aboutModal" data-toggle="modal" data-target="#myModal"><img src="{{ \App\User::profileImage('profile_logo','square',$user->id)}}" name="aboutme" width="140" height="140" class="img-circle"></a>
                                <h3>{{$user->name}}</h3>
                                <em>click my face for more</em>
                                </center>
                            </div>


                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <h4 class="modal-title" id="myModalLabel">More About  {{ substr($user->name,0,4)}}..</h4>
                                            </div>
                                        <div class="modal-body">
                                            <center>
                                               <img src="" name="aboutme" width="140" height="140" border="0" class="img-circle"></a>

                                               <a href="#aboutModal" class="btn btn-success" data-toggle="modal" data-target="#imageupload"> Change Profile </a>
                                                <h3 class="media-heading">
                                                {{ $user->name}}
                                             <small> </small></h3>
                                            <span><strong>Info: </strong></span>
                                                <span class="badge badge-warning">{{ $user->email}}</span>
                                                <span class="badge badge-info">{{ $user->type}}</span>
                                                <span><strong>Created At: </strong></span>
                                                <span class="badge badge-success">{{ $user->created_at->format('j Y-M H:m:i a')}}</span>

                                            </center>
                                            <hr>
                                            <center>
                                            <p class="text-left"><strong>Bio: </strong><br>
                                               .......</p>
                                            <br>
                                            </center>
                                        </div>


                                        <div class="modal-footer">
                                            <center>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">I've heard enough about  {{ substr($user->name,0,3)}}..</button>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>






                            <!-- Modal for profile -->
                            <div class="modal fade" id="imageupload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <h4 class="modal-title" id="myModalLabel">Change Profile Image..</h4>
                                            </div>
                                        <div class="modal-body">
                                            {!! Form::model($user, ['method' => 'PATCH','route' => ['admin-user-profile-update',$user['id'] ],'files'=>true]) !!}

                                            @csrf
                                            <center>
                                                <div class=""><img id="imageResult" width="140" height="140" border="0" class="img-circle" name="imageResult"
                                                    src="{{ \App\User::profileImage('profile_logo','thumb',$user->id)}}"></div>


                                            <h3 class="media-heading">
                                                {{ $user->name}}
                                             <small> </small></h3>
                                            <span><strong>

                                                <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm ">
                                                    {{-- {!! Form::file('image_url', null, array('placeholder' => 'Image_url','class' => 'form-control border-0','onchange'=>'readURL(this)','id'=>'upload')) !!} --}}
                                                    <input id="upload" name="profile_logo" type="file" onchange="readURL(this);" accept=".png,.jpg,.gif" class="form-control border-0">
                                                    <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose Image</label>
                                                    <div class="input-group-append">
                                                        <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                                                    </div>
                                                </div>

                                            </strong></span>

                                            </center>
                                            <hr>
                                            <center>
                                            <button class="btn btn-success" type="submit"> Update Profile Image</button>
                                            <br>
                                            </center>

                                            {!! Form::close() !!}
                                        </div>


                                        <div class="modal-footer">
                                            <center>
                                            <button type="button" class="btn btn-default" data-dismiss="modal"> Cancel</button>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->


        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body">



                        <h4 class="mt-0 header-title">{{$orders_PageTitle}}</h4>

                        @include('admin.order.table')

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body">

                      

                        <h4 class="mt-0 header-title">{{$trans_PageTitle}}</h4>

                        @include('admin.trans.table')

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->


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
