<div class="container-fluid p-0 m-0" id="student" style="display: none;">
    <div class="row mb-3">
        <div class="col-md-3">
            <!-- Sport Selection Dropdown -->
            <select class="form-select" id="sportSelection">
                <option value="basketball">Basketball</option>
                <option value="volleyball">Volleyball</option>
            </select>
        </div>
        
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" id="searchInput" class="form-control" placeholder="Search students by name..." onkeyup="searchStudents()">
            </div>
        </div>

        <div class="col-md-3 text-end">
            <button class="btn btn-outline-success" onclick="showSection(event, 'addstud')">Add Student</button>
        </div>
    </div>

    <!-- Student Table -->
    <table class="table table-bordered table-hover" id="studentTable">
        <thead class="table-light">
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Sample data -->
            <tr>
                <td>John Doe</td>
                <td>Forward</td>
                <td><span class="badge bg-success">Active</span></td>
                <td>
                    <a href="edit_student.php?id=1" class="btn btn-outline-primary btn-sm">Edit</a>
                    <button class="btn btn-outline-danger btn-sm" onclick="deleteStudent(1)">Delete</button>
                </td>
            </tr>
            <tr>
                <td>Jane Smith</td>
                <td>Guard</td>
                <td><span class="badge bg-warning">Inactive</span></td>
                <td>
                    <a href="edit_student.php?id=2" class="btn btn-outline-primary btn-sm">Edit</a>
                    <button class="btn btn-outline-danger btn-sm" onclick="deleteStudent(2)">Delete</button>
                </td>
            </tr>
            <!-- Repeat for other students -->
        </tbody>
    </table>
</div>
