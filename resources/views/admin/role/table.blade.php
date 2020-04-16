<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
    <tr>
        <th>#ID</th>
        <th>Name</th>
        <th>Guard Name</th>
        <th>Created Date</th>
        <th width="280px"> Action</th>
    </tr>
    </thead>


    <tbody>
        @foreach ($roles as $role)
  <tr>
  <td>#{{$role['id']}}</td>
        <td>{{$role['name']}}</td>
        <td>{{$role['guard_name']}}</td>
  <td>{{$role['created_at']}}</td>
        <td>
            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
            @can('role-edit')
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
            @endcan
            @can('role-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endcan
        </td>

    </tr>
        @endforeach


    </tbody>
</table>
