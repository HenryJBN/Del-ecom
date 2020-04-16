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


                          <a  href="{{ route('roles.create') }}" class="fa-pull-right btn btn-primary waves-effect waves-light text-white" >Create New Role</a>

                        @include('admin.role.table')

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->



</div> <!-- container-fluid -->
 @endsection

 