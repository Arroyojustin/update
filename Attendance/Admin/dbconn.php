<?php
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // No password
$dbname = "user_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
