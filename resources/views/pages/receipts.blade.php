@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<section class="d-flex align-items-center justify-content-between container-fluid mt-4">
<div class="dashboard-text pl-3">
        <h1>Receipts</h1>
        <h3>Home &gt; Receipts</h3>
    </div>
</section>

  <section style="background-color: white; border-radius: 1rem;" class="m-3 ">
  <div class="container-fluid my-5">
        
        <p class="text-muted pt-3">List of all orders with downloadable receipts.</p>

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
                            <!-- Download Button -->
                            <a href="{{ route('orders.receipt', $order->id) }}" class="btn btn-primary">
                                <i class="fas fa-download"></i> Download Receipt
                            </a>
                        </td>
                    </tr>
            
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">No receipts found.</td>
                    </tr>
                  @endforelse
                </tbody>
            </table>

            {{ $orderList->links() }}
        </div>
    </div>
</section>


@endsection