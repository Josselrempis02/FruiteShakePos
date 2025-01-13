@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<section class="container-fluid mt-4">
    <div class="row align-items-center justify-content-between">
        <div class="col-md-6 mb-3 mb-md-0">
            <div class="dashboard-text">
                <h1>Inventory</h1>
                <h3 class="fs-6 text-muted">Home &gt; Inventory</h3>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<x-add-inventory/>
<x-edit-inventory-modal/>

<section class="m-3" style="background-color: white; border-radius: 1rem;">
    <div class="container-fluid mt-3">
        <x-error-success-message/>

        <!-- Search Form -->
        <form method="GET" action="{{ route('inventory.index') }}" class="mb-3 p-3">
            <div class="row align-items-center">
                <div class="col-md-4 col-12 mb-2 mb-md-0">
                    <input 
                        type="text" 
                        name="search" 
                        class="form-control" 
                        placeholder="Search product by name..." 
                        value="{{ request('search') }}">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn add-product-btn">Search</button>
                </div>
                @if(request('search'))
                    <div class="col-auto">
                        <a href="{{ route('inventory.index') }}" class="btn btn-outline-secondary" title="Clear Filter">
                            <span class="material-icons">close</span>
                        </a>
                    </div>
                @endif
            </div>
        </form>

        <!-- Responsive Table -->
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr class="orders-header">
                        <th scope="col">Product</th>
                        <th scope="col">Category</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="recent-orders-tr">
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>
                                <!-- Add Stock Button -->
                                <button class="btn btn-link text-success p-0 me-2" title="Add Stock" data-bs-toggle="modal" data-bs-target="#addStockModal{{ $product->id }}">
                                    <i class="fas fa-plus-circle"></i>
                                </button>

                                <!-- View Stock Logs Button -->
                                <a href="{{ route('inventory.stockLogs', $product->id) }}" 
                                   class="btn btn-link text-info p-0 me-2" 
                                   title="View Stock Logs">
                                    <i class="fas fa-history"></i>
                                </a>
                            </td>
                        </tr>

                        <!-- Add Stock Modal -->
                        <div class="modal fade" id="addStockModal{{ $product->id }}" tabindex="-1" aria-labelledby="addStockLabel{{ $product->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="{{ route('inventory.addStock', $product->id) }}" method="POST">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addStockLabel{{ $product->id }}">Add Stock for {{ $product->name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="added_stock">Stock Quantity</label>
                                                <input type="number" name="added_stock" id="added_stock" class="form-control" placeholder="Enter stock quantity" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn add-product-btn">Add Stock</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-3 text-center">
            {{ $products->links() }}
        </div>
    </div>
</section>

@endsection
