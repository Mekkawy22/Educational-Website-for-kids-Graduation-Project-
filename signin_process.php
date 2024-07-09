<?php
// Include database configuration
include 'db_config.php';


// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate user credentials
    $sql = "SELECT * FROM account WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify password
        if ($password == $row['User_password']) {
            // Password is correct, start a session
            session_start();

            // Assuming $row is populated from a database query
            $userType = $row['UserType'];

            // Use switch case to handle different user types
            switch ($userType) {
                case 'student':
                    // Set session variables
                    $_SESSION['user'] = $row['User_Name'];
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['login'] = true;

                    // Redirect to student dashboard page
                    header("Location: studentDach.php");
                    exit; // Stop script execution after redirection
                   
                case 'teacher':
                    // Set session variables
                    $_SESSION['user'] = $row['User_Name'];
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['login'] = true;

                    // Redirect to teacher dashboard page
                    header("Location: teacherDash.php");
                    exit; // Stop script execution after redirection
                    
                case 'admin':
                    // Set session variables
                    $_SESSION['user'] = $row['User_Name'];
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['login'] = true;

                    // Redirect to admin dashboard page
                    header("Location: AdminDashboard.php");
                    exit; // Stop script execution after redirection
                    
                default:
                    echo "Invalid user type";
            }
        } else {
            echo "Invalid email or password";
        }
    } else {
        echo "Invalid email or password";
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
