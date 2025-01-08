<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="productName" class="form-label">Product Name</label>
        <input type="text" class="form-control" id="productName" name="name" value="{{ old('name', $product->name) }}" required>
    </div>
    <div class="mb-3">
        <label for="productDescription" class="form-label">Product Description</label>
        <textarea class="form-control" id="productDescription" name="description" rows="3" required>{{ old('description', $product->description) }}</textarea>
    </div>
    <div class="mb-3">
        <label for="productPrice" class="form-label">Product Price</label>
        <input type="number" class="form-control" id="productPrice" name="price" value="{{ old('price', $product->price) }}" required>
    </div>
    <div class="mb-3">
        <label for="productStock" class="form-label">Product Stock</label>
        <input type="number" class="form-control" id="productStock" name="stock" value="{{ old('stock', $product->stock) }}" min="0" required>
    </div>
    <div class="mb-3">
        <label for="productCategory" class="form-label">Product Category</label>
        <select class="form-select" id="productCategory" name="category" required>
            <option value="Fruit Shake" {{ $product->category == 'Fruit Shake' ? 'selected' : '' }}>Fruit Shake</option>
            <option value="Milk Shake" {{ $product->category == 'Milk Shake' ? 'selected' : '' }}>Milk Shake</option>
            <option value="Add Ons" {{ $product->category == 'Add Ons' ? 'selected' : '' }}>Add Ons</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update Product</button>
</form>

            </div>
        </div>
    </div>
</div>
