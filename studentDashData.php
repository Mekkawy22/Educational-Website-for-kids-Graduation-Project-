<?php
include 'get_info.php';

// Include your database connection
include 'db_config.php';

$student_id = $row_student['student_ID'];
// Query to fetch student's name, task title, and grade
$query1 = "SELECT s.student_fname, s.student_lname, t.Title, sts.grade
           FROM student_task_submission sts
           INNER JOIN task t ON sts.task_id = t.Task_ID
           INNER JOIN student s ON sts.student_ID = s.student_ID
           WHERE s.student_ID = $student_id";

// Execute the first query
$result1 = mysqli_query($conn, $query1);

// Fetch the data into an associative array for the first query
$data1 = [];
while ($row = mysqli_fetch_assoc($result1)) {
    $data1[] = $row;
}

// Query to fetch the courses a student is enrolled in
$query2 = "SELECT course.Course_ID, course.Course_Name, course.Teacher_ID, teacher.teacher_fname
           FROM student_course_registration
           JOIN course ON student_course_registration.Course_ID = course.Course_ID
           JOIN teacher ON course.Teacher_ID = teacher.teacher_id
           WHERE student_course_registration.student_ID = $student_id";

// Execute the second query
$result2 = mysqli_query($conn, $query2);

// Fetch the data into an associative array for the second query
$data2 = [];
while ($row = mysqli_fetch_assoc($result2)) {
    $data2[] = $row;
}

// Combine both results into one array
$combinedData = [
    'tasks' => $data1,
    'courses' => $data2,
];

// Close the connection
mysqli_close($conn);

// Convert PHP array to JSON for JavaScript processing
echo json_encode($combinedData);
?>
