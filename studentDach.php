<!DOCTYPE html>
<html lang="en">
<head>
<?php
    include 'get_info_courses.php'; 
    include 'get_info.php';?>
  <meta charset="UTF-8">
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
   <?php 
                                            @session_start();

                                            if(isset($_SESSION['login']) && $_SESSION['login'] === true){
                                                // Display welcome message 
                                                $username = $_SESSION['user'];
                                            } else {
                                                // Redirect to login page if not logged in
                                                header("Location: login.php"); 
                                                exit; // Ensure script execution stops after redirection
                                            }

                                            if(isset($_POST['logout'])){
                                                // Unset all session variables
                                               @ session_unset();
                                                // Destroy the session
                                              @  session_destroy();
                                                // Redirect to login page using JavaScript
                                                echo '<script>window.location.href = "login.php";</script>';
                                                exit; // Add exit here to stop further execution
                                            }
                                            ?>
  <nav class="navbar navbar-expand-lg navbar-dark  fixed-top" style="background-color:#07294d;">
    <a class="navbar-brand" href="#">
      <img src="img/logo-2.png" alt="Logo" height="30" class="d-inline-block align-top">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
       
        <?php
            // Include database configuration
            'db_config.php';
            $conn = new mysqli($host, $user, $pass, $db);
        // عرض الصوره 
        $student_id1 = $_SESSION['student_ID']; // Get student ID from session
        $sqlph = "SELECT image FROM student WHERE student_ID=$student_id1";
        $resultph = $conn->query($sqlph);
        $rowph = $resultph->fetch_assoc();
        $current_image = $rowph['image'];
        ?>
        <li class="nav-item">
          <!-- Profile dropdown -->
          <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="img/bg_1.jpg" alt="Profile Image" class="profile-image">
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="#" onclick="showStudentProfile()">Profile</a>
              <div class="dropdown-divider"></div>
              <form method='POST'>
                  <button type='submit' class="dropdown-item" data-toggle="modal" data-target="#logoutModal" name='logout'>Logout</button>
            </form>            
            </div>
          </div>
          <!-- End Profile dropdown -->
        </li>
      </ul>
    </div>
  </nav>

  <div class="container mt-4">
    <div class="row">
      <div class="col-lg-3">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active" onclick="showStudentDashboard(this)">Dashboard</a>
            <a href="#" class="list-group-item list-group-item-action" onclick="showStudentCourse(this)"><i class="fas fa-layer-group"></i>My Courses</a>
            <a href="#" class="list-group-item list-group-item-action" onclick="showDiscoverCourse(this)"><i class="fas fa-layer-group"></i>Discover the courses</a>
          </div>
          
      </div>
      
      <div class="col-lg-9">
      <div class="child-container">
                                        <div class="child-welcome-box">
                                            <h2 class="child-welcome-title">Welcome</h2>
                                            <h2 class="child-welcome-title"><?php echo $username; ?></h2>                                            
                                        </div>
                                    </div>
                                    <div class="card" id="dashboard">
          <div class="card-body">
          <h5 class="card-title">ٍStudent Dashboard</h5>
                    <!-- Dashboard content goes here -->
                    <div class="card" id="dashboardContent">
                    <div class="card-body">
                         <div class="row">
                            <div class="col-md-6">
                                <canvas id="tasksChart"  style=" width: 100% !important; height: 300px !important;" ></canvas>
                                <div class="chart-title text-center mt-3">My taskGradesChart</div>
                            </div>
                            <div class="col-md-6">
                                <canvas id="coursesChart" style=" width: 100% !important; height: 300px !important;"></canvas> 
                                <div class="chart-title text-center mt-3">My course completion rate</div>
                            </div>
                        </div>
                     

                    </div>
                    </div>
                    <!-- Recent Activities -->
                    <div class="row">
                     
                        <div class=" mt-4 col-md-12 upcoming-task">
                            <h5 class="card-title">Upcoming tasks</h5>
                            <ul class="list-group">
                            <div class="buttons-1 btn-danger" >
                                <a href="#" onclick="Takequiz()">Quiz2</a>
                            </div>

                            </ul>
                        </div>
                    </div>   
          </div>
        </div>
        <!-- Model Profile -->
        <div class="card" id="profileModal" style="display: none;">
            <div class="modal-dialog modal-lg" role="document">
                
            <div class="modal-content">
                <div class="container emp-profile">

                    <form method="post">
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile-img">
                                    <img  src="uploads/<?php echo $current_image; ?>" alt=""/>
                                  
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="profile-head">
                                            <h5>
                                            <?php
                                            echo $_SESSION['user']
                                            ?>
                                            </h5>
                                            <h6>
                                            <?php
                                                            echo $_SESSION['plan_of_adge'];
                                                            ?>
                                            </h6>
                                            <p class="proile-rating">GPA : <span><?php
                                                            echo $_SESSION['GPA'];
                                                            ?></span></p>
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <a href="#" class="profile-edit-btn" onclick="showStudentEditProfile()" >Edit Profile</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile-work">
                                    <p>SOCIAL LINK</p>
                                    <div class="row sosmed-icon justify-content-center ">
                                        <a href="#" class="fb"><i class="fab fa-facebook"></i></a>
                                        <a href="#" class="tw"><i class="fab fa-twitter"></i></a>
                                        <a href="#" class="ig"><i class="fab fa-instagram"></i></a>
                                        <a href="#" class="in"><i class="fab fa-linkedin"></i></a>
                                    </div>
                                    <p>SKILLS</p>
                                    <a href="">Web Designer</a><br/>
                                    <a href="">Web Developer</a><br/>
                                    <a href="">WordPress</a><br/>
                                    <a href="">WooCommerce</a><br/>
                                    <a href="">PHP</a><br/>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="tab-content profile-tab" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>student Id</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>
                                                            <?php
                                                            echo $_SESSION['student_ID'];
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Name</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?php
                                                            echo $_SESSION['student_fname'] . ' ' . $_SESSION['student_lname'] ;
                                                            ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Email</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?php
                                                            echo $_SESSION['Email'];
                                                            ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Phone</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?php
                                                            echo $_SESSION['phoneNum'];
                                                            ?></p></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Profession</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?php
                                                            echo $_SESSION['plan_of_adge'];
                                                            ?></p>
                                                    </div>
                                                </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <!-- English Level -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>English Level</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <!-- Your Bio -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Your Bio</label><br/>
                                                <p>Your detail description</p>
                                            </div>
                                        </div>
                                        <!-- Courses -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Your Courses</label><br/>
                                                <!-- Assuming courses are stored in a JavaScript array -->
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <div class="course">
                                                            <h5>Course 1</h5>
                                                            <p>Duration: 8 hours</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="course">
                                                            <h5>Course 2</h5>
                                                            <p>Duration: 10 hours</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="course">
                                                            <h5>Course 3</h5>
                                                            <p>Duration: 6 hours</p>
                                                        </div>
                                                    </li>
                                                    <!-- Add more courses as needed -->
                                                </ul>
                                            </div>
                                        </div>
                
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </form>           
                </div>
            </div>
            </div>
        </div>
        <!-- Model Profile -->
        <?php
     
     if(isset($_POST['upload'])){
         $file_name = $_FILES['file']['name'];
         $file_temp = $_FILES['file']['tmp_name'];
         $target_dir = "uploads/";
         move_uploaded_file($file_temp, $target_dir.$file_name);
     
         // تحديث قاعدة البيانات فقط إذا تم تحميل صورة جديدة
         if(!empty($file_name)) {
             $sqlph_update = "UPDATE student SET image='$file_name' WHERE student_ID=$student_id1";
             if ($conn->query($sqlph_update) === TRUE) {
                 
                 // تحديث الصورة الحالية بالصورة الجديدة
                 $current_image = $file_name;
             } else {
                 echo "حدث خطأ أثناء تحميل الصورة: " . $conn->error;
             }
         }
     }
     
     
     
     
     if(isset($_POST['save_changes'])) {
        
         // Check connection
         if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
         }
     
         // Get form data
         $firstName = $_POST['inputFirstName'];
         $lastName = $_POST['inputLastName'];
         $gender = $_POST['inputGender'];
         $country = $_POST['inputCountry'];
         $phoneNumber = $_POST['inputPhone'];
         $birthday = $_POST['inputBirthday'];
         $namefull1 = $firstName . " " . $lastName;
     
         
     
         // Prepare and execute update queries with prepared statements
         $sql_account = "UPDATE account SET User_Name = ? WHERE user_id = ?";
         $sql_student = "UPDATE student SET student_fname = ?, student_lname = ?, Gender = ?, Country = ?, phoneNum = ?, Birthday = ? WHERE user_id = ?";
     
         // Prepare statements
         $stmt_account = $conn->prepare($sql_account);
         $stmt_student = $conn->prepare($sql_student);
     
         // Bind parameters
         $stmt_account->bind_param("ss", $namefull1, $_SESSION['user_id']);
         $stmt_student->bind_param("sssssss", $firstName, $lastName, $gender, $country, $phoneNumber, $birthday, $_SESSION['user_id']);
     
         // Execute statements
         $result_account = $stmt_account->execute();
         $result_student = $stmt_student->execute();
     
         // Check if updates were successful
         if ($result_account && $result_student) {
             $update_message = "Profile updated successfully";
         } else {
             $update_message = "Error updating profile";
             // Log or handle the error appropriately
         }
     
         // Close statements and connection
         $stmt_account->close();
         $stmt_student->close();
         $conn->close();
     }
     ?>
        <div class="card" id="EditprofileModal" style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="container-xl px-4 mt-4">
                <!-- Account page navigation-->
                <nav class="nav nav-borders" id="accountNav">
                    <a class="nav-link active ms-0" href="#" onclick="toggleSection('profile')">Profile</a>
                    <a class="nav-link" href="#" onclick="toggleSection('security')">Security</a>
                </nav>
                <hr class="mt-0 mb-4">

                <div class="col-xl-12" id="profileSection">
                    <!-- Profile picture card... -->
                    <div class="row">
                        <div class="col-xl-4">
                            <!-- Profile picture card-->
                            <div class="card mb-4 mb-xl-0">
    <div class="card-header">صورة الملف الشخصي</div>
    <div class="card-body text-center">
        <!-- Profile picture image -->
        <?php if(!empty($current_image)): ?>
            <img class="img-account-profile rounded-circle mb-2" src="uploads/<?php echo $current_image; ?>" alt="صورة الملف الشخصي">
        <?php else: ?>
            <img class="img-account-profile rounded-circle mb-2" src="img/default_profile.jpg" alt="صورة الملف الشخصي">
        <?php endif; ?>

        <!-- Profile picture help block -->
        <div class="small font-italic text-muted mb-4">JPG أو PNG بحجم لا يتجاوز 5 ميجابايت</div>
        
        <!-- Profile picture upload form -->
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="file" style="display: none;">
            <button class="btn btn-primary" type="button" onclick="document.querySelector('input[name=\'file\']').click();">اختر ملف الصورة</button>
            <button class="btn btn-primary" type="submit" name="upload">تحميل صورة جديدة</button>
        </form>
    </div>
