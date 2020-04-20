@extends('layouts.admin.main')

@section('title')
{{$PageTitle}}
@endsection
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

@section('content')
<div class="page-content-wrapper">


    <h4 class="mt-0 header-title">Validation type</h4>
                    <p class="text-muted m-b-30 ">
                        @if (count($errors) > 0)


                        <div class="alert alert-danger">
                          <strong>Whoops!</strong> There were some problems with your input.<br><br>
                          <ul>
                             @foreach ($errors->all() as $error)
                               <li>{{ $error }}</li>
                             @endforeach
                          </ul>
                        </div>


                        <script>

                            Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: JSON.stringify({!! $errors !!}),
                            footer: '<a href>Why do I have this issue?</a>'
                            })
                        </script>
                      @endif
                     </p>


{!! Form::model($product, ['method' => 'PATCH','route' => ['admin-prod-update', $product['id']],'files'=>true]) !!}

@csrf
    <div class="row">
        <div class="col-lg-6">
            <div class="card m-b-20">
                <div class="card-body">

                    <h4 class="header-title text-center text-success">New Product Information</h4>


                        <div class="form-group">
                            <label>{{ __("Product Name") }}*</label>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','required')) !!}
                        </div>

                        <div class="form-group ">
                            <label class="control-label">Select Category</label>
                            <select id="cat" name="category_id" class="form-control" required="">
                                <option value="">{{ __("Select Category") }}</option>
                                  @foreach($categories as $cat)
                                      <option  value="{{ $cat->id }}" {{$cat->id == $product->category_id ? "selected":""}} >{{$cat->name}}</option>
                                  @endforeach

                         </select>
                        </div>

                        <div class="form-group ">
                            <label class="control-label">Select SubCategory</label>
                            <select id="subcat" name="subcategory_id" class="form-control" >
                                <option value="">{{ __("Select Sub Category") }}</option>
                                @if ($product->subcategory_id !== null)
                                    @foreach($product->category->subCategories as $sub)
                                    <option
                                    value="{{$sub->id}}" {{$sub->id == $product->subcategory_id ? "selected":""}} >{{$sub->name}}</option>
                                    @endforeach

                                @endif

                          </select>



                        </div>

                        <div class="form-group ">
                            <label class="control-label">Select Status</label>
                            <select id="status" name="status" class="form-control" required >
                                <option value="">{{ __("Select Status") }}</option>
                                @if ($product->status != null)
                                <option  value="{{ $product->status }}" {{$product->status != null ? "selected":""}} >{{ ucfirst($product->status)}}</option>
                                @endif
                                <option value="draft">{{ __("Draft") }}</option>
                                <option value="new">{{ __("New") }}</option>
                                <option value="available">{{ __("Available") }}</option>
                                <option value="unavailable">{{ __("Unavailable") }}</option>
                          </select>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <div>
                                {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','id'=>'elm1','files' => true)) !!}
                            </div>

                        </div>


                       <div class="form-group">
                            <label>Upload Product Images</label>
                            <div>
                                <input type="file" accept=".png,.jpg,.gif" name="product_image[]" class="filestyle"class="form-control" data-buttonname="btn-secondary"  multiple="multiple">
                            </div>
                        </div>


                        <div>
                            {{-- {{ Route::currentRouteName()}} --}}
                            {{-- <img src="{{$product->getFirstMediaUrl('products', 'thumb')}}" /> --}}
                            <div class="row">
                                 @foreach ($product->getMedia("products") as $item)
                                <div class="col-sm-6">
                                  <div class="card">
                                    <div class="card-body">


                                    <img src=" {{$item->getFullUrl()}}" width="100" height="100" alt="{{$product->name}}">

                                      <a href="{{$item->getFullUrl()}}" target="_blank"class="btn btn-primary">View Full Image</a>
                                    </div>
                                  </div>
                                </div>


                                   @endforeach
                              </div>



                        </div>

                </div>
            </div>
        </div> <!-- end col -->

        <div class="col-lg-6">
            <div class="card m-b-20">
                <div class="card-body">




                    <div class="form-group">
                        <label>Quantity</label>
                        <div>
                            {!! Form::number('quantity',null,array('placeholder' => 'Enter  Quantity ','class' => 'form-control','parsley-type'=>'email','required')) !!}

                        </div>
                    </div>
                    <div class="form-group">
                        <label>Price</label>

                        <div>
                            {!! Form::number('price',null, array('placeholder' => 'Enter product price','class' => 'form-control','required')) !!}

                        </div>
                    </div>
                    <div class="form-group">
                        <label>SKU</label>

                        <div>
                            {!! Form::text('sku',null, array('placeholder' => 'Enter Product Sku','class' => 'form-control','required')) !!}
                            {{-- <input type="text" class="form-control"
                            placeholder="{{ __('Enter Product Sku') }}" name="sku" required=""
                            value=""> --}}

                        </div>
                    </div>

                    <div class="form-group">
                        <label>Choose Product Color</label>
                        <div data-color-format="rgb" data-color="rgb(255, 146, 180)" class="colorpicker-default input-group">
                            <input type="text" name="color" readonly="readonly" value="" class="form-control">
                            <span class="input-group-append add-on">
                                <button class="btn btn-white" type="button">
                                    <i style="background-color: rgb(124, 66, 84);margin-top: 2px;"></i>
                                </button>
                            </span>
                        </div>
                    </div>


                        <div class="form-group">
                            <label>Slug:</label>
                            l
                            {!! Form::text('slug', null, array('placeholder' => 'Slug','class' => 'form-control','required')) !!}
                        </div>

                        <div class="form-group">
                            <label>Size (optional)</label>
                            <div>
                                {!! Form::text('size', null, array('placeholder' => 'Enter product weight','class' => 'form-control')) !!}

                            </div>
                        </div>

                        <div class="form-group">
                            <label>Weight <span class="text-center">(optional)</span></label>

                            <div>
                                {!! Form::number('weight',null, array('placeholder' => 'Enter product price','class' => 'form-control')) !!}

                            </div>
                        </div>

                        <div class="form-group">
                            <label>Brand <span class="text-center">(optional)</span></label>

                            <div>
                                {!! Form::text('brand',null, array('placeholder' => 'Enter product price','class' => 'form-control')) !!}

                            </div>
                        </div>

                        <div class="form-group">
                            <label>Model <span class="text-center">(optional)</span></label>

                            <div>
                                {!! Form::text('model',null, array('placeholder' => 'Enter product price','class' => 'form-control')) !!}

                            </div>
                        </div>


                        <div>
                            <label > Featured Image</label>
                         <!-- Upload image input-->
                         <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                             {{-- {!! Form::file('image_url', null, array('placeholder' => 'Image_url','class' => 'form-control border-0','onchange'=>'readURL(this)','id'=>'upload')) !!} --}}
                             <input id="upload" name="featured_image" type="file" onchange="readURL(this);" accept=".png,.jpg,.gif" class="form-control border-0">
                             <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose Image</label>
                             <div class="input-group-append">
                                 <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                             </div>
                         </div>

                         <!-- Uploaded image area-->
                         <p class="font-italic text-white text-center">The image uploaded will be rendered inside the box below.</p>
                         <div class="image-area mt-4"><img id="imageResult" name="imageResult"
                            src="{{$product->getFirstMediaUrl('featured_product')}}" style="width:20%; margin-top:10px;" alt="" height="20" class="img-fluid rounded shadow-sm mx-auto d-block"></div>

                     </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
<div class="row h-100 ">
    <div class="card m-b-20 col-lg-12 h-100 justify-content-center align-items-center">
        <div class="card-body">
    <div class="form-group">
        <div>
            <button type="submit" class="btn btn-primary waves-effect waves-light m-l-10">
                Update Product
            </button>
            <a href="{{route('admin-prod-index')}}" class="btn btn-secondary waves-effect m-l-5">
                Cancel
            </a>
        </div>
    </div>
        </div></div>
</div>
{!! Form::close() !!}



</div>
@endsection

@section('js')
<!-- Script -->
<script type='text/javascript'>

    $(document).ready(function(){

      // Category Change
      $('#cat').change(function(){

// Product id
var id = $(this).val();

// Empty the dropdown
$('#subcat').find('option').not(':first').remove();

var url = '{{ route("admin-subcat-load", ":id") }}';

   url = url.replace(':id',id);
// AJAX request
$.ajax({
   url: url,
           type: 'get',
           dataType: 'json',
           success: function(response){

             var len = 0;
             if(response['cat'] != null){
               len = response['cat'].length;
             }

             if(len > 0){
               // Read data and create <option >
               for(var i=0; i<len; i++){

                 var id = response['cat'][i].id;
                 var name = response['cat'][i].name;

                 var option = "<option value='"+id+"'>"+name+"</option>";

                 $("#subcat").append(option);
               }
             }

           }
        });



      });

    });

    </script>



        <script src="{{ asset('plugins/bootstrap-md-datetimepicker/js/moment-with-locales.min.js')}}"></script>
        <script src="{{ asset('plugins/bootstrap-md-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>

        <!-- Plugins js -->
        <script src="{{ asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>

         <script src="{{ asset('plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>

        <script src="{{ asset('plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js')}}"></script>

        <!-- Plugins Init js -->
        <script src="{{ asset('assets/pages/form-advanced.js')}}"></script>

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


