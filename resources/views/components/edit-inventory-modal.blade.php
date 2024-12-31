<!-- Edit Modal -->
<div class="modal fade" id="editProductModal1" tabindex="-1" aria-labelledby="editProductModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/update-product" method="POST">
                <!-- Add necessary form fields -->
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel1">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Stock -->
                    <div class="mb-3">
                        <label for="editProductStock-1" class="form-label">Stock</label>
                        <input 
                            type="number" 
                            class="form-control" 
                            id="editProductStock-1" 
                            name="stock" 
                            value="10" 
                            min="0" 
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-save">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>