<!DOCTYPE html>
<html lang="en">
<head>

<?php
   
    @ include 'get_info.php';?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Add this line to include Font Awesome CSS -->
  <link rel="icon" href="img/favicon.png">
  <link rel="stylesheet" href="fontasome/fontawesome-free-6.4.2-web/css/all.min.css">
  <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.css">
  <link rel="stylesheet" href="css/style2.css">

  <title>Student Dashboard</title>
  <!-- Add this line to include Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark  fixed-top" style="background-color:#07294d;">
    <a class="navbar-brand" href="#">
      <img src="img/logo-2.png" alt="Logo" height="30" class="d-inline-block align-top">
    </a>

    

   
          <!-- End Profile dropdown -->
        </li>
      </ul>
    </div>
  </nav>

  <div class="container mt-4">
    <div class="row">
      <div class="col-lg-3">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active" onclick="">Continue Course  </a>
            <a href="studentDach.php" class="list-group-item list-group-item-action" ><i class="fas fa-layer-group"></i>Back to Dashboard</a>
          
          </div>
          
      </div>
      <div class="col-lg-9">
        <div class="card" id="dashboard">

            <section id="corses-singel" class="pt-90 pb-120 gray-bg"style="margin-top:0px; display: block;" >
                <div class="container">

   <?php
// استقبال القيم المرسلة من النموذج
if(isset($_POST['course_id_en']) && isset($_POST['course_name'])) {
    $course_id_en = $_POST['course_id_en'];
    $Course_Name = $_POST['course_name'];

    // يمكنك استخدام $course_id_en و $Course_Name هنا لاتخاذ الإجراءات المناسبة
  
} else {
    // في حالة عدم وجود القيم المرسلة بشكل صحيح
    echo "Error: Data not received.";
}



?>

<?php
include 'db_config.php';
$conn = new mysqli($host, $user, $pass, $db);

$sql_course_info = "SELECT * FROM course WHERE Course_ID = ?";
$stmt_course_info = $conn->prepare($sql_course_info);

if (!$stmt_course_info) {
    die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
}

// Bind the parameter to the statement
$stmt_course_info->bind_param("i", $course_id_en);

// Executing the course information statement
if (!$stmt_course_info->execute()) {
    die("Execute failed: (" . $stmt_course_info->errno . ") " . $stmt_course_info->error);
}

// Getting the result set for course information
$result_course_info = $stmt_course_info->get_result();

// Check if course information is found
if ($result_course_info->num_rows > 0) {
    $row_course_info = $result_course_info->fetch_assoc();
    $course_name = $row_course_info["Course_Name"];
    $course_image = $row_course_info["Course_Image"];
    $course_Description = $row_course_info["Description"];
    $course_level = $row_course_info["Total_Level"];
    $course_link_video = $row_course_info["Intro_Video"];
   
} else {
    echo "No course found with the provided ID.";
}

// Close the statement
$stmt_course_info->close();



?>




<title>Course Details</title>
    
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="corses-singel-left mt-30">
                    <div class="title text-center">
                        <h3 class="course-title"><?php echo $Course_Name ?></h3>
                        <p id="datetime" class="course-details"></p>
                        <p id="country" class="course-details"></p>
                    </div>
                    <?php
$count = 1; // Example count


echo '
<div>
    <div>
        <div>
            <video
                id="video-' . $count . '"
                class="video-js"
                controls
                preload="auto"
                width="640"
                height="264"
                poster="img/play_ok.png"
                data-setup="{}">
                <source src="' . $course_link_video . '" type="video/mp4" />
                <p class="vjs-no-js">
                    To view this video please enable JavaScript, and consider upgrading to a
                    web browser that
                    <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                </p>
            </video>
        </div>
    </div>
