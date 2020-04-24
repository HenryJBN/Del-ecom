@extends('layouts.admin.main')

@section('title')
{{$PageTitle}}
@endsection

@section('css')
<style>
    #loader{
    visibility:hidden;
    }
    #loader2{
    visibility:hidden;
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


{!! Form::open(array('route' => 'admin-order-store','method'=>'POST')) !!}

    <div class="row">
        <div class="col-lg-6">
            <div class="card m-b-20">
                <div class="card-body">



                    <div class="form-group">
                        {!! Form::hidden('user_id', auth()->user()->id, ['placeholder'=>'Enter User ID', 'class'=>'form-control input-lg','required','readonly']) !!}

                        <label>Order ID</label>
                        {!! Form::text('order_code',$order_code, ['placeholder'=>'Enter User ID', 'class'=>'form-control input-lg','required','readonly']) !!}
                    </div>

                    <div style="margin-bottom:50px">
                    </div>

                    <hr class="py-3">

                    <div class="form-group ">
                        <label class="control-label">Order Status</label>
                        <select id="status" name="status" class="form-control" required >
                            <option value="">{{ __("Select Status") }}</option>
                            <option value="new">{{ __("New") }}</option>
                            <option value="shipped">{{ __("Shipping") }}</option>
                            <option value="cancelled">{{ __("Cancelled") }}</option>
                            <option value="delivered">{{ __("Delivered") }}</option>
                            <option value="returned">{{ __("Returned") }}</option>

                      </select>
                    </div>

                    <hr class="py-3">

                    <div class="justify-content-center align-items-center h4 text-center">
                        Billing Info
                       <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
                    </div>

                       @if ( \App\Billing::where('user_id',auth()->id())->first() != null  )

                               <div class="col-md-12">
                                 <span id="loader"><i class="fa fa-spinner fa-3x fa-spin"></i></span>
                              <p><input id="getbillingInfo" name="getbillinginfo" type="checkbox"> Check if you want to use your Previous billing info.</p>

                             </div>

                       @endif

                       {{-- Billing information --}}
                            <div class="form-group">
                                <strong>First Name:</strong>
                                {!! Form::text('bill_first_name', null, array('placeholder' => 'First Name','class' => 'form-control','id'=>'bill_first_name','required')) !!}
                            </div>

                            <div class="form-group">
                                <strong>Last Name:</strong>
                                {!! Form::text('bill_last_name', null, array('placeholder' => 'Last Name','class' => 'form-control','id'=>'bill_last_name','required')) !!}
                            </div>

                            <div class="form-group">
                                <strong>Email:</strong>
                                {!! Form::email('bill_email', null, array('placeholder' => 'email','class' => 'form-control','id'=>'bill_email','required')) !!}
                            </div>

                            <div class="form-group">
                                <strong>Phone Number:</strong>
                                {!! Form::text('bill_phone_number', null, array('placeholder' => 'eg. 07065114740','class' => 'form-control','id'=>'bill_phone_number','required')) !!}
                            </div>

                            <div class="form-group">
                                <strong>State:</strong>
                                {!! Form::text('bill_state', null, array('placeholder' => 'eg. Abuja','class' => 'form-control','id'=>'bill_state','required')) !!}
                            </div>

                            <div class="form-group">
                                <strong>Address:</strong>
                                {!! Form::textarea('bill_address', null, array('placeholder' => 'Address','class' => 'form-control','id'=>'bill_address','rows'=>4,'required')) !!}
                            </div>
                       {{-- end of billing information --}}


                <!-- update billing Field -->
                <div class="form-group ">
                    <p><input id="save_billinginfo" name="save_billinginfo" type="checkbox"> Do you want to update you billing Info?</p>

                </div>


                        <div style="margin-bottom:100px">

                        </div>






                </div>
            </div>
        </div> <!-- end col -->

        <div class="col-lg-6">
            <div class="card m-b-20">
                <div class="card-body">
                    <div class="form-group">
                        <!-- Cart Field -->
                           {!! Form::label('items', 'Items:') !!}

                         {!! Form::textarea('items', Cart::Content(), ['placeholder'=>'Cart', 'class'=>'form-control','rows'=>'4','required','readonly']) !!}
                    </div>

                   <hr class="py-3">
                  <div class="form-group">
                   <strong>Email:</strong>
                   {!! Form::email('email', Auth::user()->email, array('placeholder' => 'email','class' => 'form-control','required','readonly')) !!}
               </div>

                   <hr class="py-3">

                   <div class="justify-content-center align-items-center h4 text-center">
                    Shipping Info
                   <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
                   </div>

                   @if ( \App\Shipping::where('user_id',auth()->id())->first() != null  )

                           <div class="col-md-12">
                             <span id="loader2"><i class="fa fa-spinner fa-3x fa-spin"></i></span>
                          <p><input id="getshippinginfo" name="getshippinginfo" type="checkbox"> Check if you want to use your Previous shipping info.</p>

                         </div>

                   @endif

                        <div class="form-group">
                            <strong>First Name:</strong>
                            {!! Form::text('ship_first_name', null, array('placeholder' => 'First Name','class' => 'form-control','id'=>'ship_first_name','required')) !!}
                        </div>

                        <div class="form-group">
                            <strong>Last Name:</strong>
                            {!! Form::text('ship_last_name', null, array('placeholder' => 'Last Name','class' => 'form-control','id'=>'ship_last_name','required')) !!}
                        </div>

                        <div class="form-group">
                            <strong>Email:</strong>
                            {!! Form::email('ship_email', null, array('placeholder' => 'email','class' => 'form-control','id'=>'ship_email','required')) !!}
                        </div>

                        <div class="form-group">
                            <strong>Phone Number:</strong>
                            {!! Form::text('ship_phone_number', null, array('placeholder' => 'eg. 07065114740','class' => 'form-control','id'=>'ship_phone_number','required')) !!}
                        </div>

                        <div class="form-group">
                            <strong>State:</strong>
                            {!! Form::text('ship_state', null, array('placeholder' => 'eg. Abuja','class' => 'form-control','id'=>'ship_state','required')) !!}
                        </div>

                        <div class="form-group">
                            <strong>Address:</strong>
                            {!! Form::textarea('ship_address', null, array('placeholder' => 'Address','class' => 'form-control','rows'=>4,'id'=>'ship_address','required')) !!}
                        </div>

                    <div class="form-group ">
                        <label class="control-label">Select Shipping Method</label>
                        <select id="ship_shipping_method" name="shipping_method" class="form-control" required >
                            <option value="">{{ __("Select Shipping Method") }}</option>
                            <option value="free pickup">{{ __("Free Shipping") }}</option>
                            <option value="pickup in store">{{ __("Pickup In Store") }}</option>

                      </select>
                    </div>


                <!-- save shipping Field -->
                <div class="form-group ">
                    <p><input id="save_shippinginfo" name="save_shippinginfo" type="checkbox"> Do you want to update you shipping Info?</p>

                </div>

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
            <button type="submit" class="btn btn-primary waves-effect waves-light">
                Submit
            </button>
            <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                Cancel
            </button>
        </div>
    </div>
        </div></div>
