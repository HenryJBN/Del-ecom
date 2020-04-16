@extends('layouts.admin.auth')
@section('title')
Error 404
@endsection

@section('content')
  <!-- Background -->
        <div class="account-pages"></div>

        <!-- Begin page -->
        <div class="wrapper-page">
            <div class="card">
                <div class="card-block">

                    <div class="ex-page-content text-center">
                        <h1 class="text-dark">
                            <span class="text-danger">4</span><span class="text-success">0</span><span class="text-info">3</span>
                        </h1>
                        <h4 class="">Unauthorized action.</h4><br>

                        <a class="btn btn-info mb-5 waves-effect waves-light" href="/"><i class="mdi mdi-home"></i> Back to Dashboard</a>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center">
                <p class="text-muted">© 2020. Crafted with <i class="mdi mdi-heart text-danger"></i> by Donsoft</p>
            </div>

        </div>
@endsection
