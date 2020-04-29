@extends('layouts.admin.main')

@section('title')

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

{!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user['id']]]) !!}


<div class="row">
    <div class="col-lg-6">
        <div class="card m-b-20">
            <div class="card-body">

                <h4 class="mt-2 py-4 header-title">Login Information</h4>


                    <div class="form-group">
                        <label>Full Name</label>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','required')) !!}
                    </div>

                    <div class="form-group ">
                        <label class="control-label">Single Select</label>
                        <strong>Role:</strong>
                        {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','')) !!}
                    </div>

                    <div style="margin-bottom:100px">

                    </div>






            </div>
        </div>
    </div> <!-- end col -->

    <div class="col-lg-6">
        <div class="card m-b-20">
            <div class="card-body">

                <h4 class="mt-2 py-4 header-title">Login Information</h4>

                    <div class="form-group">
                        <label>E-Mail</label>
                        <div>
                            {!! Form::text('email', null, array('placeholder' => 'Enter a valid e-mail','class' => 'form-control','parsley-type'=>'email','required')) !!}
                            {{-- <input type="email" class="form-control" required
                                    parsley-type="email" placeholder="Enter a valid e-mail"/> --}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <div>
                            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}

                        </div>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>

                        <div>
                            {!! Form::password('confirm-password', array('placeholder' => 'Re-Type Password','class' => 'form-control')) !!}

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
            <a href="{{ route('users') }}" class="btn btn-secondary waves-effect m-l-5 text-white">
                Cancel
            </a>
        </div>
    </div>
        </div></div>
</div>
{!! Form::close() !!}


</div>
@endsection
