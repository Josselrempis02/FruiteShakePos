@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<section class="d-flex align-items-center justify-content-between container-fluid mt-4">
<div class="dashboard-text pl-3">
        <h1>Inventory</h1>
        <h3>Home &gt; Inventory</h3>
    </div>

    <div class="custom-button">
        <button class="add-product-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <span class="icon">+</span> ADD NEW INVENTORY
        </button>
    </div>
</section>

  <!-- Modal -->
  <x-add-inventory/>
  <x-edit-inventory-modal/>

  <section style="background-color: white;" class="m-3">
    <div class="dashboard-text container-fluid pl-3">
    <table class="table table-striped">
    <thead>
        <tr class="orders-header">
            <th scope="col">Product</th>
            <th scope="col">Category</th>
            <th scope="col">Stock</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <!-- Replace with actual data -->
        <tr class="recent-orders-tr">
            <td>Product 1</td>
            <td>Category 1</td>
            <td>10</td>
            <td>₱100.00</td>
            <td>
                <!-- Edit Button -->
                <a href="#" 
                   class="btn btn-link text-dark p-0 me-2" 
                   title="Edit" 
                   data-bs-toggle="modal" 
                   data-bs-target="#editProductModal1">
                    <i class="fas fa-edit"></i>
                </a>

                <!-- Delete Button -->
                <button 
                    class="btn btn-link text-danger p-0" 
                    title="Delete" 
                    onclick="confirmDelete(1)">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>
        </tr>
        <!-- Repeat rows for more products -->
    </tbody>
</table>



    </div>
</section>


@endsection