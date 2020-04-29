@extends('layouts.admin.main')



 @section('title')
{{$PageTitle}}
 @endsection

 @section('content')


 <div class="page-content-wrapper">

     <div class="row">
         <div class="col-12">
             <div class="card m-b-20">
                 <div class="card-body">
                        {!! Form::model($setting, ['method' => 'PATCH','route' => ['admin-set-prod-update', $setting['id']],'files'=>true]) !!}
                        @csrf

                            <div class="form-group col-8">
                                <label for="cart_vat">Cart Vat</label>

                                <input type="number" name="cart_vat" value="{{$setting->cart_vat}}" class="form-control" required>

                            </div>
                            <div class="form-group col-8">
                                <label for="invoice_address">Invoice Address</label>
                            <input type="email" name="invoice_address" value="{{$setting->invoice_address}}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="metadata">Metadata</label>
                                <div class="row">
                                    <div class="col-md-2">
                                        Key:
                                    </div>
                                    <div class="col-md-4">
                                        Value:
                                    </div>
                                </div>
                                @for ($i=0; $i <= 6; $i++)
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <input type="text" name="metadata[{{ $i }}][key]" class="form-control"
                                                    value="{{ $setting->metadata[$i]['key'] ?? '' }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="metadata[{{ $i }}][value]" class="form-control"
                                                    value="{{ $setting->metadata[$i]['value'] ?? '' }}">
                                                </div>
                                        </div>
                                @endfor
                           </div>


                           <div class="col-xs-8 col-sm-8 col-md-8 text-center">
                            <button type="submit" class="btn btn-primary">{{ __('Update Setting') }}</button>
                        </div>

                           {!! Form::close() !!}

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!-- container-fluid -->
@endsection

