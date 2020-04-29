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

                            <th>Site Name</th>
                            <th>Site Email</th>
                            <th>Site Phone Number</th>
                            <th width="280px">Others</th>
                            <th>Action</th>


                        </tr>
                        </thead>

                        <tbody>
                            @foreach($settings as $setting)
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
                            @endforeach
                        </tbody>
                    </table>


                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->


        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body">


                  

                    </div>
                </div>
            </div> <!-- end col -->
        </div>

</div> <!-- container-fluid -->
 @endsection
