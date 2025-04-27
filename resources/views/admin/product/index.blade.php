@extends('Layouts.auth-layout')

@section('title', 'Product')

@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Products</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover table-bordered table-sm table-responsive-sm">
                        <thead>
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Category</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Product</th>
                                <th scope="col">Image</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td> @if($product->category)

                                        {{ $product->category->name }}
                                        @else
                                        No Category
                                        @endif
                                    </td>
                                    <td>{{ $product->brand->name }}</td>
                                    <td>{{ $product->name }}</td>
                                    {{-- @dd($product->productImages) --}}
                                    <td><img src="{{asset($product->category->image)}}" style="width: 50px; height:50px" alt=""></td>
                                    <td>{{ $product->selling_price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->status == '0' ? 'Visible' : 'Hidden' }}</td>
                                    <td>
                                        <a href="{{route('admin.product.edit', $product->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                        <form class="d-inline" action="{{ route('admin.product.delete', $product->id) }}" method="post" onsubmit="return confirm('Are you really sure to delete this?')">
@csrf
@method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Del</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="4">No Record Found</td>
                            @endforelse


                        </tbody>
                    </table>
                    {{-- {{ $products->links() }} --}}
                </div>
              </div>
            </div>
          </div>
      </div>
    </section>
</div>
@endsection
