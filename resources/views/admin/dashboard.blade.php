@extends('layouts.admin.main')

@section('title')
Dashboard
@endsection

@section('content')

<div class="page-content-wrapper">


<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary mini-stat position-relative">
            <div class="card-body">
                <div class="mini-stat-desc">
                    <h6 class="text-uppercase verti-label text-white-50">Orders</h6>
                    <div class="text-white">
                        <h6 class="text-uppercase mt-0 text-white-50"> Total Orders</h6>
                    <h3 class="mb-3 mt-0">{{$totalOrder}}</h3>
                        <div class="">
                            <span class="badge badge-light text-info"> +{{$totalNewAddedOrder}} </span> <span class="ml-2">From previous 7 days period</span>
                        </div>
                    </div>
                    <div class="mini-stat-icon">
                        <i class="mdi mdi-cube-outline display-2"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary mini-stat position-relative">
            <div class="card-body">
                <div class="mini-stat-desc">
                    <h6 class="text-uppercase verti-label text-white-50">Revenue</h6>
                    <div class="text-white">
                        <h6 class="text-uppercase mt-0 text-white-50">Revenue</h6>
                        <h3 class="mb-3 mt-0">$0</h3>
                        <div class="">
                            <span class="badge badge-light text-danger"> 0% </span> <span class="ml-2">From previous period</span>
                        </div>
                    </div>
                    <div class="mini-stat-icon">
                        <i class="mdi mdi-buffer display-2"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary mini-stat position-relative">
            <div class="card-body">
                <div class="mini-stat-desc">
                    <h6 class="text-uppercase verti-label text-white-50">Av. Price</h6>
                    <div class="text-white">
                        <h6 class="text-uppercase mt-0 text-white-50">Average Price</h6>
                        <h3 class="mb-3 mt-0">0</h3>
                        <div class="">
                            <span class="badge badge-light text-primary"> 0% </span> <span class="ml-2">From previous period</span>
                        </div>
                    </div>
                    <div class="mini-stat-icon">
                        <i class="mdi mdi-tag-text-outline display-2"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary mini-stat position-relative">
            <div class="card-body">
                <div class="mini-stat-desc">
                    <h6 class="text-uppercase verti-label text-white-50">Pr. Sold</h6>
                    <div class="text-white">
                        <h6 class="text-uppercase mt-0 text-white-50">Product Sold</h6>
                        <h3 class="mb-3 mt-0">0</h3>
                        <div class="">
                            <span class="badge badge-light text-info"> +0% </span> <span class="ml-2">From previous period</span>
                        </div>
                    </div>
                    <div class="mini-stat-icon">
                        <i class="mdi mdi-briefcase-check display-2"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->


