@extends('layouts.admin.auth')

@section('content')


<div class="card">
    <div class="card-body">

        <h3 class="text-center m-0">
            <a href="index.html" class="logo logo-admin"><img src="assets/images/logo.png" height="30" alt="logo"></a>
        </h3>

        <div class="p-3">
            <h4 class="text-muted font-18 m-b-5 text-center">{{ __('Register') }}</h4>
            <p class="text-muted text-center">{{__('Get your free  account now.')}}</p>

            
            <form class="form-horizontal m-t-30" method="POST" action="{{ route('register') }}">
                    @csrf
                <div class="form-group">
                    <label for="name" >{{ __('Name') }}</label>
                   
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                   
                </div>

                <div class="form-group">
                    <label for="email" >{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                         
                </div>

                <div class="form-group">
                 
                    <label for="password" >{{ __('Password') }}</label>

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                   
                </div>

                <div class="form-group">
                 
                    <label for="password-confirm" >{{ __('Confirm Password') }}</label>

                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    
                </div>

                <div class="form-group row m-t-20">
                    <div class="col-12 text-right">
                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">{{ __('Register') }}</button>
                    </div>
                </div>

                <div class="form-group m-t-10 mb-0 row">
                    <div class="col-12 m-t-20">
                        <p class="font-14 text-muted mb-0">By registering you agree to the Del-York <a href="#" class="text-primary">Terms of Use</a></p>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

<div class="m-t-40 text-center">
    <p class="text-muted">Already have an account ? <a href="{{ route('login') }}" class="text-white"> Login </a> </p>
    <p class="text-muted">© 2018 Del-York. Crafted with <i class="mdi mdi-heart text-danger"></i> by Donsoft</p>
</div>

@endsection