</div>

                        </div>
                        <div class="col-xl-8">
                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card-header">Account Details</div>
                                <div class="card-body">
                                    <form method="POST">
                                        <!-- Form Group (username)-->
                                        <!-- Omitted for brevity -->

                                        <!-- Form Row-->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (first name)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputFirstName">First name</label>
                                                <input class="form-control" name="inputFirstName"  id="inputFirstName" type="text" placeholder="Enter your first name" placeholder="Valerie">
                                            </div>
                                            <!-- Form Group (last name)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputLastName">Last name</label>
                                                <input class="form-control" name="inputLastName" id="inputLastName" type="text" placeholder="Enter your last name" placeholder="Luna">
                                            </div>
                                        </div>
                                        <!-- Form Row -->
                                        <!-- Form Group (Gender)-->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputGender">Gender</label>
                                            <select class="form-select"   name="inputGender" id="inputGender">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                        <!-- Form Row -->
                                        <!-- Form Group (Country)-->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputCountry">Country</label>
                                            <input class="form-control" name="inputCountry" id="inputCountry" type="text" placeholder="Enter your country" placeholder="United States">
                                        </div>
                                        <!-- Form Row -->
                                        <!-- Form Group (LinkedIn)-->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputLinkedIn">LinkedIn</label>
                                            <input class="form-control" id="inputLinkedIn" type="text" placeholder="Enter your LinkedIn profile URL">
                                        </div>
                                        <!-- Form Group (Twitter)-->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputTwitter">Twitter</label>
                                            <input class="form-control" id="inputTwitter" type="text" placeholder="Enter your Twitter profile URL">
                                        </div>
                                        <!-- Form Group (Facebook)-->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputFacebook">Facebook</label>
                                            <input class="form-control" id="inputFacebook" type="text" placeholder="Enter your Facebook profile URL">
                                        </div>
                                        <!-- Form Row -->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (phone number)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputPhone">Phone number</label>
                                                <input class="form-control" name="inputPhone" id="inputPhone" type="tel" placeholder="Enter your phone number" placeholder="555-123-4567">
                                            </div>
                                            <!-- Form Group (birthday)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputBirthday">Birthday</label>
                                                <input class="form-control" id="inputBirthday" type="text" name="inputBirthday" placeholder="Enter your birthday" placeholder="06/10/1988">
                                            </div>
                                        </div>
                                        <!-- Save changes button-->
                                        <button class="btn btn-primary" type="submit" name="save_changes">Save changes</button>

                                        <!-- Display update message if set -->
                                        <?php if(isset($update_message)): ?>
                                            <p><?php echo $update_message; ?></p>
                                        <?php endif; ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <!-- الحقول هنا -->
    <!-- ملاحظة: يجب أن تكون هناك طريقة لتحديد اسم المستخدم (username) للتحديث -->
