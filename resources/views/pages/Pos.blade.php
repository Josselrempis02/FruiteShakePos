
@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<section class="container-fluid mt-4">
    <div class="dashboard-text pl-3">
        <h1>Point of Sale</h1>
        <h3 class="text-muted">Home > POS</h3>
    </div>
    <x-error-success-message/>
    <div class="container-fluid my-4 border border-2 rounded p-4 pos-card">
        <div class="row">
            <!-- Item Grid -->
            <div class="col-md-8 mb-3">
                <div class="d-flex justify-content-start mb-3">
                    <a href="{{ route('staff.pos', ['category' => 'ALL']) }}" class="btn btn-sm px-4 me-2 category-btn {{ $category === 'ALL' ? 'btn-primary' : 'btn-light' }}">ALL</a>
                    <a href="{{ route('staff.pos', ['category' => 'Fruit Shake']) }}" class="btn btn-sm px-4 me-2 category-btn {{ $category === 'Fruit Shake' ? 'btn-primary' : 'btn-light' }}">Fruit Shake</a>
                    <a href="{{ route('staff.pos', ['category' => 'Milk Shake']) }}" class="btn btn-sm px-4 me-2 category-btn {{ $category === 'Milk Shake' ? 'btn-primary' : 'btn-light' }}">Milk Shakes</a>
                    <a href="{{ route('staff.pos', ['category' => 'Add Ons']) }}" class="btn btn-sm px-4 me-2 category-btn {{ $category === 'Add Ons' ? 'btn-primary' : 'btn-light' }}">Add Ons</a>
                </div>

                <div class="row g-3">
                    @foreach ($products as $product)
                        <div class="col-6 col-md-3">
                            <form action="{{ route('cart.store') }}" method="POST" class="product-form">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <input type="hidden" name="name" value="{{ $product->name }}">
                                <input type="hidden" name="price" value="{{ $product->price }}">
                                <input type="hidden" name="quantity" value="1">

                                <div class="product-card clickable">
                                    <i class="material-icons">local_drink</i>
                                    <div>{{ $product->name }}</div>
                                    <small>{{ $product->stock }} items</small>
                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Receipt Section -->
            <div class="col-md-4">
                <div class="receipt-section">
                    <div class="receipt-header mb-3">Receipt</div>
                    <ul class="list-group mb-3" id="cart-items">
    @foreach (Cart::getContent() as $item)
        <li class="list-group-item d-flex justify-content-between align-items-start flex-wrap" id="item-{{ $item->id }}">
            <div class="item-name flex-grow-1 text-truncate">
                {{ $item->name }}
            </div>
            <div class="item-quantity d-flex align-items-center mx-3">
                <!-- Decrease Quantity -->
                <button class="btn btn-sm btn-outline-secondary update-quantity me-1" data-id="{{ $item->id }}" data-action="decrease">-</button>
                <span class="px-2 quantity">{{ $item->quantity }}</span>
                <!-- Increase Quantity -->
                <button class="btn btn-sm btn-outline-secondary update-quantity ms-1" data-id="{{ $item->id }}" data-action="increase">+</button>
            </div>
            <div class="item-price text-nowrap price">
            ₱{{ number_format($item->price * $item->quantity, 2) }}
            </div>
        </li>
    @endforeach
</ul>

                <script>
                    document.querySelectorAll('.update-quantity').forEach(button => {
                        button.addEventListener('click', function () {
                            const itemId = this.getAttribute('data-id');
                            const action = this.getAttribute('data-action');

                            fetch('{{ route('cart.update') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                },
                                body: JSON.stringify({ id: itemId, action: action }),
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    location.reload(); // Reload the page after updating the quantity
                                } else {
                                    alert(data.message || 'Something went wrong.');
                                }
                            })
                            .catch(error => console.error('Error:', error));
                        });
                    });
                </script>






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
                                        <div class="form-outline">
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

                    <div class="mb-3">
                    <div class="d-flex justify-content-between">
                <span>Subtotal</span> 
                <span class="subtotal">₱{{ number_format(Cart::getSubTotal(), 2) }}</span>
            </div>

            @if (session()->has('discount_amount'))
                <div class="d-flex justify-content-between">
                    <span>Discount</span>
                    <span class="discount">- ₱{{ number_format(session('discount_amount'), 2) }}</span>
                </div>
            @endif

            @php
            $subtotal = Cart::getSubTotal();
            $discount = session('discount_amount', 0); // Default to 0 if no discount is set
            $total = $subtotal - $discount;
        @endphp

        <div class="d-flex justify-content-between">
            <span>Total</span>
            <span class="total">₱{{ number_format($total, 2) }}</span>
        </div>



            <input type="text" class="form-control dark-box mt-3 mb-3" placeholder="Customer name" name="customer_name" required>
            <textarea class="form-control dark-box mb-3" rows="3" placeholder="Notes" name="notes" required></textarea>

            <button class="btn confirm-btn w-100" 
                data-bs-toggle="modal" 
                data-bs-target="#confirmModal"
                data-total="{{ session('cart_total') ?? Cart::getTotal() }}">
                Confirm
            </button>

            <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="background-color: #f4c983;">
                    <div class="modal-body">
                        <h5 class="text-center">Amount Payable</h5>
                        <h2 class="text-center" id="modalAmountPayable" style="color: #333;">₱0.00</h2>

                        <label for="modalAmountReceived" class="form-label">Amount Received</label>
                        <input type="number" id="modalAmountReceived" class="form-control" required>

                        <p class="text-center mt-2">Change: <span id="modalChangeDisplay">₱0.00</span></p>

                        <!-- Buttons for predefined amounts -->
                        <div class="amount-buttons-container">
                            <button type="button" class="btn amount-btn" data-amount="20">20</button>
                            <button type="button" class="btn amount-btn" data-amount="50">50</button>
                            <button type="button" class="btn amount-btn" data-amount="100">100</button>
                            <button type="button" class="btn amount-btn" data-amount="200">200</button>
                            <button type="button" class="btn amount-btn" data-amount="300">300</button>
                            <button type="button" class="btn amount-btn" data-amount="400">400</button>
                            <button type="button" class="btn amount-btn" data-amount="500">500</button>
                            <button type="button" class="btn amount-btn" data-amount="800">800</button>
                            <button type="button" class="btn amount-btn" data-amount="1000">1000</button>
                        </div>

                        <button type="button" class="btn exact-amount-btn w-100">Exact Amount</button>
                        <button id="modalConfirmButton" class="btn proceed-btn w-100 mt-2">Proceed</button>

                        <form id="placeOrderForm" action="{{ route('place.order') }}" method="POST">
                                @csrf
                                <input type="hidden" name="amount_received" id="amountReceivedInput">
                                <input type="hidden" name="customer_name">
                                <input type="hidden" name="notes">
                            </form>
                    </div>
                </div>
            </div>
        </div>

