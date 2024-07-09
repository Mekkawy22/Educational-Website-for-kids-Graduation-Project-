<?php
// Database connection parameters
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'kidscode';

// Establish connection to the database
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process sign-up form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $User_Name	 = $_POST['SignUpFirstName'];
    $lastName = $_POST['SignUpLastName'];
    $email = $_POST['SignUpEmail'];
    $User_password = $_POST['SignUpPassword'];
    $UserType= $_POST['userType'];

    // Prepare SQL statement to insert data into the database
    $sql = "INSERT INTO 	account ( User_Name, User_password, UserType) 
            VALUES ('$User_Name', '$User_password', '$UserType')";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();

