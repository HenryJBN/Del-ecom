<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Transaction_ref</th>
        <th>Channel</th>
        <th>Payment Status</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>Amount</th>
        <th>Channel</th>
        <th>currency</th>
        <th>Merchant Transaction_ref</th>
        <th>Payment Description</th>
        <th>Created At</th>


    </tr>
    </thead>
 @php
     $i=0
 @endphp

    <tbody>
        @foreach ($trans as $tran)
  <tr>
        <td>{{ ++$i }}</td>
        <td>
            @if($tran->full_name)
            {{$tran->full_name }}
            @else
            Guest
            @endif
        </td>
        <td>{{$tran->transaction_ref}}</td>
        <td>{{$tran->channel}}</td>
        <td>{{$tran->payment_status}}</td>
        <td>{{$tran->phone_number}}</td>
        <td>{{$tran->email_address}}</td>
        <td>{{$tran->amount}}</td>
        <td>{{$tran->channel}}</td>
        <td>{{$tran->currency}}</td>
        <td>{{$tran->merchant_transaction_ref}}</td>
        <td>{{$tran->payment_status_description}}</td>
        <td>{{ date('j F, Y H:i:a',strtotime($tran->transaction_date))}}</td>


    </tr>
        @endforeach


    </tbody>
</table>
