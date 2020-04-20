<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Slug</th>
        <th>Photo</th>
        <th>No of Product</th>
        <th width="280px">Action</th>

    </tr>
    </thead>
 @php
     $i=0
 @endphp

    <tbody>
        @foreach ($categories as $category)
  <tr>
        <td>{{ ++$i }}</td>
        <td>{{$category['name']}}</td>
        <td>{{$category['slug']}}</td>
        <td><img height="50" width="50" src="{{$category->getFirstMediaUrl('category')}}" />   </td>
        <td>{{$category['created_at']}}</td>
        <td>
            
            @can('category-edit')
                <a class="btn btn-primary" href="{{ route('admin-cat-edit',$category['id']) }}">Edit</a>
            @endcan
            @can('category-delete')
            <a class="btn btn-danger text-white"  title="Delete" data-toggle="tooltip" onclick="deletefunction({{$category['id']}})">Delete</a>

            @endcan

        </td>

    </tr>
        @endforeach


    </tbody>
</table>
