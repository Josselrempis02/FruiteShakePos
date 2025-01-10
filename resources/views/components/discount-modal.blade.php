<button class="btn discount-btn w-100 mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Enter Discount</button>

<!-- Modal for Discount -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enter Discount</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('cart.applyDiscount') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row align-items-center discount">
                        <div class="col-6 text-center fix">
                            <span>Fix</span>
                            <input type="radio" name="discount_type" value="fix" checked>
                        </div>
                        <div class="col-6 text-center percent">
                            <span>Percent</span>
                            <input type="radio" name="discount_type" value="percent">
                        </div>
                    </div>

                    <h5 class="pt-2">Discount Value</h5>
                    <div data-mdb-input-init class="form-outline">
                        <input type="number" id="discountValue" name="discount_value" class="form-control" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary w-100 mb-3">Apply Discount</button>
                </div>
            </form>
        </div>
    </div>
</div>