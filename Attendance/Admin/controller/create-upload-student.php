<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include '../dbconn.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
        $file = $_FILES['file'];

        if ($file['error'] !== UPLOAD_ERR_OK) {
            echo json_encode(['error' => 'File upload error']);
            exit;
        }

        $filePath = $file['tmp_name'];
        
        if (($handle = fopen($filePath, "r")) !== FALSE) {
            // Department mapping
            $department_map = [
                'Accountancy' => 1,
                'Business Administration' => 2,
                'Computer Engineering' => 3,
                'Criminology' => 4,
                'Computer Science' => 5,
                'Education' => 6,
                'Hospitality Management' => 7,
                'Information Technology' => 8,
                'Tourism Management' => 9,
            ];

            // Read each row in the CSV file
            $isFirstRow = true;
            while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
                // Skip the header row
                if ($isFirstRow) {
                    $isFirstRow = false;
                    continue;
                }

                // Map columns
                [$last_name, $first_name, $middle_initial, $student_no, $weight, $height, $bmi,
                 $bloodtype, $phone_no, $email, $password,
                 $account_email, $password] = array_map(fn($value) => $conn->real_escape_string(trim($value)), $row);

                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                $user_type = 'student';

                // Check if required fields are present
                if ($last_name && $first_name && $account_email && $password) {
                    // Insert into users table
                    $sql = "INSERT INTO users (last_name, first_name, middle_initial, student_no, weight, height, bmi, bloodtype, phone_no, email, password, user_type) 
                            VALUES ('$last_name', '$first_name', '$middle_initial', '$student_no', '$weight', '$height', '$bmi', '$bloodtype', '$phone_no', '$email', '$password', '$hashed_password', '$user_type')";
            
                    if ($conn->query($sql) === TRUE) {
                        $user_id = $conn->insert_id;
            
                        // Insert into interns table
                    } 
                } else {
                    // Log the problematic row for debugging
                    echo json_encode([
                        'error' => 'Missing required fields for row',
                        'row' => $row
                    ]);
                    exit;
                }
            }
            fclose($handle);
            echo json_encode(['success' => 'Data successfully inserted into the database']);
        } else {
            echo json_encode(['error' => 'Failed to open CSV file']);
            exit;
        }
    }
?>
