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
  

  <section style="background-color: white; border-radius: 1rem;" class="m-3 ">
 
  <div class="dashboard-text container-fluid px-3">
    <x-error-success-message/>
<table class="table table-striped table-product table-responsive">
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
                        class="btn btn-sm text-dark p-0 me-2" 
                        data-bs-toggle="modal" 
                        data-bs-target="#editProductModal-{{ $product->id }}" 
                        style="border: none; background: transparent;">
                        <i class="lni lni-pencil me-2" style="pointer-events: none;"></i>
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

            <!-- Modal-edit -->
            <div class="modal fade" id="editProductModal-{{ $product->id }}" tabindex="-1" aria-labelledby="editProductModalLabel-{{ $product->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('products.update', $product->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="productName" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $product->name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="productDescription" class="form-label">Product Description</label>
                                    <textarea class="form-control" name="description" required>{{ $product->description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="productPrice" class="form-label">Product Price</label>
                                    <input type="number" class="form-control" name="price" value="{{ $product->price }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="productStock" class="form-label">Product Stock</label>
                                    <input type="number" class="form-control" name="stock" value="{{ $product->stock }}" min="0" required>
                                </div>
                                <div class="mb-3">
                                    <label for="productCategory" class="form-label">Product Category</label>
                                    <select class="form-select" name="category" required>
                                        <option value="Fruit Shake" {{ $product->category == 'Fruit Shake' ? 'selected' : '' }}>Fruit Shake</option>
                                        <option value="Milk Shake" {{ $product->category == 'Milk Shake' ? 'selected' : '' }}>Milk Shake</option>
                                        <option value="Add Ons" {{ $product->category == 'Add Ons' ? 'selected' : '' }}>Add Ons</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


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