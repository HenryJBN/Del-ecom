@extends('layouts.admin.main')
 @section('title')
{{$PageTitle}}
 @endsection

 @section('css')
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
 @section('content')

 <div class="page-content-wrapper">

    <div class="row h-100">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">

                    <h4 class="mt-0 header-title">{{$PageTitle}}</h4>
                    <p class="text-muted m-b-30 ">
                    @include('errors.validation')


                     </p>



                      <div class="card">




                        {!! Form::model($subcategory, ['method' => 'PATCH','route' => ['admin-subcat-update', $subcategory['id']],'files'=>true]) !!}
                        @csrf
                                  <div class="row h-100 justify-content-center align-items-center">
                                      <div class="col-xs-8 col-sm-8 col-md-8">
                                          <div class="form-group">
                                              <strong>Category:</strong>
                                              <select name="category_id" required="" class="form-control">
                                                <option value="">{{ __("Select Category") }}</option>
                                                  @foreach($category as $cat)
                                                    <option value="{{ $cat->id }}" {{ $subcategory->category_id == $cat->id ? 'selected' :'' }}>{{ $cat->name }}</option>
                                                  @endforeach
                                              </select>
                                             </div>
                                      </div>
                                      <div class="col-xs-8 col-sm-8 col-md-8">
                                          <div class="form-group">
                                              <strong>Name:</strong>
                                              {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','id'=>'name')) !!}
                                          </div>
                                      </div>
                                      <div class="col-xs-8 col-sm-8 col-md-8">
                                          <div class="form-group">
                                              <strong>Slug:</strong>
                                              {!! Form::text('slug', null, array('placeholder' => 'Slug','class' => 'form-control','id'=>'slug')) !!}
                                          </div>
                                      </div>
                                      <div class="col-xs-8 col-sm-8 col-md-8">
                                          <div class="form-group">
                                              <strong>Description:</strong>
                                              {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','id'=>'elm1')) !!}
                                          </div>
                                      </div>



                                          <div class="col-xs-8 col-sm-8 col-md-8">
                                                 <strong>{{ __('Set Icon') }}</strong>
                                              <!-- Upload image input-->
                                              <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                                  {{-- {!! Form::file('image_url', null, array('placeholder' => 'Image_url','class' => 'form-control border-0','onchange'=>'readURL(this)','id'=>'upload')) !!} --}}
                                                  <input id="upload" name="upload" type="file" onchange="readURL(this);" accept=".png,.jpg,.gif" class="form-control border-0">
                                                  <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose Image</label>
                                                  <div class="input-group-append">
                                                      <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                                                  </div>
                                              </div>

                                              <!-- Uploaded image area-->
                                              <p class="font-italic text-white text-center">The image uploaded will be rendered inside the box below.</p>
                                              <div class="image-area mt-4"><img id="imageResult" name="imageResult" src="{{$subcategory->getFirstMediaUrl('subcategory')}}" style="width:20%; margin-top:10px;" alt="" height="20" class="img-fluid rounded shadow-sm mx-auto d-block"></div>

                                          </div>





                                      <div class="col-xs-8 col-sm-8 col-md-8 text-center">
                                          <button type="submit" class="btn btn-primary">{{ __('Update SubCategory') }}</button>
                                      </div>
                                  </div>
                                {!! Form::close() !!}
                      </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->



</div> <!-- container-fluid -->



 @endsection



 @section('js')

        <!--Wysiwig js-->
   <script src="{{asset('plugins/tinymce/tinymce.min.js')}}"></script>

   <script>
    $(document).ready(function () {
        if($("#elm1").length > 0){
            tinymce.init({
                selector: "textarea#elm1",
                theme: "modern",
                height:300,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                style_formats: [
                    {title: 'Bold text', inline: 'b'},
                    {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                    {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                    {title: 'Example 1', inline: 'span', classes: 'example1'},
                    {title: 'Example 2', inline: 'span', classes: 'example2'},
                    {title: 'Table styles'},
                    {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                ]
            });
        }
    });



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

input.addEventListener( 'change', showFileName );
function showFileName( event ) {
  var input = event.srcElement;
  var fileName = input.files[0].name;
  infoArea.textContent = 'File name: ' + fileName;
}

</script>


 @endsection

