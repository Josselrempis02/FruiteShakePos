@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<section class="container-fluid mt-4">
    <div class="row align-items-center justify-content-between">
        <div class="col-md-6 mb-3 mb-md-0">
            <div class="dashboard-text">
                <h1>Add Staff or Admin</h1>
                <h3 class="fs-6 text-muted">Home &gt; Users &gt; Add Staff/Admin</h3>
            </div>
        </div>
        <div class="col-md-6 text-md-end">
            <button type="button" class="btn btn-primary add-product-btn" data-bs-toggle="modal" data-bs-target="#addStaffModal">
            Add Staff or Admin
            </button>
        </div>
    </div>
</section>

<x-add-staff-modal/>

<section class="m-3" style="background-color: white; border-radius: 1rem;">
    <div class="container-fluid">
        <x-error-success-message/>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr class="orders-header">
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr class="recent-orders-tr">
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role->name }}</td>
                            <td>
                                <!-- Edit Button -->
                                <a href="#" 
                                   class="btn btn-link text-dark p-0 me-2" 
                                   title="Edit" 
                                   data-bs-toggle="modal" 
                                   data-bs-target="#editStaffModal{{ $user->id }}">
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
                        </tr>

                        <!-- Edit Password Modal -->
                        <div class="modal fade" id="editStaffModal{{ $user->id }}" tabindex="-1" aria-labelledby="editStaffModalLabel" aria-hidden="true">
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
                                                <label for="newPassword{{ $user->id }}" class="form-label">New Password</label>
                                                <input type="password" 
                                                       class="form-control @error('password') is-invalid @enderror" 
                                                       id="newPassword{{ $user->id }}" 
                                                       name="password" 
                                                       required>
                                                @error('password')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="confirmPassword{{ $user->id }}" class="form-label">Confirm Password</label>
                                                <input type="password" 
                                                       class="form-control @error('password_confirmation') is-invalid @enderror" 
                                                       id="confirmPassword{{ $user->id }}" 
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
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No staff found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
