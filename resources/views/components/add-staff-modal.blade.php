<div class="modal fade" id="addStaffModal" tabindex="-1" aria-labelledby="addStaffModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStaffModalLabel">Add New Staff</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/path-to-your-action" method="POST">
                        <!-- Name Input -->
                        <div class="mb-3">
                            <label for="staffName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="staffName" name="name" required>
                        </div>
                        
                        <!-- Username Input -->
                        <div class="mb-3">
                            <label for="staffUsername" class="form-label">Username</label>
                            <input type="text" class="form-control" id="staffUsername" name="username" required>
                        </div>

                        <!-- Password Input -->
                        <div class="mb-3">
                            <label for="staffPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="staffPassword" name="password" required>
                        </div>

                        <button type="submit" class="btn btn-success">Add Staff</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    