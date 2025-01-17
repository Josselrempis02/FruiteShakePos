<div class="modal fade" id="addStaffModal" tabindex="-1" aria-labelledby="addStaffModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStaffModalLabel">Add New Staff</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="{{ route('staff.store') }}" method="POST">
                    @csrf
                    <!-- Name Input -->
                    <div class="mb-3">
                        <label for="staffName" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="staffName" name="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Email Input -->
                    <div class="mb-3">
                        <label for="staffEmail" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="staffEmail" name="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div class="mb-3">
                        <label for="staffPassword" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="staffPassword" name="password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Role Dropdown -->
                    <div class="mb-3">
                        <label for="staffRole" class="form-label">Role</label>
                        <select class="form-select @error('role_id') is-invalid @enderror" id="staffRole" name="role_id">
                            <option value="" selected disabled>Choose a role</option>
                            <option value="2" {{ old('role_id') == 2 ? 'selected' : '' }}>Admin</option>
                            <option value="3" {{ old('role_id') == 3 ? 'selected' : '' }}>Staff</option>
                        </select>
                        @error('role_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">Add Staff</button>
                </form>



                </div>
            </div>
        </div>
    </div>

    