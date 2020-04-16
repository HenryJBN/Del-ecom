<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Position</th>
        <th>Start date</th>
        <th width="280px">Action</th>

    </tr>
    </thead>
 @php
     $i=0
 @endphp

    <tbody>
        @foreach ($users as $user)
  <tr>
      <td>{{ ++$i }}</td>
  <td>{{$user['name']}}</td>
        <td>{{$user['email']}}</td>
        <td>{{$user['type']}}
            @if(!empty($user->getRoleNames()))
            @foreach($user->getRoleNames() as $v)
               <label class="badge badge-success">{{ $v }}</label>
            @endforeach
          @endif

        </td>
  <td>{{$user['created_at']}}</td>
        <td>
            {{-- <a class="btn btn-info" href="{{ route('users.show',$user['id']) }}">Show</a> --}}
            @can('user-edit')
                <a class="btn btn-primary" href="{{ route('users.edit',$user['id']) }}">Edit</a>
            @endcan
            @can('user-delete')
            <a class="btn btn-danger text-white"  title="Delete" data-toggle="tooltip" onclick="deletefunction({{$user['id']}})">Delete</a>

            @endcan

        </td>

    </tr>
        @endforeach


    </tbody>
</table>
