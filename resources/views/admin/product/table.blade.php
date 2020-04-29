<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
    <tr>
        <th>No</th>
        <th>Product Name</th>
        <th>Category</th>
        <th>SubCategory</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Status</th>
        <th>SKU</th>
        <th>Photo</th>
        <th>Created At</th>
        <th width="280px">Action</th>

    </tr>
    </thead>
 @php
     $i=0
 @endphp

    <tbody>
        @foreach ($products as $product)
  <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $product->name }}</td>
        <td>{{$product->category->name}}</td>
        <td>
            @if ( $product->subcategory_id != null)
            {{ $product->subcategory->name }}
            @endif

        </td>
        <td>{{ '₦'.$product->price   }}</td>
        <td>{{$product->quantity}}</td>
        <td>
            @if ($product->status == "draft")
             <div class="badge badge-success">
               {{ $product->status}}
             </div>
            @elseif($product->status =="new")
            <div class="badge badge-primary">
                {{ $product->status}}
              </div>
            @elseif($product->status =="available")
            <div class="badge badge-info">
                {{ $product->status}}
              </div>
            @elseif($product->status =="unavailable")
            <div class="badge badge-danger">
                {{ $product->status}}
              </div>
            @endif

          </td>
        <td>{{$product->sku}}</td>
        <td><img height="50" width="50" src="{{$product->getFirstMediaUrl('featured_product')}}" />   </td>
        <td>{{$product->created_at}}</td>
        <td>

            @can('product-edit')
                <a class="btn btn-primary" href="{{ route('admin-prod-edit',$product['id']) }}">Edit</a>
            @endcan
            @can('product-delete')
            <a class="btn btn-danger text-white"  title="Delete" data-toggle="tooltip" onclick="deletefunction({{$product['id']}})">Delete</a>

            @endcan

        </td>

    </tr>
        @endforeach


    </tbody>
</table>
