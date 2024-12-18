@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<section class="container-fluid mt-4">
<div class="dashboard-text mb-2 pl-3">
        <h1>Dashboard</h1>
        <h3>Home > Dashboard</h3>
    </div>

    <!-- Row for 3 Cards -->
    <div class="row g-4">
    
        <!-- Card 1 -->
        <div class="col-md-4">
            <div class="card shadow h-100 border-0" style="background-color: #004C4C; color: white;">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="fw-bold">$2k</h5>
                        <small>9 February 2024</small>
                    </div>
                    <div class="text-end">
                        <i class="fa-solid fa-dollar-sign fa-2x"></i>
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
                        <h5 class="fw-bold">$55k</h5>
                        <small>1 Jan - 1 Feb</small>
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
                        <h5 class="fw-bold">25</h5>
                    </div>
                    <div class="text-end">
                        <i class="fa-solid fa-box fa-2x"></i>
                    </div>
                </div>
                <div class="p-2" style="height: 5px; background: linear-gradient(to right, #FF00FF, #FF00FF 50%, transparent 50%);"></div>
            </div>
        </div>
    </div>

    <!-- Chart Section -->
    <div class="card mt-4 shadow border-0">
        <div class="card-body">
            <h5 class="fw-bold">Overview</h5>
            <canvas id="salesRevenueChart" style="max-height: 400px;"></canvas>

        </div>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const ctx = document.getElementById('salesRevenueChart').getContext('2d');
    const salesRevenueChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
            datasets: [
                {
                    label: 'Sales',
                    data: [3000, 4200, 1500, 5000, 4500, 3800, 4700, 4800, 4300, 4000, 3100, 4900],
                    borderColor: '#FF3030',
                    backgroundColor: 'transparent',
                    borderWidth: 2,
                    tension: 0.4,
                    pointStyle: 'circle',
                    pointBackgroundColor: '#FF3030',
                    pointRadius: 5
                },
                {
                    label: 'Revenue',
                    data: [2000, 2500, 3000, 2000, 3500, 3600, 4000, 3700, 3200, 3300, 2900, 3000],
                    borderColor: '#FFD700',
                    backgroundColor: 'transparent',
                    borderWidth: 2,
                    tension: 0.4,
                    pointStyle: 'circle',
                    pointBackgroundColor: '#FFD700',
                    pointRadius: 5
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return value + 'k';
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            }
        }
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


@endsection