</div>
{!! Form::close() !!}


</div>
@endsection


@section('js')

 <script type="text/javascript">
	$(document).ready(function(){


        //billng information
        $('#getbillingInfo').click(function(){
            if($(this).prop("checked") == true){

                //disbale the field
                $('#bill_first_name').prop('disabled', 'disabled');
                $('#bill_last_name').prop('disabled', 'disabled');
                $('#bill_email').prop('disabled', 'disabled');
                $('#bill_phone_number').prop('disabled', 'disabled');
                $('#bill_address').prop('disabled', 'disabled');
                $('#bill_state').prop('disabled', 'disabled');
                // $('#save_billinginfo').prop('disabled', 'disabled');
                $('#save_billinginfo').parent().hide();






                 var user_id = {{Auth::user()->id}}
                 var url = '{{ route("admin.order.loadbilling", ":id") }}';

                url = url.replace(':id',user_id);

                 $.ajax({
                url:  url,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {


                  $("#bill_first_name").val(data["first_name"]);
                  $("#bill_last_name").val(data["last_name"]);
                  $("#bill_email").val(data["email"]);
                  $("#bill_phone_number").val(data["phone_number"]);
                  $("#bill_address").val(data["address"]);
                  $("#bill_state").val(data["state"]);

                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });

            }
            else if($(this).prop("checked") == false){
                $("#bill_first_name").val("");
                  $("#bill_last_name").val("");
                  $("#bill_email").val("");
                  $("#bill_phone_number").val("");
                  $("#bill_address").val("");
                  $("#bill_state").val("");

                  //enable the field
                  $('#bill_first_name').prop('disabled', false);
                $('#bill_last_name').prop('disabled', false);
                $('#bill_email').prop('disabled', false);
                $('#bill_phone_number').prop('disabled', false);
                $('#bill_address').prop('disabled', false);
                $('#bill_state').prop('disabled', false);
                // $('#save_billinginfo').prop('disabled', false);
                $('#save_billinginfo').parent().show();
            }
        });




        //shipping information
        $('#getshippinginfo').click(function(){
            if($(this).prop("checked") == true){

                //disbale the field
                $('#ship_first_name').prop('disabled', 'disabled');
                $('#ship_last_name').prop('disabled', 'disabled');
                $('#ship_email').prop('disabled', 'disabled');
                $('#ship_phone_number').prop('disabled', 'disabled');
                $('#ship_address').prop('disabled', 'disabled');
                $('#ship_state').prop('disabled', 'disabled');
                $('#ship_shipping_method').prop('disabled', 'disabled');
                // $('#save_shippinginfo').prop('disabled', 'disabled');
                $('#save_shippinginfo').parent().hide();





                 var user_id = {{Auth::user()->id}}
                 var url = '{{ route("admin.order.loadshipping", ":id") }}';

                url = url.replace(':id',user_id);

                 $.ajax({
                url:  url,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader2').css("visibility", "visible");
                },

                success:function(data) {


                  $("#ship_first_name").val(data["first_name"]);
                  $("#ship_last_name").val(data["last_name"]);
                  $("#ship_email").val(data["email"]);
                  $("#ship_phone_number").val(data["phone_number"]);
                  $("#ship_address").val(data["address"]);
                  $("#ship_state").val(data["state"]);
                  $("#ship_shipping_method").val(data["shipping_method"]);

                },
                complete: function(){
                    $('#loader2').css("visibility", "hidden");
                }
            });

            }
            else if($(this).prop("checked") == false){
                $("#ship_first_name").val("");
                  $("#ship_last_name").val("");
                  $("#ship_email").val("");
                  $("#ship_phone_number").val("");
                  $("#ship_address").val("");
                  $("#ship_state").val("");
                  $("#ship_shipping_method").val("");

                  //enable the field
                  $('#ship_first_name').prop('disabled', false);
                $('#ship_last_name').prop('disabled', false);
                $('#ship_email').prop('disabled', false);
                $('#ship_phone_number').prop('disabled', false);
                $('#ship_address').prop('disabled', false);
                $('#ship_state').prop('disabled', false);
                $('#ship_shipping_method').prop('disabled', false);
                // $('#save_shippinginfo').prop('disabled', false);
                $('#save_shippinginfo').parent().show();
            }
        });



    });
</script>
@endsection
