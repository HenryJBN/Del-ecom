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
                        {{-- @if ($message = Session::get('success'))


                        <div class="alert alert-success">
                          <p>{{ $message }}</p>
                        </div>
                        @endif --}}

                        <h4 class="mt-0 header-title">{{$PageTitle}}</h4>
                        <p class="text-muted m-b-30">
                           Click on the button below to export your data table
                        </p>


                    <a  href="{{ route('users.create') }}" class="fa-pull-right btn btn-primary waves-effect waves-light text-white text-uppercase" >ADD NEW User</a>


                        @include('admin.user.table')

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->



</div> <!-- container-fluid -->
 @endsection

 @section('js')


<script>

    var deletefunction = function(id){


        // Swal.fire({
        //         title: "Are you sure you want to Delete this?",
        //         type: "warning",
        //         showCancelButton: true,
        //         confirmButtonColor: "#DD6B55",
        //         confirmButtonText: "Yes",
        //         closeOnConfirm: false,
        //         preConfirm: function(result) {
        //             // window.location.href = '{{url('admin/users/delete/')}}/'+id;
        //             $.ajax({
        //         type: "post",
        //         url: "{{url('/admin/users/delete')}}",
        //         data: {
        //             "_token": "{{ csrf_token() }}",
        //             "id": id
        //             },
        //         success: function (data) {

        //             if (data =="success") {

        //                 const Toast = Swal.mixin({
        //                     toast: true,
        //                     position: 'top-end',
        //                     showConfirmButton: false,
        //                     timer: 3000,
        //                     timerProgressBar: true,
        //                     onOpen: (toast) => {
        //                         toast.addEventListener('mouseenter', Swal.stopTimer)
        //                         toast.addEventListener('mouseleave', Swal.resumeTimer)
        //                     }
        //                     })

        //                     Toast.fire({
        //                     icon: 'success',
        //                     title: 'User Data has been deleted'
        //                     })
        //                     setInterval(() => {
        //                         location.reload(true);//this will release the event
        //                     }, 3000);
        //             //     Swal.fire(
        //             // 'Deleted!',
        //             // 'User Data has been deleted.',
        //             // 'success'
        //             // )
        //             // location.reload(true);//this will release the event

        //             } else {
        //                 Swal.fire(
        //                 'Cancelled',
        //                 'User Data is safe oooh :)',
        //                 'error'
        //             )
        //             }

        //             }


        //     });
        //         },
        //         allowOutsideClick: false
        //     }).then(function () {
        //         Swal.fire(
        //                 'Cancelled',
        //                 'User Data  is safe :)',
        //                 'error'
        //             )
        //     });


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
                                url: "{{url('/admin/users/delete')}}",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "id": id
                                    },
                                success: function (data) {

                                    if (data =="success") {

                                        swalWithBootstrapButtons.fire(
                                            'Deleted!',
                                            'User Data has been deleted.',
                                            'success'
                                            )
                                            setInterval(() => {
                                                location.reload(true);//this will release the event
                                            }, 3000);

                                        } else {
                                        Swal.fire(
                                        'Cancelled',
                                        'User Data is safe oooh :)',
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
