<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>

        <th>Quantity</th>
        <th>Status</th>
        <th>Order Code</th>
        {{-- <th>Total</th> --}}
        <th>Created At</th>
        <th width="280px">Action</th>

    </tr>
    </thead>
 @php
     $i=0
 @endphp

    <tbody>
        @foreach ($orders as $order)
  <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $order->user->name }}</td>
        <td>{{$order->email}}</td>

        <td>{{$order->quantity}}</td>
        <td>
            {{-- 'new','cancelled','shipped','delivered','returned' --}}
            @if ($order->status == "new")
             <div class="badge badge-success">
               {{ $order->status}}
             </div>
            @elseif($order->status =="cancelled")
            <div class="badge badge-danger">
                {{ $order->status}}
              </div>
            @elseif($order->status =="shipped")
            <div class="badge badge-info">
                {{ $order->status}}
              </div>
            @elseif($order->status =="delivered")
            <div class="badge badge-primary">
                {{ $order->status}}
              </div>
            @elseif($order->status =="returned")
            <div class="badge badge-dark">
                {{ $order->status}}
              </div>
            @endif

          </td>
        <td>{{$order->order_code}}</td>
        {{-- <td>{{ \App\Setting::presentPrice($order->total)}}</td> --}}
        <td>{{$order->created_at->format('j F, Y')}}</td>
        <td>

            <a class="btn btn-success" href="{{ route('admin-order-show',$order['id']) }}">Details</a>
            <a class="btn btn-warning" href="{{ route('admin-order-invoice',$order['id']) }}">Invoice</a>
            @can('order-edit')
                <a class="btn btn-primary" href="{{ route('admin-order-edit',$order['id']) }}">Edit</a>
            @endcan
            @can('order-delete')
            <a class="btn btn-danger text-white"  title="Delete" data-toggle="tooltip" onclick="deletefunction({{$order['id']}})">Delete</a>

            @endcan

        </td>

    </tr>
        @endforeach


    </tbody>
</table>