{{-- <div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary mini-stat position-relative">
            <div class="card-body">
                <div class="mini-stat-desc">
                    <h6 class="text-uppercase verti-label text-white-50">Orders</h6>
                    <div class="text-white">
                        <h6 class="text-uppercase mt-0 text-white-50">New Orders</h6>
                    <h3 class="mb-3 mt-0">{{$totalOrder}}</h3>
                        <div class="">
                            <span class="badge badge-light text-info"> +{{$totalNewAddedOrder}} </span> <span class="ml-2">From previous 7 days period</span>
                        </div>
                    </div>
                    <div class="mini-stat-icon">
                        <i class="mdi mdi-cube-outline display-2"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary mini-stat position-relative">
            <div class="card-body">
                <div class="mini-stat-desc">
                    <h6 class="text-uppercase verti-label text-white-50">Orders</h6>
                    <div class="text-white">
                        <h6 class="text-uppercase mt-0 text-white-50">Shipped Orders</h6>
                        <h3 class="mb-3 mt-0">$46,785</h3>
                        <div class="">
                            <span class="badge badge-light text-danger"> -29% </span> <span class="ml-2">From previous period</span>
                        </div>
                    </div>
                    <div class="mini-stat-icon">
                        <i class="mdi mdi-buffer display-2"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary mini-stat position-relative">
            <div class="card-body">
                <div class="mini-stat-desc">
                    <h6 class="text-uppercase verti-label text-white-50">Orders</h6>
                    <div class="text-white">
                        <h6 class="text-uppercase mt-0 text-white-50">Cancelled Orders</h6>
                        <h3 class="mb-3 mt-0">15.9</h3>
                        <div class="">
                            <span class="badge badge-light text-primary"> 0% </span> <span class="ml-2">From previous period</span>
                        </div>
                    </div>
                    <div class="mini-stat-icon">
                        <i class="mdi mdi-tag-text-outline display-2"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary mini-stat position-relative">
            <div class="card-body">
                <div class="mini-stat-desc">
                    <h6 class="text-uppercase verti-label text-white-50">Orders</h6>
                    <div class="text-white">
                        <h6 class="text-uppercase mt-0 text-white-50">Delivered Orders</h6>
                        <h3 class="mb-3 mt-0">1890</h3>
                        <div class="">
                            <span class="badge badge-light text-info"> +89% </span> <span class="ml-2">From previous period</span>
                        </div>
                    </div>
                    <div class="mini-stat-icon">
                        <i class="mdi mdi-briefcase-check display-2"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- end row -->



<div class="row">
    <div class="col-xl-4">
        <div class="card m-b-20">
            <div class="card-body">
                <h4 class="mt-0 header-title mb-3">Recent Order(s)</h4>
                <hr>
                <div class="inbox-wid">
                    <a href="#" class="text-dark">
                        @foreach ($recent_orders as $item)
                        <div class="inbox-item">
                            <div class="inbox-item-img float-left mr-3"><img src="" class="thumb-md rounded-circle" alt=""></div>

                             <h6 class="inbox-item-author mt-0 mb-3">{{$item->order_code}}</h6>
                             <p class="inbox-item-text text-muted mb-0">
                            <span class="fa fa-cart-plus fa" > Status </span>
                                @if ($item->status == "new")
                                <span class="badge badge-success">
                                  {{ $item->status}}
                                </span>
                               @elseif($item->status =="cancelled")
                               <span class="badge badge-danger">
                                   {{ $item->status}}
                                 </span>
                               @elseif($item->status =="shipped")
                               <span class="badge badge-info">
                                   {{ $item->status}}
                                 </span>
                               @elseif($item->status =="delivered")
                               <span class="badge badge-primary">
                                   {{ $item->status}}
                                 </span>
                               @elseif($item->status =="returned")
                               <span class="badge badge-dark">
                                   {{ $item->status}}
                                 </span>
                               @endif
                                </p>

                                  <p class="inbox-item-date text-muted">{{$item->created_at->format('j F, Y h:m:i a')}}</p>
                        </div>
                        @endforeach

                    </a>
                </div>
            </div>
        </div>

    </div>
    <div class="col-xl-4">
        <div class="card m-b-20">
            <div class="card-body">
                <h4 class="mt-0 header-title mb-3">Recent Product(s)</h4>
                <hr>
                <div class="inbox-wid">
                    <a href="#" class="text-dark">
                        <div class="inbox-item">
                            @foreach ($recent_products as $item)
                            <div class="inbox-item">
                                <div class="inbox-item-img float-left mr-3"><img src="{{$item->getFirstMediaUrl('featured_product')}}" class="thumb-md rounded-circle" alt=""></div>
                                <h6 class="inbox-item-author mt-0 mb-1">{{$item->name}}</h6>
                                <p class="inbox-item-text text-muted mb-0"> <span class="fa fa-money-bill"> Price </span>:{{ \App\Setting::presentPrice($item->price)}}  <span class="mdi mdi-weight"> Quantity </span>: {{$item->quantity}} </p>
                                <p class="inbox-item-date text-muted">{{$item->created_at->format('j F, Y h:m:i a')}}</p>
                            </div>
                            @endforeach
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card m-b-20">
            <div class="card-body">
                <h4 class="mt-0 header-title mb-3">Recent User(s)</h4>
                <hr>
                <div class="inbox-wid">
                    <a href="#" class="text-dark">
                        <div class="inbox-item">
                            @foreach ($recent_users as $item)
                            <div class="inbox-item">
                                <div class="inbox-item-img float-left mr-3"><img src="{{ \App\User::profileImage('profile_logo','square',$item->id)}}" class="thumb-md rounded-circle" alt=""></div>
                                <h6 class="inbox-item-author mt-0 mb-1">{{$item->name}}</h6>
                                <p class="inbox-item-text text-muted mb-0"> <span class="ion ion-email"> Email </span>: {{$item->email }}  </p>
                                <p class="inbox-item-date text-muted">{{$item->created_at->format('j F, Y h:m:i a')}}</p>
                            </div>
                            @endforeach
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- end row -->


</div>
@endSection

@section('js')
<script>


</script>
@endsection