</div>';
?>

                </div>
            </div>
        </div>
    </div>

    

    <!-- إضافة مكتبة Bootstrap JavaScript للتفاعلات الإضافية -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
                                 <!-- corses singel image -->
                                
                                <div class="corses-tab mt-30">
                                    <ul class="nav nav-justified" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                                        </li>
                                        <li class="nav-item">
                                            <a id="curriculam-tab" data-toggle="tab" href="#curriculam" role="tab" aria-controls="curriculam" aria-selected="false">Curriculam</a>
                                        </li>
                                        <li class="nav-item">
                                            <a id="instructor-tab" data-toggle="tab" href="#instructor" role="tab" aria-controls="instructor" aria-selected="false">Instructor</a>
                                        </li>
                                        <li class="nav-item">
                                            <a id="Features-tab" data-toggle="tab" href="#Course_Features" role="tab" aria-controls="Course_Features" aria-selected="false">Course Features and Enroll</a>
                                        </li>
                                    </ul>
                                    
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                            <div class="overview-description">
                                                <div class="singel-description pt-40">
                                                    <h6>Course Summery</h6>
                                                    <p><?php echo $course_Description ?> .</p>
                                                </div>
                                                <div class="singel-description pt-40">
                                                    <h6>Requrements</h6>
                                                    <p>Student Level: <?php echo "---> " . $course_level; ?></p>                                                </div>
                                            </div> <!-- overview description -->
                                        </div>
                                        <div class="tab-pane fade" id="curriculam" role="tabpanel" aria-labelledby="curriculam-tab">
                                            <div class="curriculam-cont">
                                                <div class="title">
                                                    
                                                </div>
                                                
                                            
                                                <div class="accordion" id="accordionExample">
                                                    <div class="card">

                                                    <?php

// Database connection settings
include 'db_config.php';
$conn = new mysqli($host, $user, $pass, $db);

// Checking if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    
     
        $sql_lesson_info = "SELECT Lesson_Name ,link_video , Duration , Teacher_ID
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
$count = 0;

$Duration_course=0;
$count = 0;
if ($result_lesson_info->num_rows > 0) {
    while ($row_lesson_info = $result_lesson_info->fetch_assoc()) {
        $count++;
        $link_video = $row_lesson_info["link_video"];
        $Lesson_Name = $row_lesson_info["Lesson_Name"];
        $Teacher_ID = $row_lesson_info["Teacher_ID"];
        $Duration = $row_lesson_info["Duration"];
        $collapseId = "collapse" . $count;
        $headingId = "heading" . $count;
        @$Duration_course =$Duration_course + $Duration ;


        echo '<div class="card">
            <div class="card-header" id="' . $headingId . '">
                <a href="#" data-toggle="collapse" data-target="#' . $collapseId . '" aria-expanded="true" aria-controls="' . $collapseId . '">
                    <ul>
                        <li><i class="fa fa-file-o"></i></li>
                        <li><span class="lecture">Lecture ' . $count . '</span></li>
                        <li><span class="head">' . $Lesson_Name . '</span></li>
                        <li><span class="time d-none d-md-block"><i class="fa fa-clock-o"></i> <span>' . $Duration . '</span></li>
                    </ul>
                </a>
            </div>
            <div id="' . $collapseId . '" class="collapse" aria-labelledby="' . $headingId . '" data-parent="#accordionExample">
                <div class="card-body">
                    
                </div>
            </div>
        </div>';
    }
} else {
    echo '<p class="card-text">No lessons found for this course.</p>';
}

// Ensure the following scripts are included only once in your HTML layout
?>
<head>
    <link href="https://vjs.zencdn.net/8.10.0/video-js.css" rel="stylesheet" />
</head>
<body>
    <script src="https://vjs.zencdn.net/8.10.0/video.min.js"></script>
</body>

<?php
$sql_Teacher_info = "SELECT teacher_fname, teacher_lname, teacher_description FROM teacher WHERE Teacher_ID = ?";
$stmt_Teacher_info = $conn->prepare($sql_Teacher_info);
if (!$stmt_Teacher_info) {
    die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
}
}


// Bind the parameter to the statement
$stmt_Teacher_info->bind_param("i", $Teacher_ID);

// Executing the Teacher information statement
if (!$stmt_Teacher_info->execute()) {
    die("Execute failed: (" . $stmt_Teacher_info->errno . ") " . $stmt_Teacher_info->error);
}

