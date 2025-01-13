@extends('layouts.admin')

@section('title', 'Sales Report')

@section('content')

<section class="container-fluid mt-4 d-flex align-items-center justify-content-between">
    <div class="dashboard-text">
        <h1 class="pl-3">Sales Report</h1>
        <h3 class="pl-3">Home &gt; Sales Report</h3>
    </div>
</section>

<section class="m-3" style="background-color: white; border-radius: 1rem;">
    <div class="container p-4">
        <h1 class="text-center mb-4">Daily Sales Report</h1>

        <!-- Date Filter Section -->
        <form method="POST" action="{{ route('sales-report.generate') }}" class="mb-4">
            @csrf
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="startDate" class="form-label">Start Date</label>
                    <input type="date" id="startDate" name="start_date" class="form-control" value="{{ old('start_date') }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="endDate" class="form-label">End Date</label>
                    <input type="date" id="endDate" name="end_date" class="form-control" value="{{ old('end_date') }}" required>
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Generate Report</button>
                </div>
            </div>
        </form>

        <!-- Sales Table -->
        @isset($sales)
        <div id="salesReport">
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Total Sales</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sales as $index => $sale)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sale->date }}</td>
                            <td>{{ $sale->product }}</td>
                            <td>{{ $sale->quantity }}</td>
                            <td>₱{{ number_format($sale->total_sales, 2) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No sales found for the selected date range.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- PDF Download Button -->
        <div class="text-end mt-3">
            <a href="{{ route('sales-report.download', ['start_date' => $start_date, 'end_date' => $end_date]) }}" class="btn btn-success">Download PDF</a>
        </div>
        @endisset
    </div>
</section>

@endsection