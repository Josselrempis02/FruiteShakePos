@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<section class="d-flex align-items-center justify-content-between container-fluid mt-4">
<div class="dashboard-text pl-3">
        <h1>Receipts</h1>
        <h3>Home &gt; Receipts</h3>
    </div>
</section>

  


  <section style="background-color: white;" class="m-3">
  <div class="container-fluid my-5">
        <h2 class="fw-bold">Receipts</h2>
        <p class="text-muted">List of all orders with downloadable receipts.</p>

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
                    <!-- Example receipt row 1 -->
                    <tr>
                        <td>ORD001</td>
                        <td>John Doe</td>
                        <td>2025-01-01</td>
                        <td>₱1,500.00</td>
                        <td>
                            <!-- Download Button -->
                            <button class="btn btn-primary">
                                <i class="fas fa-download"></i> Download Receipt
                            </button>
                        </td>
                    </tr>
                    <!-- Example receipt row 2 -->
                    <tr>
                        <td>ORD002</td>
                        <td>Jane Smith</td>
                        <td>2025-01-02</td>
                        <td>₱2,000.00</td>
                        <td>
                            <button class="btn btn-primary">
                                <i class="fas fa-download"></i> Download Receipt
                            </button>
                        </td>
                    </tr>
                    <!-- Example receipt row 3 -->
                    <tr>
                        <td>ORD003</td>
                        <td>Mark Lee</td>
                        <td>2025-01-03</td>
                        <td>₱800.00</td>
                        <td>
                            <button class="btn btn-primary">
                                <i class="fas fa-download"></i> Download Receipt
                            </button>
                        </td>
                    </tr>
                    <!-- Add more rows for other orders as needed -->
                </tbody>
            </table>
        </div>
    </div>
</section>


@endsection