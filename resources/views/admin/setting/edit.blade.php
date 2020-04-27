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
                        {!! Form::model($setting, ['method' => 'PATCH','route' => ['admin-set-gen-update', $setting['id']],'files'=>true]) !!}
                        @csrf

                            <div class="form-group col-8">
                                <label for="site_title">Site Title</label>

                                <input type="text" name="site_title" value="{{$setting->site_title}}" class="form-control" required>

                            </div>
                            <div class="form-group col-8">
                                <label for="site_email">Site Email</label>
                            <input type="email" name="site_email" value="{{$setting->site_email}}" class="form-control" required>
                            </div>
                            <div class="form-group col-8">
                                <label for="site_mobile">Site Phone</label>
                                <input type="tel" name="site_mobile" value="{{$setting->site_mobile}}" class="form-control" required>
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
                                @for ($i=0; $i <= \App\Setting::metadataLength; $i++)
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <input type="text" name="metadata[{{ $i }}][key]" class="form-control"
                                                    value="{{ $setting->metadata[$i]['key'] ?? '' }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="metadata[{{ $i }}][value]" class="form-control"
                                                    value="{{ $setting->metadata[$i]['value'] ?? '' }}">
                                                </div>
                                        </div>
                                @endfor
                           </div>


                           <div class="col-xs-8 col-sm-8 col-md-8 text-center">
                            <button type="submit" class="btn btn-primary">{{ __('Update Setting') }}</button>
                        </div>

                           {!! Form::close() !!}

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!-- container-fluid -->
@endsection

