<?php
session_start();
include './dbconn.php';

// Get the posted data
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Prepare the SQL statement
$stmt = $conn->prepare("SELECT password, user_type FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

// Check if the email exists
if ($stmt->num_rows > 0) {
    $stmt->bind_result($hashedPassword, $userType);
    $stmt->fetch();

    // Verify the password
    if (password_verify($password, $hashedPassword)) {
        $_SESSION['email'] = $email; // Store email in session
        $_SESSION['user_type'] = $userType;

        // Redirect based on user type
        if ($userType == 'admin') {
            header('Location: ../Admin/coordinator.php'); // Updated path for admin
            exit(); // Make sure to exit after header
        } elseif ($userType == 'coordinator') {
            header('Location: ../coordinator/admin.php'); // Updated path for coordinator
            exit(); // Make sure to exit after header
        } else {
            echo 'Invalid user type.'; // Handle unexpected user types
            exit();
        }
    } else {
        echo 'Invalid password.'; // Incorrect password message
    }
} else {
    echo 'Email not registered.'; // Email not found message
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
