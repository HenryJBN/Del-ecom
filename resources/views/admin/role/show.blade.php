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
                           Below are {{$PageTitle}} Privileges
                        </p>


                          <a  href="{{ route('roles.index') }}" class="fa-pull-right btn btn-primary waves-effect waves-light text-white" >All Role</a>

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card m-b-20">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title mb-3">{{$PageTitle}}</h4>
                                        @if(!empty($rolePermissions))
                                        <div class="inbox-wid">
                                            <a class="text-dark" href="#">
                                                @foreach($rolePermissions as $v)
                                                <div class="inbox-item">
                                                    <h6 class="inbox-item-author mt-0 mb-1">{{ $v->name }}</h6>
                                                    <p class="inbox-item-date text-muted">{{ $v->created_at }}</p>

                                                </div>
                                                @endforeach
                                            </a>

                                        </div>
                                        @endif
                                    </div>
                                </div>

                            </div>


                        </div>


                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->



</div> <!-- container-fluid -->
 @endsection

