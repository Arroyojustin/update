<div class="container my-5" id="addstud" style="display: none; max-width: 1040px; position: absolute; top: 20px; right: 56px;">
    <div class="row g-4">
        <!-- Update Students Section -->
        <div class="col-md-8">
            <div class="bg-light rounded-3 px-4 py-4" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;">
                <h5 class="text-gray-800 fw-bold border-bottom border-dark pb-2 mb-3">Update Students</h5>
                <form id="updateStudentForm">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName">
                        </div>
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="middleInitial" class="form-label">Middle Initial</label>
                            <input type="text" class="form-control" id="middleInitial" name="middleInitial">
                        </div>
                        <div class="col-md-4">
                            <label for="studentNumber" class="form-label">Student No.</label>
                            <input type="text" class="form-control" id="studentNumber" name="studentNumber">
                        </div>
                        <div class="col-md-4">
                            <label for="weight" class="form-label">Weight (kg)</label>
                            <input type="number" class="form-control" id="weight" name="weight">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="height" class="form-label">Height (cm)</label>
                            <input type="number" class="form-control" id="height" name="height">
                        </div>
                        <div class="col-md-4">
                            <label for="bmi" class="form-label">BMI</label>
                            <input type="text" class="form-control" id="bmi" name="bmi" disabled>
                        </div>
                        <div class="col-md-4">
                            <label for="bloodType" class="form-label">Blood Type</label>
                            <input type="text" class="form-control" id="bloodType" name="bloodType">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="emergencyContact" class="form-label">In case of Emergency (Phone No.)</label>
                            <input type="text" class="form-control" id="emergencyContact" name="emergencyContact">
                        </div>
                    </div>
                    <h5 class="text-gray-800 fw-bold mt-4">Account Information</h5>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    <div class="text-end">
                    <button type="button" class="btn btn-outline-secondary me-2" onclick="showSection(event, 'student')">Cancel</button>
                    <button type="button" class="btn btn-outline-success" onclick="showSection(event, 'credential')">Add</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Upload Student Lists Section -->
        <div class="col-md-4">
            <div class="bg-light rounded-3 px-4 py-4" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;">
                <h5 class="text-gray-800 fw-bold border-bottom border-dark pb-2 mb-3">Upload Student Lists</h5>
                <div id="dropZone" class="d-flex flex-column justify-content-center align-items-center" 
                     style="border: 2px dashed green; min-height: 150px; padding: 20px; border-radius: 10px;">
                    <i class="fa-solid fa-cloud-arrow-up" style="font-size: 50px; color: green;"></i>
                    <p class="text-gray-800 mt-2">Drag files to upload</p>
                    <input type="file" id="fileInput" accept=".csv" style="display: none;">
                </div>
                <button type="button" id="uploadButton" class="btn btn-success mt-3 w-100">Upload Files</button>
                <button id="exportCSVBtn" class="btn btn-primary mt-2 w-100">Download Excel Template</button>
            </div>
            <!-- Student Container with Search Bar -->
            <div class="bg-light rounded-3 px-4 py-4 mt-4" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;">
                <h5 class="text-gray-800 fw-bold border-bottom border-dark pb-2 mb-3">Students</h5>
                <div class="mb-3">
                    <input type="text" class="form-control" id="searchStudent" placeholder="Search Student...">
                </div>
                <div id="studentList" class="overflow-auto" style="max-height: 200px;">
                    <!-- List of students dynamically rendered here -->
                </div>
            </div>
        </div>
    </div>
</div>
