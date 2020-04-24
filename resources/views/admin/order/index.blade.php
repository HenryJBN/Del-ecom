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
                           Click on the button below to export your data table
                        </p>


                        <p><a  class="btn btn-lg btn-success"  href="{{ route('admin.order.cart') }}"> Add to Cart
                            @if (Cart::instance('default')->count() > 0)
                            <span class="cart-count"><span class="badge badge-danger">{{ Cart::instance('default')->count() }}</span></span>
                            @endif
                            </a></p>

                    <a  href="{{ route('admin-order-create') }}" class="fa-pull-right btn btn-primary waves-effect waves-light text-white text-uppercase" >ADD NEW Order</a>


                        @include('admin.order.table')

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->



</div> <!-- container-fluid -->
 @endsection

 @section('js')


<script>

    var deletefunction = function(id){

               const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
                }).then((result) => {
                if (result.value) {



                    $.ajax({
                                type: "post",
                                url: "{{url('/admin/order/delete')}}",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "id": id
                                    },
                                    dataType: 'JSON',
                                success: function (data) {


                                    if (data.success) {

                                        swalWithBootstrapButtons.fire(
                                            'Deleted!',
                                            data.data,
                                            'success'
                                            )
                                            setInterval(() => {
                                                location.reload(true);//this will release the event
                                            }, 1000);

                                        } else {
                                        Swal.fire(
                                        'Cancelled',
                                        data.data,
                                        'error'
                                    )
                                    }

                                    }


                            });



                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'User Data is safe :)',
                    'error'
                    )
                }
                })
                        };
    </script>

 @endsection
