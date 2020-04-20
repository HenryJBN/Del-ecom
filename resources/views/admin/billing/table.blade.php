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
        <th>Created At</th>
        <th width="280px">Action</th>

    </tr>
    </thead>
 @php
     $i=0
 @endphp

    <tbody>
        @foreach ($billings as $billing)
  <tr>
        <td>{{ ++$i }}</td>
        <td>{{$billing['first_name'] .' '.$billing['last_name']}}</td>
        <td>{{$billing['email']}}</td>
        <td>{{$billing['phone_number']}}</td>
        <td>{{$billing['address']}}</td>
        <td>{{$billing->state}}</td>
        <td>{{$billing->user->name}}</td>
        <td>{{$billing['created_at']}}</td>
        <td>

            {{-- @can('billing-edit') --}}
                <a class="btn btn-primary" href="{{ route('admin-bill-edit',$billing['id']) }}">Edit</a>
            {{-- @endcan --}}
            {{-- @can('billing-delete') --}}
            <a class="btn btn-danger text-white"  title="Delete" data-toggle="tooltip" onclick="deletefunction({{$billing['id']}})">Delete</a>

            {{-- @endcan --}}

        </td>

    </tr>
        @endforeach


    </tbody>
</table>
