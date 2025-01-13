@extends('layouts.admin')

@section('title', 'Stock Logs')

@section('content')
<section class="container mt-4">
    <div class="row mb-3">
        <div class="col-12">
            <div class="dashboard-text">
                <h1>Inventory</h1>
                <h3 class="fs-6 text-muted">Home &gt; Inventory &gt; Stock Logs</h3>
            </div>
        </div>
        <div class="col-12">
            <h3 class="mt-2">Stock Logs for {{ $product->name }}</h3>
        </div>
    </div>

    <!-- Responsive Table -->
    <div class="table-responsive">
        <table class="table table-bordered bg-white" style="border-radius: 10px; overflow: hidden;">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Previous Stock</th>
                    <th>New Stock</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($logs as $log)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $log->previous_stock }}</td>
                        <td>{{ $log->new_stock }}</td>
                        <td>{{ $log->created_at->setTimezone('Asia/Manila')->format('F j, Y h:i A') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No stock logs found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-3 text-center">
        {{ $logs->links() }}
    </div>
</section>
@endsection
