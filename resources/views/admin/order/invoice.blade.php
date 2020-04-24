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

                    <div class="row">
                        <div class="col-12">
                            <div class="invoice-title">
                            <h4 class="float-right font-16"><strong>Order # {{$order->order_code}}</strong></h4>
                                <h3 class="mt-0">
                                    <img src="{{asset('assets/images/logo.png')}}" alt="logo" height="24"/>
                                </h3>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <address>
                                        <strong>Billed To:</strong><br>
                                        {{$billing->get('first_name').' '. $billing->get('last_name')}}<br>
                                    {{ $billing->get('phone_number')}}<br>
                                        {{$billing->get('email')}}<br>
                                        {{ $billing->get('address') .', '. $billing->get('state')}}
                                    </address>
                                </div>
                                <div class="col-6 text-right">
                                    <address>
                                        <strong>Shipped To:</strong><br>
                                        {{$shipping->get('first_name').' '. $shipping->get('last_name')}}<br>
                                    {{ $shipping->get('phone_number')}}<br>
                                        {{$shipping->get('email')}}<br>
                                        {{ $shipping->get('address') .', '. $shipping->get('state')}}
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 m-t-30">
                                    <address>
                                        <strong>Payment Method:</strong><br>
                                        Visa ending **** 4242<br>
                                        jsmith@email.com
                                    </address>
                                </div>
                                <div class="col-6 m-t-30 text-right">
                                    <address>
                                        <strong>Order Date:</strong><br>
                                      {{ $order->created_at->format('j F, Y')}}<br><br>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div>
                                <div class="p-2">
                                    <h3 class="font-16"><strong>Order summary</strong></h3>
                                </div>
                                <div class="">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <td><strong>Item</strong></td>
                                                <td class="text-center"><strong>Price</strong></td>
                                                <td class="text-center"><strong>Quantity</strong>
                                                </td>
                                                <td class="text-right"><strong>Totals</strong></td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($orderProduct as $item)
                                                    <tr>
                                                        <td>{{ $item->name}}</td>
                                                        <td class="text-center">{{ \App\Order::presentPrice($item->price)}}</td>
                                                        <td class="text-center">{{ $item->qty}}</td>
                                                        <td class="text-right">{{  \App\Order::presentPrice($item->qty * $item->price)}}</td>
                                                    </tr>
                                             @endforeach

                                             <tr>
                                                <td class="thick-line"></td>
                                                <td class="thick-line"></td>
                                                <td class="thick-line text-center">
                                                    <strong>Subtotal</strong></td>
                                                <td class="thick-line text-right">{{\App\Order::presentPrice($order->subtotal)}}</td>
                                            </tr>
                                            <tr>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line text-center">
                                                    <strong>VAT Included in Total</strong></td>
                                                <td class="no-line text-right">{{ \App\Order::presentPrice($order->total - $order->subtotal)  }}</td>
                                            </tr>
                                            <tr>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line text-center">
                                                    <strong>Total</strong></td>
                                                <td class="no-line text-right"><h4 class="m-0">{{ \App\Order::presentPrice($order->total)  }}</h4></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="d-print-none">
                                        <div class="float-right">
                                            <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                            <a href="#" class="btn btn-primary waves-effect waves-light">Send</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div> <!-- end row -->

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div>
<!-- end page content-->

@endsection
