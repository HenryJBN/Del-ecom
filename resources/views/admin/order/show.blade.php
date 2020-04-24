@extends('layouts.admin.main')

@section('title')
{{$PageTitle}}
@endsection

@section('css')
<style type="text/css">
    .order-table-wrap table#example2 {
    margin: 10px 20px;
}
th{
   font-size: 16px;
   font-weight: bold;
}
td{
    font-weight: bold;
}

</style>

@endsection

@section('content')
<div class="page-content-wrapper">
<div class=" row col-md-12">
    <div class="card m-b-30 card-body">

        <h4 class="title py-3 md-3 text-center">
            {{ __('Order Details') }}
            </h4>

        <div class="table-responsive-sm">
            <table class="table">
                <tbody>
                <tr>
                    <th class="45%" width="45%">{{ __('Order ID') }}</th>
                    <td width="10%">:</td>
                    <td class="45%" width="45%">{{$order->order_code}}</td>
                </tr>
                <tr>
                    <th width="45%">{{ __('Total Product') }}</th>
                    <td width="10%">:</td>
                    <td width="45%">{{ \App\Order::presentPrice($order->total)}}</td>
                </tr>

                <tr>
                    <th width="45%">{{ __('Total Cost') }}</th>
                    <td width="10%">:</td>
                    <td width="45%">{{\App\Order::presentPrice($order->total) }}</td>
                </tr>
                <tr>
                    <th width="45%">{{ __('Ordered Date') }}</th>
                    <td width="10%">:</td>
                    <td width="45%">{{date('d-M-Y H:i:s a',strtotime($order->created_at))}}</td>
                </tr>
                <tr>
                    <th width="45%">{{ __('Payment Method') }}</th>
                    <td width="10%">:</td>
                    <td width="45%">{{$order->method}}</td>
                </tr>

                @if($order->method != "Cash On Delivery")
                @if($order->method=="Stripe")
                <tr>
                    <th width="45%">{{$order->method}} {{ __('Charge ID') }}</th>
                    <td width="10%">:</td>
                    <td width="45%">{{$order->charge_id}}</td>
                </tr>
                @endif
                <tr>
                    <th width="45%">{{$order->method}} {{ __('Transaction ID') }}</th>
                    <td width="10%">:</td>
                    <td width="45%">{{$order->txnid}}</td>
                </tr>
                @endif

                <tr>
                    <th width="45%">{{ __('Payment Status') }}</th>
                    <th width="10%">:</th>
                    <td width="45%">{!! $order->payment_status == 'Pending' ? "<span class='badge badge-danger'>Unpaid</span>":"<span class='badge badge-success'>Paid</span>" !!}</td>
                </tr>
                @if(!empty($order->order_note))
                <tr>
                    <th width="45%">{{ __('Order Note') }}</th>
                    <th width="10%">:</th>
                    <td width="45%">{{$order->order_note}}</td>
                </tr>
                @endif

                </tbody>
            </table>
        </div>



    </div>
</div>


<div class=" row col-md-12">
<div class="col-md-6">
    <div class="card m-b-30 card-body">
        <h4 class="title py-3 md-3 text-center">
            {{ __('Shipping Details') }}
            </h4>


            <div class="table-responsive-sm">
                <table class="table">
                    <tbody>
                            <tr>
                                <th width="45%">{{ __('Name') }}</th>
                                <th width="10%">:</th>
                                <td width="45%">{{$shipping->get('first_name').' '. $shipping->get('last_name')  }}</td>
                            </tr>
                            <tr>
                                <th width="45%">{{ __('Email') }}</th>
                                <th width="10%">:</th>
                                <td width="45%">{{$shipping->get('email')}}</td>
                            </tr>
                            <tr>
                                <th width="45%">{{ __('Phone') }}</th>
                                <th width="10%">:</th>
                                <td width="45%">{{$shipping->get('phone_number')}}</td>
                            </tr>
                            <tr>
                                <th width="45%">{{ __('Address') }}</th>
                                <th width="10%">:</th>
                                <td width="45%">{{$shipping->get('address')}}</td>
                            </tr>

                            <tr>
                                <th width="45%">{{ __('State') }}</th>
                                <th width="10%">:</th>
                                <td width="45%">{{$shipping->get('state')}}</td>
                            </tr>
                            <tr>
                                <th width="45%">{{ __('Shipping Method') }}</th>
                                <th width="10%">:</th>
                                <td width="45%">{{$shipping->get('shipping_method')}}</td>
                            </tr>


                              </tbody>
                </table>
            </div>




    </div>
</div>



<div class="col-md-6">
    <div class="card m-b-30 card-body">

        <h4 class="title py-3 md-3 text-center">
            {{ __('Billing Details') }}
            </h4>



            <div class="table-responsive-sm">
                <table class="table">
                    <tbody>   <tr>
                        <th width="45%">{{ __('Name') }}</th>
                        <th width="10%">:</th>
                        <td width="45%">{{$billing->get('first_name').' '. $shipping->get('last_name')  }}</td>
                    </tr>
                    <tr>
                        <th width="45%">{{ __('Email') }}</th>
                        <th width="10%">:</th>
                        <td width="45%">{{$billing->get('email')}}</td>
                    </tr>
                    <tr>
                        <th width="45%">{{ __('Phone') }}</th>
                        <th width="10%">:</th>
                        <td width="45%">{{$billing->get('phone_number')}}</td>
                    </tr>
                    <tr>
                        <th width="45%">{{ __('Address') }}</th>
                        <th width="10%">:</th>
                        <td width="45%">{{$billing->get('address')}}</td>
                    </tr>

                    <tr>
                        <th width="45%">{{ __('State') }}</th>
                        <th width="10%">:</th>
                        <td width="45%">{{$billing->get('state')}}</td>
                    </tr>
                    <tr>
                        <th width="45%"></th>
                        <th width="10%"></th>
                        <td width="45%" class="py-4"></td>
                    </tr>

                    </tbody>
                </table>
            </div>


    </div>
</div>
</div>


<div class=" row col-md-12">
    <div class="col-md-12">
        <div class="card m-b-30 card-body">

            <h4 class="title py-3 md-3 text-center">
                {{ __('Products Ordered') }}
                </h4>

                <div class="table-responsiv">
                    <table id="example2" class="table table-hover dt-responsive" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th> Name</th>
                                <th width="60">QTY</th>
                                <th>Price</th>
                                <th width="120">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($orderProduct as $item)
                            <tr>

                                <td>{{ $item->name}}</td>
                                <td>{{ $item->qty}}</td>
                                <td>{{ $item->price}}</td>
                                <td>{{  \App\Order::presentPrice($item->qty * $item->price)}}</td>
                            </tr>
                                @endforeach

                                <tr>
                                    <td colspan="2" class="text-right"><strong>Subtotal</strong></td>
                                    <td>{{\App\Order::presentPrice($order->subtotal)}}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-right no-border"><strong>VAT Included in Total</strong></td>
                                    <td>{{ \App\Order::presentPrice($order->total - $order->subtotal)  }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-right no-border"><strong>Total</strong></td>
                                    <td><strong>{{ \App\Order::presentPrice($order->total)  }}</strong></td>
                                </tr>
                        </tbody>
                    </table>
            </div>


        </div>
    </div>
</div>


</div>
@endsection
