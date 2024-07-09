
<?php
// Database connection information
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'edubin';

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
