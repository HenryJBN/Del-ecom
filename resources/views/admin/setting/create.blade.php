@extends('layouts.admin.main')



 @section('title')
{{$PageTitle}}
 @endsection

 @section('content')


 <div class="page-content-wrapper">

     <div class="row">
         <div class="col-12">
             <div class="card m-b-20">
                 <div class="card-body  ">

                    <form action="{{ route("admin-set-gen-store") }}" method="POST">
                        @csrf
                        <div class="form-group col-8">
                            <label for="site_title">Site Title</label>
                            <input type="text" name="site_title" class="form-control" required>
                        </div>
                        <div class="form-group col-8">
                            <label for="site_email">Site Email</label>
                            <input type="email" name="site_email" class="form-control" required>
                        </div>
                        <div class="form-group col-8">
                            <label for="site_mobile">Site Phone</label>
                            <input type="tel" name="site_mobile" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="metadata">Metadata</label>
                            <div class="row">
                                <div class="col-md-2">
                                    Key:
                                </div>
                                <div class="col-md-4">
                                    Value:
                                </div>
                            </div>
                            @for ($i=0; $i <= 4; $i++)
                            <div class="row">
                                <div class="col-md-2">
                                    <input type="text" name="metadata[{{ $i }}][key]" class="form-control" value="{{ old('metadata['.$i.'][key]') }}">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="metadata[{{ $i }}][value]" class="form-control" value="{{ old('metadata['.$i.'][value]') }}">
                                </div>
                            </div>
                            @endfor
                        </div>
                        <div>
                            <input class=" btn btn-danger" type="submit">
                        </div>
                    </form>



                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->



</div> <!-- container-fluid -->
@endsection

