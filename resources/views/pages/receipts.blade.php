@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<section class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between container-fluid mt-4">
    <div class="dashboard-text pl-3">
        <h1>Receipts</h1>
        <h3 class="text-muted">Home &gt; Receipts</h3>
    </div>
</section>

<section style="background-color: white; border-radius: 1rem;" class="m-3">
    <div class="container-fluid my-5">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3 p-2 ">
            <p class="text-muted m-0">List of all orders with downloadable receipts.</p>
            <form method="GET" action="{{ route('receipts.index') }}" class="d-flex flex-column flex-md-row align-items-center gap-2  w-md-auto">
                <input 
                    type="text" 
                    name="search" 
                    class="form-control me-md-2" 
                    placeholder="Search Customer.." 
                    value="{{ request('search') }}" 
                    style="max-width: 300px;">
                <div class="d-flex gap-2">
                    <button type="submit" class="btn add-product-btn">Search</button>
                    @if(request('search'))
                        <a href="{{ route('receipts.index') }}" class="btn btn-outline-secondary d-flex align-items-center gap-2" title="Clear Filter">
                            <span class="material-icons">close</span>
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($orderList as $order)
                    <tr>
                        <td>{{ $order->order_number }}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->created_at->format('Y-m-d') }}</td> 
                        <td>₱{{ number_format($order->total, 2) }}</td>
                        <td>
                            <a href="{{ route('orders.receipt', $order->id) }}" class="btn btn-primary">
                                <i class="fas fa-download"></i> Download Receipt
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No receipts found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            {{ $orderList->links() }}
        </div>
    </div>
</section>

@endsection