<script>
   document.addEventListener('DOMContentLoaded', function () {
    const confirmButton = document.querySelector('.confirm-btn');
    const modalAmountPayable = document.getElementById('modalAmountPayable');
    const modalAmountReceived = document.getElementById('modalAmountReceived');
    const modalChangeDisplay = document.getElementById('modalChangeDisplay');
    const modalConfirmButton = document.getElementById('modalConfirmButton');
    const placeOrderForm = document.getElementById('placeOrderForm');
    const amountButtons = document.querySelectorAll('.amount-btn');
    const exactAmountButton = document.querySelector('.exact-amount-btn');

    const customerNameInput = document.querySelector('input[name="customer_name"]');
    const notesInput = document.querySelector('textarea[name="notes"]');

    let totalAmount = 0;

    // **Function to update the total amount**
    function updateTotalAmount() {
        const totalElement = document.querySelector('.total'); // Select the total amount element
        if (totalElement) {
            totalAmount = parseFloat(totalElement.textContent.replace('₱', '').replace(',', '')) || 0;
            confirmButton.dataset.total = totalAmount; // Update data-total dynamically
        }
    }

    // **Call updateTotalAmount whenever a product is added**
    document.querySelectorAll('.product-form').forEach(form => {
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            const formData = new FormData(this);

            fetch('{{ route("cart.store") }}', {
                method: 'POST',
                body: formData,
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    updateTotalAmount(); // Update the total amount after adding a product
                    location.reload(); // Refresh the page to update UI
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });

    // **Update modal with total amount when Confirm button is clicked**
    confirmButton?.addEventListener('click', function () {
        updateTotalAmount(); // Ensure the latest total is used
        modalAmountPayable.textContent = `₱${totalAmount.toFixed(2)}`;
        modalAmountReceived.value = '';
        modalChangeDisplay.textContent = '₱0.00';
    });

    // **Update change when amount is entered**
    modalAmountReceived.addEventListener('input', function () {
        const receivedAmount = parseFloat(modalAmountReceived.value || 0);
        const change = Math.max(receivedAmount - totalAmount, 0);
        modalChangeDisplay.textContent = `₱${change.toFixed(2)}`;
    });

    // **Handle predefined amount buttons**
    amountButtons.forEach(button => {
        button.addEventListener('click', function () {
            const amount = parseFloat(button.dataset.amount || 0);
            modalAmountReceived.value = amount;
            const change = Math.max(amount - totalAmount, 0);
            modalChangeDisplay.textContent = `₱${change.toFixed(2)}`;
        });
    });

    // **Handle exact amount button**
    exactAmountButton.addEventListener('click', function () {
        modalAmountReceived.value = totalAmount.toFixed(2);
        modalChangeDisplay.textContent = '₱0.00';
    });

    // **Validate and submit form on confirm**
    modalConfirmButton.addEventListener('click', function () {
        const receivedAmount = parseFloat(modalAmountReceived.value || 0);

        if (receivedAmount < totalAmount) {
            alert('The received amount is less than the payable amount.');
            return;
        }

        if (!customerNameInput || !customerNameInput.value.trim()) {
            alert('Customer name is required.');
            return;
        }
        if (!notesInput || !notesInput.value.trim()) {
            alert('Notes are required.');
            return;
        }

        // Update form values
        placeOrderForm.querySelector('input[name="amount_received"]').value = receivedAmount;
        placeOrderForm.querySelector('input[name="customer_name"]').value = customerNameInput.value.trim();
        placeOrderForm.querySelector('input[name="notes"]').value = notesInput.value.trim();

        // Submit form
        placeOrderForm.submit();
    });
});

</script>




                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    @endsection

    