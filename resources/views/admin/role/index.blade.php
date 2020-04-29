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

                       <h4 class="mt-2 header-title">{{$PageTitle}}</h4>

                       <div class="row col-md-12 py-4 mt-2">
                        <a  href="{{ route('roles.create') }}" class=" header-title mt-2 fa-pull-right btn btn-primary waves-effect waves-light text-white m-t-10" >Create New Role</a>

                       </div>
                        {{-- <a  href="{{ route('roles.create') }}" class=" header-title mt-2 fa-pull-right btn btn-primary waves-effect waves-light text-white m-t-10" >Create New Role</a> --}}


                        @include('admin.role.table')

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->



</div> <!-- container-fluid -->
 @endsection

