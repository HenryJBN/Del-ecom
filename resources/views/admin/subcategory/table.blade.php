<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
    <tr>
        <th>No</th>
        <th>Category</th>
        <th>Name</th>
        <th>Slug</th>
        <th>Photo</th>
        <th width="280px">Action</th>

    </tr>
    </thead>
 @php
     $i=0
 @endphp

    <tbody>
        @foreach ($subcategories as $subcategory)
  <tr>
        <td>{{ ++$i }}</td>
        <td>{{$subcategory->category->name}}</td>
        <td>{{$subcategory['name']}}</td>
        <td>{{$subcategory['slug']}}</td>
        <td><img height="50" width="50" src="{{$subcategory->getFirstMediaUrl('subcategory')}}" />   </td>
        
        <td>

            @can('sub_category-edit')
                <a class="btn btn-primary" href="{{ route('admin-subcat-edit',$subcategory['id']) }}">Edit</a>
            @endcan
            @can('sub_category-delete')
            <a class="btn btn-danger text-white"  title="Delete" data-toggle="tooltip" onclick="deletefunction({{$subcategory['id']}})">Delete</a>

            @endcan

        </td>

    </tr>
        @endforeach


    </tbody>
</table>
