@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<section class="container-fluid mt-4">
<div class="dashboard-text mb-2 pl-3">
        <h1>Dashboard</h1>
        <h3 class="fs-6 text-muted">Home > Dashboard</h3>
    </div>

    <!-- Row for 3 Cards -->
    <div class="row g-4">
    
        <!-- Card 1 -->
        <div class="col-md-4">
        @php
            function formatCurrency($amount) {
                if ($amount >= 1000000) {
                    return '₱' . number_format($amount / 1000000, 1) . 'M'; // Format in millions
                } elseif ($amount >= 1000) {
                    return '₱' . number_format($amount / 1000, 1) . 'K'; // Format in thousands
                } else {
                    return '₱' . number_format($amount, 2); // Regular formatting
                }
            }
        @endphp
            <div class="card shadow h-100 border-0" style="background-color: #004C4C; color: white;">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                      <small>Total Sales (Daily)</small>
                      <h5 class="fw-bold">{{ formatCurrency($totalSales) }}</h5>

                       
                    </div>
                    <div class="text-end">
                        <i class="fa-solid fa-peso-sign fa-2x"></i>
                    </div>
                </div>
                <div class="p-2" style="height: 5px; background: linear-gradient(to right, #FFD700, #FFD700 60%, transparent 60%);"></div>
            </div>
        </div>
        <!-- Card 2 -->
        <div class="col-md-4">
            <div class="card shadow h-100 border-0" style="background-color: #004C4C; color: white;">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <small>Monthly Revenue</small>
                        <h5 class="fw-bold">{{ formatCurrency($monthlyRevenue) }}</h5>
                       
                    </div>
                    <div class="text-end">
                        <i class="fa-solid fa-chart-pie fa-2x"></i>
                    </div>
                </div>
                <div class="p-2" style="height: 5px; background: linear-gradient(to right, #FF3030, #FF3030 70%, transparent 70%);"></div>
            </div>
        </div>
        <!-- Card 3 -->
        <div class="col-md-4">
            <div class="card shadow h-100 border-0" style="background-color: #004C4C; color: white;">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <small>Product</small>
                        <h5 class="fw-bold">{{ $productCount }}</h5>
                    </div>
                    <div class="text-end">
                        <i class="fa-solid fa-box fa-2x"></i>
                    </div>
                </div>
                <div class="p-2" style="height: 5px; background: linear-gradient(to right, #FF00FF, #FF00FF 50%, transparent 50%);"></div>
            </div>
        </div>
    </div>

    <div class="card mt-4 shadow border-0">
    <div class="card-body">
        <h5 class="fw-bold">Overview</h5>
        <canvas id="salesRevenueChart" style="max-height: 400px;"></canvas>
    </div>
</div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var labels = @json($labels);
    var sales = @json($sales);

    var ctx = document.getElementById('salesRevenueChart').getContext('2d');
    var salesRevenueChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total Sales',
                data: sales,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                fill: true,
                tension: 0.4,
            }]
        },
        options: {
            scales: {
                x: {
                    type: 'category',
                    title: {
                        display: true,
                        text: 'Month'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Sales (₱)'
                    }
                }
            },
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>





@endsection
