<?php
// Database credentials
$servername = "127.0.0.1";
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password if set
$dbname = "db_tickets";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve input data
$student_number = isset($_POST['student_number']) ? trim($_POST['student_number']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';

// Convert input values to lowercase
$student_number = strtolower($student_number);
$email = strtolower($email);

// Check if required fields are empty
if (empty($student_number) || empty($email)) {
    echo 'error'; // Consider returning a more specific error message
    exit; // Exit script if required fields are empty
}

// Prepare query to check if the student exists (case-insensitive comparison)
$query = "SELECT * FROM students WHERE LOWER(student_number) = LOWER(?) AND LOWER(email) = LOWER(?)";
$stmt = $conn->prepare($query);

if ($stmt === false) {
    echo 'error'; // Handle prepare statement failure
    exit;
}

$stmt->bind_param("ss", $student_number, $email);

// Execute the statement
if ($stmt->execute()) {
    // Get the result
    $result = $stmt->get_result();
    
    // Check if any rows are returned
    if ($result->num_rows > 0) {
        // Student exists
        echo 'exists';
    } else {
        // Student does not exist
        echo 'not_exists';
    }
} else {
    // Error executing the statement
    echo 'error'; // Consider logging the error for debugging
}

// Close the database connection
$stmt->close();
$conn->close();
?>
