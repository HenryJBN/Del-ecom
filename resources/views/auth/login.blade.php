@extends('layouts.admin.auth')

@section('title')
Login
@endsection

@section('content')


<div class="card">
    <div class="card-body">

        <h3 class="text-center m-0">
            <a href="/" class="logo logo-admin"><img src="{{\App\Setting::logo('site_logo','small')}}"  alt="logo"></a>
        </h3>

        <div class="p-3">
            <h4 class="text-muted font-18 m-b-5 text-center">{{ __('Login') }}</h4>
            <p class="text-muted text-center">Sign in to continue to {{__('Del-York')}}.</p>

            <form class="form-horizontal m-t-30" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>


                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row m-t-20">
                    <div class="col-6">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input"   name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="remember"> {{ __('Remember Me') }}</label>
                        </div>

                    </div>
                    <div class="col-6 text-right">
                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">   {{ __('Login') }}</button>
                    </div>
                </div>

                <div class="form-group m-t-10 mb-0 row">
                    <div class="col-12 m-t-20">
                        @if (Route::has('password.request'))

                        <a href="{{ route('password.request') }}" class="text-muted"><i class="mdi mdi-lock"></i>  {{ __('Forgot Your Password?') }}</a>
                    @endif


                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

<div class="m-t-40 text-center">
    @if (Route::has('register'))

        <p class="text-white-50">Don't have an account ? <a href="{{ route('register') }}" class="text-white">{{ __('Register') }}</a> </p>
          @endif

    <p class="text-muted">© 2020 Del-York. Crafted with <i class="mdi mdi-heart text-danger"></i> by Donsoft</p>
</div>

@endsection
