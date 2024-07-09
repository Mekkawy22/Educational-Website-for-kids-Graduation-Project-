<?php
include 'get_info.php';

// Include your database connection
include 'db_config.php';
// Query student counts by country
function getStudentPlacesData($conn) {
    $teacher_id =$_SESSION['Teacher_ID'] ;
    $sql = "SELECT student.Country, COUNT(*) AS StudentCount 
    FROM student
    INNER JOIN student_course_registration ON student.student_ID = student_course_registration.student_ID
    INNER JOIN course ON student_course_registration.Course_ID = course.Course_ID
    WHERE course.Teacher_ID = $teacher_id
    GROUP BY student.Country";
    $result = $conn->query($sql);

    $studentPlacesData = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $studentPlacesData[$row["Country"]] = $row["StudentCount"];
        }
    }

    return $studentPlacesData;
}

// Query course enrollment counts
function getCourseEnrollmentData($conn) {
    $teacher_id =$_SESSION['Teacher_ID'] ;
    $sql = "SELECT c.Course_Name, COUNT(scr.student_ID) AS StudentCount
    FROM course c
    LEFT JOIN student_course_registration scr ON c.Course_ID = scr.Course_ID
    WHERE c.Teacher_ID = $teacher_id
    GROUP BY c.Course_Name";
    $result = $conn->query($sql);

    $courseEnrollmentData = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $courseEnrollmentData[$row["Course_Name"]] = $row["StudentCount"];
        }
    }

    return $courseEnrollmentData;
}

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



$studentPlacesData = getStudentPlacesData($conn);
$courseEnrollmentData = getCourseEnrollmentData($conn);
$totalStudents =gettotalStudents($conn);
$totalTeachers =getTotalTeachers($conn);
$totalCourses =getTotalCourses($conn);

$data = [
    'studentPlaces' => $studentPlacesData,
    'courseEnrollment' => $courseEnrollmentData,
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
