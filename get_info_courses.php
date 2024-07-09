<?php
// Database connection settings
include 'db_config.php';
$conn = new mysqli($host, $user, $pass, $db);

// Checking if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Using prepared statements to prevent SQL injection
$sql_course = "SELECT * FROM course";
$stmt_course = $conn->prepare($sql_course);

// Check if the statement is prepared successfully
if (!$stmt_course) {
    die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
}

// Executing the statement
$stmt_course->execute();

// Getting the result set
$result_course = $stmt_course->get_result();

// Initialize an empty array to store course data
$courses = array();

// Fetching data and storing each row as an associative array in the $courses array

while ($row_course = $result_course->fetch_assoc()) {
    $courses[] = $row_course;
}

// Closing the prepared statement
$stmt_course->close();

// Close the connection
$conn->close();

// Loop through the $courses array to display each course dynamically