// Getting the result set for Teacher information
$result_Teacher_info = $stmt_Teacher_info->get_result();

// Check if Teacher information is found
if ($result_Teacher_info->num_rows > 0) {
    // Fetch Teacher information
    $row_Teacher_info = $result_Teacher_info->fetch_assoc();
    
    // Print Teacher information inside the card element
    $teacher_name = $row_Teacher_info['teacher_fname'] . ' ' . $row_Teacher_info['teacher_lname'];
    $teacher_description=$row_Teacher_info['teacher_description'];
} else {
    echo '<p class="card-text">No Teachers found for this course.</p>';
}

// Close the result set for Teacher information
$result_Teacher_info->close();


// Closing the prepared statement for enrollment



// Close the result set for lesson information
$result_lesson_info->close();



// Closing the prepared statement for enrollment


// Close the connection
$conn->close();

?>



                                                       
                                                    </div>
                                                    
                                                    
                                                    
                                                </div>
                                            </div> <!-- curriculam cont -->
                                        </div>
                                        <div class="tab-pane fade" id="instructor" role="tabpanel" aria-labelledby="instructor-tab">
                                            <div class="instructor-cont">
                                                <div class="instructor-author">
                                                    <div class="author-thum">
                                                        <img src="img/person_1.jpg" style=" height: 120px;
                                                        width: 100px;"  alt="Instructor">
                                                    </div>
                                                    <div class="author-name">
                                                        <a href="#"><h5><?php  echo $teacher_name ?></h5></a>
                                                        <span><?php  echo  $teacher_description ?></span>
                                                        <ul class="social">
                                                            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="instructor-description pt-25">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus fuga ratione molestiae unde provident quibusdam sunt, doloremque. Error omnis mollitia, ex dolor sequi. Et, quibusdam excepturi. Animi assumenda, consequuntur dolorum odio sit inventore aliquid, optio fugiat alias. Veritatis minima, dicta quam repudiandae repellat non sit, distinctio, impedit, expedita tempora numquam?</p>
                                                </div>
                                            </div> <!-- instructor cont -->
                                        </div>
                                        <div class="tab-pane fade" id="Course_Features" role="tabpanel" aria-labelledby="Features-tab">
                                            <div class="reviews-cont">
                                            <div class="col-lg-12 col-md-6">
                        <div class="course-features mt-30">
                           <h4>Course Features </h4>
                            <ul>
                                <li><i class="fa fa-clock-o"></i>Duaration : <span><?php  echo  $Duration_course  ?> </span></li>
                                <li><i class="fa fa-clone"></i>Leactures : <span><?php  echo  $count  ?></span></li>
                                <li><i class="fa fa-beer"></i>Quizzes :  <span>05</span></li>
                                <li><i class="fa fa-user-o"></i>leve  : <?php  echo  $course_level ?> </li>
                            </ul>
                           

                            <form method="POST" action="reg.php">
    <!-- حقل مخفي لإرسال قيمة course_id_en -->
    <input type="hidden" name="course_id_en" value="<?php echo htmlspecialchars($course_id_en); ?>">

    <!-- استخدم input type="submit" بدلاً من button -->
    <input type="submit" class="main-btn" name="enroll_now" value="Enroll Now">
</form>





                        </div> <!-- course features -->
                    </div>
                                            </div> <!-- reviews cont -->
                                        </div>
                                    </div> <!-- tab content -->
                                </div>
                            </div> <!-- corses singel left -->
                            
                        </div>
                      
                    </div> <!-- row -->
                
                </div> <!-- container -->
            </section>
     
            

        </div>
       
   
            
           
        </section>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="bootstrap-4.3.1-dist/js/jquery-3.7.1.min.js"></script>
  <script src="bootstrap-4.3.1-dist/js/popper.min.js"></script>
  <script src="bootstrap-4.3.1-dist/js/bootstrap.js"></script>
  <script src="js/StudentDash.js"></script>
 
</html>
