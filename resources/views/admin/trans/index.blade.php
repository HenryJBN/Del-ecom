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
                    <p class="text-muted m-b-30">
                       Click on the button below to export your data table
                    </p>



                    @include('admin.trans.table')

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->



</div> <!-- container-fluid -->
 @endsection
