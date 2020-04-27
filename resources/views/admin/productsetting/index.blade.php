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

                        <h4 class="mt-0 header-title">{{$PageTitle}}</h4>

                    <table id="datatable-button" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>

                            <th>Cart Vat</th>
                            <th>Invoice Address</th>
                            <th width="280px">Others</th>
                            <th>Action</th>


                        </tr>
                        </thead>

                        <tbody>
                            @foreach($settings as $setting)
                            <tr>

                                <td>
                                    {{ \App\Setting::presentPrice($setting->cart_vat ?? '') }}
                                </td>
                                <td>
                                    {{ $setting->invoice_address ?? '' }}
                                </td>
                                <td>
                                  @if($setting->metadata != null)

                                  @foreach ($setting->metadata as $property)
                                  <b>{{ $property['key'] }}</b>: {{ $property['value'] }}<br />
                                   @endforeach

                              @endif
                                </td>

                                <td>
                                    <a class="btn btn-primary" href="{{ route('admin-set-prod-edit',$setting->id) }}">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->



</div> <!-- container-fluid -->
 @endsection
