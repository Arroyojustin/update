<?php
include '../dbconn.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Student info from the first form (add_student.php)
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $mi = mysqli_real_escape_string($conn, $_POST['mi']);
    $student_no = mysqli_real_escape_string($conn, $_POST['student_no']);
    $weight = mysqli_real_escape_string($conn, $_POST['weight']);
    $height = mysqli_real_escape_string($conn, $_POST['height']);
    $bmi = mysqli_real_escape_string($conn, $_POST['bmi']);
    $bloodtype = mysqli_real_escape_string($conn, $_POST['bloodtype']);
    $sport = mysqli_real_escape_string($conn, $_POST['sport']);

    // Account info from the second form (student-cred.php)
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $retype_password = mysqli_real_escape_string($conn, $_POST['retype-password']);

    // Password match check
    if ($password !== $retype_password) {
        echo "Passwords do not match!";
        exit;
    }

    // Hash password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Start a transaction to ensure both inserts are successful
    $conn->begin_transaction();

    try {
        // Insert student info into the 'students' table
        $studentQuery = "INSERT INTO students (firstname, lastname, mi, student_no, weight, height, bmi, bloodtype, sport) 
                         VALUES ('$firstname', '$lastname', '$mi', '$student_no', '$weight', '$height', '$bmi', '$bloodtype', '$sport')";
        if (!$conn->query($studentQuery)) {
            throw new Exception("Error inserting student: " . $conn->error);
        }

        // Get the last inserted student ID
        $student_id = $conn->insert_id;

        // Insert user info into the 'users' table
        $userQuery = "INSERT INTO users (email, password, student_id, user_type) 
                      VALUES ('$email', '$hashed_password', '$student_id', 'student')";
        if (!$conn->query($userQuery)) {
            throw new Exception("Error inserting user: " . $conn->error);
        }

        // Commit the transaction
        $conn->commit();

        // Success message
        echo "Student and account created successfully!";
    } catch (Exception $e) {
        // Rollback the transaction if anything goes wrong
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
}
?>
