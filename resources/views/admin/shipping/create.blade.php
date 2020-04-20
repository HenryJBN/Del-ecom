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

                                    {!! Form::open(array('route' => 'admin-ship-store','method'=>'POST', 'files' => true)) !!}
                                    @csrf
                                    <div class="row h-100 justify-content-center align-items-center">
                                        <div class="col-xs-8 col-sm-8 col-md-8">
                                            <div class="form-group">
                                                <strong>First Name:</strong>
                                                {!! Form::text('first_name', null, array('placeholder' => 'First Name','class' => 'form-control','required')) !!}
                                            </div>
                                        </div>
                                    <div class="row h-100 justify-content-center align-items-center">
                                        <div class="col-xs-8 col-sm-8 col-md-8">
                                            <div class="form-group">
                                                <strong>Last Name:</strong>
                                                {!! Form::text('last_name', null, array('placeholder' => 'Last Name','class' => 'form-control','required')) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-8 col-sm-8 col-md-8">
                                            <div class="form-group">
                                                <strong>Email:</strong>
                                                {!! Form::email('email', null, array('placeholder' => 'email','class' => 'form-control','required')) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-8 col-sm-8 col-md-8">
                                            <div class="form-group">
                                                <strong>Phone Number:</strong>
                                                {!! Form::text('phone_number', null, array('placeholder' => 'eg. 07065114740','class' => 'form-control','required')) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-8 col-sm-8 col-md-8">
                                            <div class="form-group">
                                                <strong>State:</strong>
                                                {!! Form::text('state', null, array('placeholder' => 'eg. Abuja','class' => 'form-control','required')) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-8 col-sm-8 col-md-8">
                                            <div class="form-group">
                                                <strong>Address:</strong>
                                                {!! Form::textarea('address', null, array('placeholder' => 'Address','class' => 'form-control','rows'=>4,'required')) !!}
                                            </div>
                                        </div>

                                       <div  class="col-xs-8 col-sm-8 col-md-8">
                                        <div class="form-group ">
                                            <label class="control-label">Select Shipping Method</label>
                                            <select id="shipping_method" name="shipping_method" class="form-control" required >
                                                <option value="">{{ __("Select Shipping Method") }}</option>
                                                <option value="free pickup">{{ __("Free Shipping") }}</option>
                                                <option value="pickup in store">{{ __("Pickup In Store") }}</option>

                                          </select>
                                        </div>

                                       </div>

                                        <div class="col-xs-8 col-sm-8 col-md-8 text-center">
                                            <button type="submit" class="btn btn-primary">{{ __('Create Shipping') }}</button>
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


