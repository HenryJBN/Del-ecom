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




                          <div class="card">

                            {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Permission:</strong>
                                        <br/>
                                        @foreach($permission as $value)
                                            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                            {{ $value->name }}</label>
                                        <br/>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ route('roles.index') }}" class="btn btn-secondary waves-effect m-l-5 text-white">
                                        Cancel
                                    </a>
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
