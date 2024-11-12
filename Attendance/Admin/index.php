<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="login-body">
    <div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
        <div class="login-container p-4 position-relative">
            <!-- Loading Spinner -->
            <div id="loadingSpinner" class="position-absolute top-50 start-50 translate-middle d-none">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>

            <form id="loginForm" action="login_process.php" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
                <div class="mb-3 text-end">
                    <a href="#" class="text-primary">Forgot password?</a>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
    <script>
   $(document).ready(function() {
    $('#loginForm').on('submit', function(e) {
        e.preventDefault(); 

        // Show the loading spinner
        $('#loadingSpinner').removeClass('d-none');

        $.ajax({
            type: 'POST',
            url: 'login_process.php',
            data: $(this).serialize(),
            success: function(response) {
                console.log(response); 

                // Hide the loading spinner
                $('#loadingSpinner').addClass('d-none');

                if (response.trim() === 'Login Successful') {
                    // Redirect based on user type
                    const userType = '<?php echo $_SESSION['user_type']; ?>'; // Capture user type from the session
                    let redirectUrl;

                    if (userType === 'admin') {
                        redirectUrl = 'coordinator.php'; // Redirect to admin page
                    } else if (userType === 'coordinator') {
                        redirectUrl = 'admin.php'; // Redirect to coordinator page
                    } else {
                        redirectUrl = 'index.php'; // Default redirect
                    }

                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Logged in successfully',
                        timer: 2000,
                        background: '#ab9f6c',
                        iconcolor: '#a2e7d3',
                        color: '#a155724',
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = redirectUrl; // Redirect to the determined page
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: response.trim(),
                    });
                }
            },
            error: function(xhr, status, error) {
                // Hide the loading spinner
                $('#loadingSpinner').addClass('d-none');
                console.error(xhr); 
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'An error occurred. Please try again.',
                });
            }
        });
    });
});
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
</body>
</html>
