<?php
include '../../Admin/dbconn.php'; // Include your database connection

if (isset($_POST['id'])) {
    $id = intval($_POST['id']); // Ensure that the ID is an integer

    // Perform the delete operation
    $stmt = $conn->prepare("DELETE FROM action_history WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            echo "Record deleted successfully.";
        } else {
            echo "Error deleting record: " . $stmt->error; // Show specific error from statement
        }
        
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error; // Show error in preparing statement
    }
} else {
    echo "No ID provided.";
}

$conn->close(); // Close the database connection
?>
