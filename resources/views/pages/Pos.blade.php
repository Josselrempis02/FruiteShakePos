@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<section class="container-fluid mt-4">
    <div class="dashboard-text pl-3">
        <h1>Point of Sale</h1>
        <h3>Home > POS</h3>
    </div>

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
                    <ul class="list-group mb-3">
                @foreach (Cart::getContent() as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-start flex-wrap">
                        <div class="item-name flex-grow-1 text-truncate">
                            {{ $item->name }}
                        </div>
                        <div class="item-quantity d-flex align-items-center mx-3">
                            <button class="btn btn-sm btn-outline-secondary update-quantity me-1" data-id="{{ $item->id }}" data-action="decrease">-</button>
                            <span class="px-2">{{ $item->quantity }}</span>
                            <button class="btn btn-sm btn-outline-secondary update-quantity ms-1" data-id="{{ $item->id }}" data-action="increase">+</button>
                        </div>
                        <div class="item-price text-nowrap">
                            ${{ number_format($item->price * $item->quantity, 2) }}
                        </div>
                    </li>
                @endforeach
            </ul>


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
                            <span class="subtotal">${{ number_format(Cart::getSubTotal(), 2) }}</span>
                        </div>
                        @if (session('discount_amount'))
                            <div class="d-flex justify-content-between">
                                <span>Discount</span>
                                <span class="discount">- ${{ number_format(session('discount_amount'), 2) }}</span>
                            </div>
                        @endif
                        <div class="d-flex justify-content-between">
                            <span>Total</span>
                            <span class="total">
                                @if (session('cart_total'))
                                    ${{ number_format(session('cart_total'), 2) }}
                                @else
                                    ${{ number_format(Cart::getTotal(), 2) }}
                                @endif
                            </span>
                        </div>
                    </div>

                    <input type="text" class="form-control dark-box mb-3" placeholder="Customer name">
                    <textarea class="form-control dark-box mb-3" rows="3" placeholder="Notes"></textarea>

                    <button class="btn confirm-btn w-100" data-bs-toggle="modal" data-bs-target="#confirmModal">Confirm</button>
                    <x-payment-confirm />
                </div>
            </div>
        </div>
    </div>
</section>


    @endsection