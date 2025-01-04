@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<section class="d-flex align-items-center justify-content-between container-fluid mt-4">
<div class="dashboard-text pl-3">
        <h1>Staff</h1>
        <h3>Home &gt; Staff</h3>
    </div>

    <div class="custom-button">
        <button type="button"  class="add-product-btn" data-bs-toggle="modal" data-bs-target="#addStaffModal">
        Add Staff
    </button>

    </div>
</section>

  
  <x-add-staff-modal/>

  <section style="background-color: white;" class="m-3">
    <div class="dashboard-text container-fluid pl-3">
   <table class="table table-striped">
    <thead>
        <tr class="orders-header">
            <th scope="col">Name</th>
            <th scope="col">Username</th>

            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <!-- Replace with dynamic data from your backend -->
        <tr class="recent-orders-tr">
            <td>John Doe</td>
            <td>john.doe</td>
            <td>
                <!-- Edit Button -->
                <a href="#" 
                   class="btn btn-link text-dark p-0 me-2" 
                   title="Edit" 
                   data-bs-toggle="modal" 
                   data-bs-target="#editStaffModal1">
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

        <!-- Repeat rows for more staff members -->
    </tbody>
</table>



    </div>
</section>


@endsection