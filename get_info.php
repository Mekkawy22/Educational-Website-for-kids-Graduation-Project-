<?php
// Include your database connection
include 'db_config.php';

session_start();

// Using prepared statements to prevent SQL injection
$user_id = $_SESSION['user_id']; // Assuming this is how you identify the logged-in user

// Fetch student information
$sql_student = "SELECT * FROM student WHERE user_id = ?";
$stmt_student = $conn->prepare($sql_student);
$stmt_student->bind_param("i", $user_id);
$stmt_student->execute();
$result_student = $stmt_student->get_result();

if ($result_student->num_rows > 0) {
    $row_student = $result_student->fetch_assoc();
    $_SESSION['phoneNum'] = $row_student['phoneNum'];
    $_SESSION['student_fname'] = $row_student['student_fname'];
    $_SESSION['student_lname'] = $row_student['student_lname'];
    $_SESSION['student_ID'] = $row_student['student_ID'];
    $_SESSION['Email'] = $row_student['Email'];
    $_SESSION['plan_of_adge'] = $row_student['plan_of_adge'];
    $_SESSION['GPA'] = $row_student['GPA'];
    $_SESSION['image'] = $row_student['image'];
}

// Fetch teacher information (if applicable)
$sql_teacher = "SELECT * FROM teacher WHERE user_id = ?";
$stmt_teacher = $conn->prepare($sql_teacher);
$stmt_teacher->bind_param("i", $user_id);
$stmt_teacher->execute();
$result_teacher = $stmt_teacher->get_result();

if ($result_teacher->num_rows > 0) {
    $row_teacher = $result_teacher->fetch_assoc();
    $_SESSION['Teacher_ID'] = $row_teacher['Teacher_ID'];
    $_SESSION['teacher_fname'] = $row_teacher['teacher_fname'];
    $_SESSION['teacher_lname'] = $row_teacher['teacher_lname'];
    $_SESSION['Country'] = $row_teacher['Country'];
    $_SESSION['teacher_description'] = $row_teacher['teacher_description'];
    $_SESSION['phoneNum'] = $row_teacher['phoneNum']; // Note: This overwrites student's phoneNum, consider renaming session variable
    $_SESSION['ED_Level'] = $row_teacher['ED_Level'];
    $_SESSION['image'] = $row_teacher['image'];
    $_SESSION['email'] = $row_teacher['email'];
    $_SESSION['Birthday'] = $row_teacher['Birthday'];
}

$stmt_student->close();
$stmt_teacher->close();
$conn->close();
?>
