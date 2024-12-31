
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Inventory</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addProductForm">
                    <div class="mb-3">
                        <label for="productName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="productName" name="productName" required>
                    </div>
                    <div class="mb-3">
                        <label for="productDescription" class="form-label">Product Description</label>
                        <textarea class="form-control" id="productDescription" name="productDescription" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="productPrice" class="form-label">Product Price</label>
                        <input type="number" class="form-control" id="productPrice" name="productPrice" required>
                    </div>
                    <div class="mb-3">
                        <label for="productStock" class="form-label">Product Stock</label>
                        <input type="number" class="form-control" id="productStock" name="productStock" min="0" required>
                    </div>

                    <div class="mb-3">
                        <label for="productCategory" class="form-label">Product Category</label>
                        <select class="form-select" id="productCategory" name="productCategory" required>
                            <option value="" disabled selected>Select Category</option>
                            <option value="Electronics">Electronics</option>
                            <option value="Clothing">Clothing</option>
                            <option value="Home Appliances">Home Appliances</option>
                            <option value="Books">Books</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="addProductForm" class="btn btn-primary">Add Product</button>
            </div>
        </div>
    </div>
</div>