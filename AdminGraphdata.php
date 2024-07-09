<?php
// Include your database connection
include 'db_config.php';


// Get total counts for students, teachers, and courses
function gettotalStudents($conn) {
    // Query for students
    $studentsQuery = "SELECT COUNT(*) AS total_students FROM student";
    $studentsResult = mysqli_query($conn, $studentsQuery);
    $row = mysqli_fetch_assoc($studentsResult);
    $totalStudents = $row['total_students'];

    return $totalStudents;
}

function getTotalTeachers($conn) {
    // Query for teachers
    $teachersQuery = "SELECT COUNT(*) AS total_teachers FROM teacher";
    $teachersResult = mysqli_query($conn, $teachersQuery);
    $row = mysqli_fetch_assoc($teachersResult);
    $totalTeachers = $row['total_teachers'];

    return $totalTeachers;
}

function getTotalCourses($conn) {
    // Query for courses
    $coursesQuery = "SELECT COUNT(*) AS total_courses FROM course";
    $coursesResult = mysqli_query($conn, $coursesQuery);
    $row = mysqli_fetch_assoc($coursesResult);
    $totalCourses = $row['total_courses'];

    return $totalCourses;
}


$totalStudents =gettotalStudents($conn);
$totalTeachers =getTotalTeachers($conn);
$totalCourses =getTotalCourses($conn);

$data = [
    'totalStudents' => $totalStudents,
    'totalTeachers' => $totalTeachers,
    'totalCourses' => $totalCourses
];

// Output JSON
header('Content-Type: application/json');
echo json_encode($data);

// Close the connection
$conn->close();
?>
