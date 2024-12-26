@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<section class="container-fluid mt-4">
<div class="dashboard-text pl-3">
        <h1>Point of Sale</h1>
        <h3>Home > POS</h3>
    </div>

    <div class="container-fluid my-4 border border-2 rounded p-4 pos-card">
        <div class="row ">
            <!-- Item Grid -->
            <div class="col-md-8 mb-3">
                <div class="d-flex justify-content-start mb-3">
                    <button class="btn btn-sm  px-4 me-2" >ALL</button>
                    <button class="btn btn-sm   px-4 me-2">Shake</button>
                    <button class="btn btn-sm   px-4 me-2">Milk Shakes</button>
                    <button class="btn btn-sm   px-4 me-2">Add Ons</button>
                </div>
                <div class="row g-3">
                    <!-- Product Cards -->
                    <div class="col-6 col-md-3">
                        <div class="product-card">
                        <i class="material-icons">local_drink</i>
                            <div>Mango</div>
                            <small>20 items</small>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="product-card">
                           <i class="material-icons">local_drink</i>
                            <div>Strawberry</div>
                            <small>20 items</small>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="product-card">
                           <i class="material-icons">local_drink</i>
                            <div>Banana</div>
                            <small>20 items</small>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="product-card">
                           <i class="material-icons">local_drink</i>
                            <div>Avocado</div>
                            <small>20 items</small>
                        </div>
                    </div>
                    <!-- Add more products -->
                </div>
            </div>
            
            <!-- Receipt Section -->
            <div class="col-md-4">
                <div class="receipt-section">
                    <div class="receipt-header mb-3">Receipt</div>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Chicken Parmesan
                            <span>- 3 +</span>
                            <span>$55.00</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Chicken Parmesan
                            <span>- 2 +</span>
                            <span>$55.00</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Chicken Parmesan
                            <span>- 2 +</span>
                            <span>$55.00</span>
                        </li>
                    </ul>
                    <button class="btn discount-btn w-100 mb-3"data-bs-toggle="modal" data-bs-target="#exampleModal">Discount</button>

                    <!-- Modal -->
                    <x-discount-modal/>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <span>Subtotal</span>
                            <span class="subtotal">$110.00</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Total</span>
                            <span class="total">$116.50</span>
                        </div>
                    </div>
                    <input type="text" class="form-control dark-box mb-3" placeholder="Customer name">
                    <textarea class="form-control dark-box mb-3" rows="3" placeholder="Notes"></textarea>

                    <!-- Trigger Button -->
                    <button class="btn confirm-btn w-100" data-bs-toggle="modal" data-bs-target="#confirmModal">Confirm</button>

                    <!-- Modal -->
                    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmModalLabel">Confirmation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to proceed?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary">Confirm</button>
                        </div>
                        </div>
                    </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>


    @endsection