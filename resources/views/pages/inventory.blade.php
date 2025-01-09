@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<section class="d-flex align-items-center justify-content-between container-fluid mt-4 ">
    <div class="dashboard-text pl-3">
            <h1>Inventory</h1>
            <h3>Home &gt; Inventory</h3>
        </div>

    
</section>

  <!-- Modal -->
  <x-add-inventory/>
  <x-edit-inventory-modal/>


  <section style="background-color: white; border-radius: 1rem;" class="m-3">
  <x-error-success-message/>
    <div class="dashboard-text container-fluid pl-3">
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
                <td>{{$product->stock }}</td>
   
                <td>
                    <!-- Add Stock Button -->
                    <button class="btn btn-link text-success p-0 me-2" title="Add Stock" data-bs-toggle="modal" data-bs-target="#addStockModal{{ $product->id }}">
                        <i class="fas fa-plus-circle"></i>
                    </button>

                    <!-- View Stock Logs Button with Tooltip -->
                    <a href="{{ route('inventory.stockLogs', $product->id) }}" 
                    class="btn btn-link text-info p-0 me-2" 
                    data-bs-toggle="tooltip" 
                    data-bs-placement="top" 
                    title="View Stock Logs">
                        <i class="fas fa-history"></i>
                    </a>

                    <!-- Delete Button -->
                    <button 
                        class="btn btn-link text-danger p-0" 
                        title="Delete" 
                        onclick="confirmDelete({{ $product->id }})">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>



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
                    <button type="submit" class="btn btn-primary">Add Stock</button>
                </div>
            </div>
        </form>
    </div>
</div>

        </tr>
        @endforeach
    </tbody>


   

</table>
<!-- Pagination Links -->
<div class="mt-3">
    {{ $products->links() }}
</div>


    </div>
</section>


@endsection