</form>
            

<?php
// Database connection settings
include 'db_config.php';
$conn = new mysqli($host, $user, $pass, $db);

// Checking if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Using prepared statements to prevent SQL injection
$sql_questions = "SELECT q.Question_ID, q.Question, q.option1, q.option2, q.option3, q.correctAnswer
FROM questions q
JOIN task t ON q.Task_ID = t.Task_ID
JOIN course c ON t.Course_ID = c.Course_ID
WHERE c.Course_ID = '11'";
$stmt_questions = $conn->prepare($sql_questions);

// Check if the statement is prepared successfully
if (!$stmt_questions) {
    die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
}

// Executing the statement
$stmt_questions->execute();

// Getting the result set
$result_questions = $stmt_questions->get_result();

// Initialize an empty array to store questions data
$questions = array();

// Fetching data and storing each row as an associative array in the $questions array
while ($row_question = $result_questions->fetch_assoc()) {
    $questions[] = $row_question;
}

// Closing the prepared statement
$stmt_questions->close();

// Close the connection
$conn->close();
?>

            
       
       <!-- HTML جزء -->
<div class="card" id="Takequiz" style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="container containerr">
                <div class="app">
                    <h1>Simple Quiz</h1>
                    <div class="quiz">
                        <h2 id="question">Question goes here</h2>
                        <div id="answer-buttons">
                            <!-- Answer buttons will be populated dynamically -->
                        </div>
                        <button id="next-btn" class="btn btn-success" style="display: none;" onclick="nextQuestion()">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript جزء -->
