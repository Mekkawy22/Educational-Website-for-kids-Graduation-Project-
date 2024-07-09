<?php
// Database connection settings
include 'db_config.php';

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select the maximum value in the user_id column
$sql = "SELECT MAX(user_id) AS max_user_id FROM account";

// Execute the query
$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    // Fetch the result row
    $row = $result->fetch_assoc();
    
    // Extract the maximum value
    $maxValue = $row['max_user_id'];
    $maxValue= $maxValue+1;
    // Output the maximum value
    
} else {
    echo "Error executing query: " . $conn->error;
}

// Close the connection
$conn->close();

