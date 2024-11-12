<div class="container my-5" id="credential" style="display: none; max-width: 1040px; position: absolute; top: 20px; right: 56px;">
    <div class="card shadow p-4">
            <!-- Email Field -->
            <form action="../save_student.php" method="POST" id="studentCredentialForm">
    <!-- Email Field -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <!-- Password Field -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <!-- Retype Password Field -->
                <div class="mb-3">
                    <label for="retype-password" class="form-label">Retype Password</label>
                    <input type="password" class="form-control" id="retype-password" name="retype-password" required>
                    <div id="password-error" class="invalid-feedback">
                        Passwords do not match.
                    </div>
                </div>

                <!-- Add Student Button -->
                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="btn btn-outline-success me-2">Add Student</button>
                    <button type="button" class="btn btn-outline-secondary" onclick="showSection(event, 'addstud')">Previous</button>
                </div>
            </form>
    </div>
</div>

<script>
    // JavaScript to check if passwords match before form submission
    const passwordField = document.getElementById('password');
    const retypePasswordField = document.getElementById('retype-password');
    const form = document.querySelector('form');

    form.addEventListener('submit', function (e) {
    if (passwordField.value !== retypePasswordField.value) {
        e.preventDefault();
        retypePasswordField.classList.add('is-invalid');
    }
});

</script>