<script>
    // Define variables to keep track of current question, score, and selected answers
    let currentQuestion = 0;
    let score = 0;
    let selectedAnswer = null;

    // PHP array containing questions fetched from database
    let questions = <?php echo json_encode($questions); ?>;

    // Function to load questions and options
    function loadQuestion() {
        const questionElement = document.getElementById('question');
        const answerButtons = document.getElementById('answer-buttons');

        // Display current question
        questionElement.innerText = questions[currentQuestion]['Question'];

        // Clear previous answer buttons
        answerButtons.innerHTML = '';

        // Display options as buttons
        for (let i = 1; i <= 3; i++) {
            const option = questions[currentQuestion]['option' + i];
            const button = document.createElement('button');
            button.innerText = option;
            button.classList.add('btn', 'btn-primary');
            button.setAttribute('onclick', `checkAnswer(${i})`);
            answerButtons.appendChild(button);
        }

        // Update selectedAnswer to null for new question
        selectedAnswer = null;
    }

    // Function to check selected answer
    function checkAnswer(optionSelected) {
        const correctAnswer = parseInt(questions[currentQuestion]['correctAnswer']);
        selectedAnswer = optionSelected;

        // Disable answer buttons after selecting one
        const answerButtons = document.querySelectorAll('#answer-buttons button');
        answerButtons.forEach(button => {
            button.disabled = true;
        });

        // Show next button
        const nextButton = document.getElementById('next-btn');
        nextButton.style.display = 'block';
    }

    // Function to load next question
    function nextQuestion() {
        // Increment score if the selected answer is correct
        if (selectedAnswer === parseInt(questions[currentQuestion]['correctAnswer'])) {
            score++;
        }

        // Enable answer buttons for next question
        const answerButtons = document.querySelectorAll('#answer-buttons button');
        answerButtons.forEach(button => {
            button.disabled = false;
        });

        // Hide next button until an answer is selected
        const nextButton = document.getElementById('next-btn');
        nextButton.style.display = 'none';

        // Move to next question or end the quiz
        currentQuestion++;

        if (currentQuestion < questions.length) {
            loadQuestion();
        } else {
            // Display quiz result or completion message
            const quiz = document.querySelector('.quiz');
            quiz.innerHTML = `<h2>Quiz Completed</h2><p>Your Score: ${score} / ${questions.length}</p>`;
        }
    }

    // Load the first question when the page loads
    document.addEventListener('DOMContentLoaded', () => {
        loadQuestion();
    });
