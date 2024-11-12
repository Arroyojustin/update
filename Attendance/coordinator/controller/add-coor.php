<?php
// Correct the path to dbconn.php based on the current file location in `controller`
include '../../Admin/dbconn.php'; // Adjust this path to locate dbconn.php correctly

// Check if form data has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashing the password
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $civil_status = $_POST['civil_status'];

    // Insert new coordinator into the `users` table with `user_type` as 'coordinator'
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, user_type, phone, gender, civil_status) VALUES (?, ?, ?, 'coordinator', ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $email, $password, $phone, $gender, $civil_status);

    if ($stmt->execute()) {
        // Log the action in the history
        $action = "Added";
        $description = " $name has been added with email $email.";
        
        // Prepare the insert statement for history
        $historyStmt = $conn->prepare("INSERT INTO action_history (action, description) VALUES (?, ?)");
        $historyStmt->bind_param("ss", $action, $description);
        $historyStmt->execute();
        $historyStmt->close();

        echo "Coordinator added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
