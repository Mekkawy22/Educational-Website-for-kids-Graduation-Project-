<?php
// Include database configuration
include 'db_config.php';
include 'userid_max.php';

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If the form is submitted
if (isset($_POST['Sign_Up'])) {
    // Retrieve form data
    // Retrieve form data and filter HTML tags
    $firstName = strip_tags($_POST['first_name']);
    $lastName = strip_tags($_POST['last_name']);
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);
    $userType = strip_tags($_POST['userType']);

    $namefull = $firstName . ' ' . $lastName;

   

    // Insert data into the account table
    $sql1 = "INSERT INTO account (User_Name, email, User_password, UserType)
            VALUES ('$namefull', '$email', '$password', '$userType')";
    
    // Execute SQL query for account table
    if ($conn->query($sql1) === TRUE) {
        echo "New record created successfully for account";
    } else {
        echo "Error: " . $sql1 . "<br>" . $conn->error;
    }

    // Insert data into the appropriate table based on user type
    if ($userType == 'student') {
        $sql2 = "INSERT INTO student (user_id, student_fname, student_lname, Email)
         VALUES ('$maxValue', '$firstName', '$lastName', '$email')";

        // Execute SQL query for student table
        if ($conn->query($sql2) === TRUE) {
            echo "New record created successfully for student";
        } else {
            echo "Error: " . $sql2 . "<br>" . $conn->error;
        }
    } else {
        $sql3 = "INSERT INTO teacher (user_id,teacher_fname, teacher_lname,Email)
                VALUES ('$maxValue','$firstName', '$lastName', '$email')";
        // Execute SQL query for teacher table
        if ($conn->query($sql3) === TRUE) {
            echo "New record created successfully for teacher";
        } else {
            echo "Error: " . $sql3 . "<br>" . $conn->error;
        }
    }
}

// Close connection
$conn->close();

