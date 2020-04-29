@extends('layouts.admin.main')



 @section('title')
{{$PageTitle}}
 @endsection
 @section('css')
 <style>
     #loader{
     visibility:hidden;
     }

     </style>
 @endsection

 @section('content')


    <div class="page-content-wrapper">

        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body">








                    <div class="card-heading ">
                        <h4 class="mt-0 header-title">{{$PageTitle}}</h4>
                        <!-- Track Field -->

                            <div class="row py-4 md-4 ">
                           <div class="col-md-6">
                            {!! Form::text('track', null, ['placeholder'=>'Enter Order Code','class' => 'form-control input-lg', 'id'=>'track']) !!}
                           {{-- <input type="number " placeholder="Enter Order Code" id="track" name="track" class="form-control input-lg"> --}}
 <span id="loader"><i class="fa fa-spinner fa-3x fa-spin"></i></span>
                        </div>
                           <div class="col-md-6  md-10">
                        {!! Form::submit('Tracking', [ 'class'=>'btn btn-info input-lg']) !!}


                    </div>
                            </div>


                        </div>



                    <div class="table-responsive">


         <table class="table table-striped m-b-none" data-ride="datatables" id="table">
                            <thead>
                                <tr>
                                    <th width="">Order Code</th>
                                    <th width="">Status</th>

                                    <th width="">Ordered By</th>
                                    <th width="">Total</th>
                                    <th width="150px">Buttons</th>
                                </tr>
                            </thead>

                            <tbody>

                                    <tr id="tr">
                                        <td id="order_code"></td>
                                        <td id="status"></td>
                                        <td id="user"></td>
                                        <td id="total"></td>
                                        <td id="link">

                                            {{-- <a href="{{ route('user.show',$order->id) }}" class="btn btn-sm btn-icon btn-success"><i class="fa fa-eye"></i></a> --}}
                                        </td>
                                    </tr>

                            </tbody>
                        </table>

                    </div>


                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->



</div> <!-- container-fluid -->
 @endsection

 @section('js')


<script>
$(document).ready(function(){
        $('input[type="submit"]').click(function(){


                 var order_code = document.getElementById("track").value;
                 var url = '{{ route("admin-track-tracking", ":order_code") }}';

                    url = url.replace(':order_code',order_code);

                 $.ajax({
                url:  url,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                     $('#loader').css("visibility", "visible");


                },

                success:function(data) {


                    $("#order_code").html('<td> '+(data["order_code"]) +'</td>');
                 $("#status").html('<td> '+(data["status"]) +'</td>');
                 $("#user").html('<td> ' +( data["user_id"]) +'</td>');
                 $("#total").html('<td> ₦'+(data["total"]) +'</td>');
                 $("#link").html('<td> <a href="'+(data["show"])+'" class="btn btn-sm btn-icon btn-success"><i class="fa fa-eye"></i></a><a href="'+(data["print"])+'" class="btn btn-sm btn-icon btn-info"><i class="fa fa-print"></i></a></td>');




                },
                error: function (request, status, error) {


                    if(request.status == 404){
                   Swal.fire(
                        'Tracking Info!',
                        'Please Enter the Tracking Code'
                       ,
                        'warning'
                        )
                        setInterval(() => {
                            location.reload(true);//this will release the event
                        }, 1000);
                    }else{
                        Swal.fire(
                                'Tracking Info!',
                                ' Tracking Code Not Found',
                                'warning'
                                )
                                setInterval(() => {
                                    location.reload(true);//this will release the event
                                }, 1000);

                    }

                    //  alert(error);
                   // alert(request.status);
                   },
                complete: function(){
                     $('#loader').css("visibility", "hidden");

                }
            });


        });
    });
    </script>

 @endsection
