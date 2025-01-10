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

  <section style="background-color: white; border-radius: 1rem;"" class="m-3">

    <div class="dashboard-text container-fluid pl-3">
    <x-error-success-message/>
   <table class="table table-striped">
    <thead>
        <tr class="orders-header">
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
    @forelse ($users as $user)
        <tr class="recent-orders-tr">
            <td>{{ $user->name}}</td>
            <td>{{ $user->email}}</td>
            <td>
                <!-- Edit Button -->
                <a href="#" 
                   class="btn btn-link text-dark p-0 me-2" 
                   title="Edit" 
                   data-bs-toggle="modal" 
                   data-bs-target="#editStaffModal1">
                   <i class="lni lni-pencil me-2" style="pointer-events: none;"></i>
                </a>

                <!-- Delete Button -->
                <form action="{{ route('staff.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE') 
                        <button type="submit" class="btn btn-link text-danger p-0" title="Delete" onclick="return confirm('Are you sure you want to delete this product?')">
                        <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
            </td>

            <!-- Edit Password Modal -->
            <div class="modal fade" id="editStaffModal1" tabindex="-1" aria-labelledby="editStaffModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('staff.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title" id="editStaffModalLabel">Edit Staff Password</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Password Input -->
                                <div class="mb-3">
                                    <label for="newPassword" class="form-label">New Password</label>
                                    <input type="password" 
                                        class="form-control @error('password') is-invalid @enderror" 
                                        id="newPassword" 
                                        name="password" 
                                        required>
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                
                              
                                <div class="mb-3">
                                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                                    <input type="password" 
                                        class="form-control @error('password_confirmation') is-invalid @enderror" 
                                        id="confirmPassword" 
                                        name="password_confirmation" 
                                        required>
                                    @error('password_confirmation')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">No staff found.</td>
            </tr>
        @endforelse

       
    </tbody>
</table>



    </div>
</section>


@endsection