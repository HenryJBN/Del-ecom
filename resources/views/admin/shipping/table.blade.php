<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Address</th>
        <th>State</th>
        <th>User</th>
        <th>Shipping Method</th>
        <th>Created At</th>
        <th width="280px">Action</th>

    </tr>
    </thead>
 @php
     $i=0
 @endphp

    <tbody>
        @foreach ($shippings as $shipping)
  <tr>
        <td>{{ ++$i }}</td>
        <td>{{$shipping['first_name'] .' '.$shipping['last_name']}}</td>
        <td>{{$shipping['email']}}</td>
        <td>{{$shipping['phone_number']}}</td>
        <td>{{$shipping['address']}}</td>
        <td>{{$shipping['state']}}</td>
        <td>{{$shipping->user->name}}</td>
        <td>{{$shipping->shipping_method}}</td>
        <td>{{$shipping['created_at']}}</td>
        <td>

            {{-- @can('shipping-edit') --}}
                <a class="btn btn-primary" href="{{ route('admin-ship-edit',$shipping['id']) }}">Edit</a>
            {{-- @endcan --}}
            {{-- @can('shipping-delete') --}}
            <a class="btn btn-danger text-white"  title="Delete" data-toggle="tooltip" onclick="deletefunction({{$shipping['id']}})">Delete</a>

            {{-- @endcan --}}

        </td>

    </tr>
        @endforeach


    </tbody>
</table>
