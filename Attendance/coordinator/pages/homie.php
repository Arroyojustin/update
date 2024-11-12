<div class="container p-4" id="home" style="display: none;">
    <div class="form-container shadow-sm p-4 rounded" style="border: 1px solid #ddd;">
        <h2 class="mb-4 pb-2 border-bottom">Add Coordinator</h2>
        <form method="POST" action="controller/add-coor.php">
            <div class="row">
                <div class="col-md-6 col-12 mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="col-md-6 col-12 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="col-md-6 col-12 mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="col-md-6 col-12 mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone">
                </div>
                <div class="col-md-6 col-12 mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" id="gender" name="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="col-md-6 col-12 mb-3">
                    <label for="civil_status" class="form-label">Civil Status</label>
                    <select class="form-select" id="civil_status" name="civil_status">
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="divorced">Divorced</option>
                        <option value="widowed">Widowed</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-success mt-3">
                <i class="fas fa-plus me-2"></i> Add Coordinator
            </button>
        </form>
    </div>
</div>
