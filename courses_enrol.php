
<?php


// Database connection settings
include 'db_config.php';
$conn = new mysqli($host, $user, $pass, $db);

// Checking if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Using prepared statements to prevent SQL injection
$sql_enroll = "SELECT Course_ID
               FROM student_course_registration
               WHERE student_ID = ?";
$stmt_enroll = $conn->prepare($sql_enroll);

// Check if the statement is prepared successfully
if (!$stmt_enroll) {
    die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
}

// Bind the parameter to the statement
$student_id = $_SESSION['student_ID']; // Assuming you want to fetch data for student ID 6
$stmt_enroll->bind_param("i", $student_id);

// Executing the statement
if (!$stmt_enroll->execute()) {
    die("Execute failed: (" . $stmt_enroll->errno . ") " . $stmt_enroll->error);
}

// Getting the result set
$result_enroll = $stmt_enroll->get_result();

// Check if there are any rows returned
if ($result_enroll->num_rows > 0) {
    // Loop through each enrolled course and display the card
    while ($row_enroll = $result_enroll->fetch_assoc()) {
        $course_id = $row_enroll["Course_ID"];
       
        
        // Prepare statement for fetching course information
        $sql_course_info = "SELECT Course_Name
                            FROM course
                            WHERE Course_ID = ?";
        $stmt_course_info = $conn->prepare($sql_course_info);
        if (!$stmt_course_info) {
            die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
        }
    
        // Bind the parameter to the statement
        $stmt_course_info->bind_param("i", $course_id);
    
        // Executing the course information statement
        if (!$stmt_course_info->execute()) {
            die("Execute failed: (" . $stmt_course_info->errno . ") " . $stmt_course_info->error);
        }
    
        // Getting the result set for course information
        $result_course_info = $stmt_course_info->get_result();
    
        // Check if course information is found
        if ($result_course_info->num_rows > 0) {
            $row_course_info = $result_course_info->fetch_assoc();
            $course_id_en = $row_enroll["Course_ID"];
       
            // Print course information inside the card element
            echo '
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="img/course-1.jpg" class="card-img" alt="Course Image">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h2 class="card-title">'.$row_course_info["Course_Name"].'</h2>';
                             
        
            // Complete the card element
            echo '
                                <div class="progress-line" style="--bg:rgb(132, 132, 213);--wd:50%;">
                                    <span style="width: 50%; background-color: rgb(132, 132, 213);"></span>
                                </div>
                                <div class="mt-3" style="width: 100px;">';
                                $course_id_en ;
                                $Course_Name=  $row_course_info["Course_Name"];
            // Hidden form with course_id value
            echo '
            <form id="courseForm" action="coursesview.php" method="post">
                <input type="hidden" name="course_id_en" value="'.$course_id_en.'">
                <input type="hidden" name="course_name" value="'.$Course_Name.'">
                <button class="btn btn-primary btn-block custom-btn" onclick="showSingleCours()">Continue</button>
            </form>';
        
            // Display additional course information (you can replace this with your desired data)
            echo '
                                    <div id="courseInfo'.$course_id.'" style="display:none;">
                                        <!-- قم بعرض المعلومات الإضافية للدورة هنا -->
                                    </div>';
        
            echo '
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        
        
    
    
        
        $sql_lesson_info = "SELECT Lesson_Name
        FROM lesson
        WHERE Course_ID = ?";
$stmt_lesson_info = $conn->prepare($sql_lesson_info);
if (!$stmt_lesson_info) {
die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
}

// Bind the parameter to the statement
$stmt_lesson_info->bind_param("i", $course_id_en);

// Executing the lesson information statement
if (!$stmt_lesson_info->execute()) {
die("Execute failed: (" . $stmt_lesson_info->errno . ") " . $stmt_lesson_info->error);
}

// Getting the result set for lesson information
$result_lesson_info = $stmt_lesson_info->get_result();

// Check if lesson information is found
if ($result_lesson_info->num_rows > 0) {
// Print lesson information inside the card element
while ($row_lesson_info = $result_lesson_info->fetch_assoc()) {

////lesson info
}
echo '<p>'; // فتح علامة <p> بدلاً من </p>
} else {
echo '<p class="card-text">No lessons found for this course.</p>';
}

// Close the result set for lesson information
$result_lesson_info->close();


            // Here's the corrected embedded HTML section
        
        }
        
        // Close the result set for course information
        $result_course_info->close();
    }
} else {
    // If no rows are returned, print a message indicating so
    echo "No courses found for this student.";
}

// Closing the prepared statement for enrollment
$stmt_enroll->close();

// Close the connection
$conn->close();

?>