</script>

        
        <!-- Modal for Courses  -->
        <div class="card" id="coursesTableModal" style="display: none;">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="row">
                <!-- ... (unchanged) ... -->
                <?php
                include 'courses_enrol.php';

?>
              </div>
            </div>
          </div>
        </div>
      
        <!--take quiz -->
        
        <!--countiuo course-->
        <section id="corses-singel" class="pt-90 pb-120 gray-bg"style="margin-top:0px; display: none;" >
            
            
           
            </section>
           <!-- Modal for Discover Courses -->
            <div class="card" id="DiscoverCourses" style="display: none;">
                <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="row">
                        <?php
    
                         // كل حاجه من get_info_courses.php
    
    
                foreach ($courses as $course) {
                    // Output HTML dynamically for each course
                    echo '<div class="col-md-6">';
                    echo '<div class="card mb-3">';
                    echo '<div class="row no-gutters">';
                    echo '<div class="col-md-4">';
                    echo '<img src="' .$course['Course_Image'] . '" class="card-img" alt="Course Image" style="height: 100%;">';
                    $Course_Name=$course['Course_Name'];
                    $course_id_en=$course['Course_ID'];
                    echo '</div>';
                    echo '<div class="col-md-8">';
                    echo '<div class="card-body">';
                    echo '<h3><a href="#">' . $course['Course_Name'] . '</a></h3>'; // Use course name from the array
                    echo '<p>' . $course['Description'] . '</p>'; // Use course description from the array
                    echo '
                    <form id="courseForm" action="courses_discovery.php" method="post">
                        <input type="hidden" name="course_id_en" value="'.$course_id_en.'">
                        <input type="hidden" name="course_name" value="'.$Course_Name.'">
                        
                        <button class="btn btn-primary btn-block custom-btn" >Learn More</button>
                    </form>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                         }
                
                     ?>
                </div>
            </div>
            
           
            <section id="courseDetail" class="pt-90 pb-120 gray-bg" style="margin-top:0px; display: none;" >
               
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
