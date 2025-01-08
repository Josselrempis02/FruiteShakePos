@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<section class="d-flex align-items-center justify-content-between container-fluid mt-4">
<div class="dashboard-text pl-3">
        <h1>Product</h1>
        <h3>Home &gt; Product</h3>
    </div>

    <div class="custom-button">
        <button class="add-product-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <span class="icon">+</span> ADD NEW PRODUCT
        </button>
    </div>
</section>

  <!-- Modal -->
  <x-addproduct/>
  <x-edit-product/>

  <section style="background-color: white;" class="m-3">
 
    <div class="dashboard-text container-fluid pl-3  ">
    <x-error-success-message/>
<table class="table table-striped">
    <thead>
        <tr class="orders-header">
            <th scope="col">Product</th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr class="recent-orders-tr">
                <td>{{ $product->name }}</td>
                <td>{{ $product->category }}</td>
                <td>₱{{ number_format($product->price, 2) }}</td>
                <td>
                    <!-- Edit Button -->
                    <button 
                    class="btn btn-link text-dark p-0 me-2" 
                    title="Edit" 
                    data-bs-toggle="modal" 
                    data-bs-target="#editProductModal" 
                    onclick="setProductData({{ $product->id }}, '{{ $product->name }}', '{{ $product->description }}', {{ $product->price }}, {{ $product->stock }}, '{{ $product->category }}')">
                    <i class="fas fa-edit"></i>
                </button>
                                
                  
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE') 
                        <button type="submit" class="btn btn-link text-danger p-0" title="Delete" onclick="return confirm('Are you sure you want to delete this product?')">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Pagination Links -->
<div class="mt-3">
    {{ $products->links() }}
</div>




    </div>
</section>


@endsection