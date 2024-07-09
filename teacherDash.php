<!DOCTYPE html>
<html lang="en">
<head>
<?php
    include 'get_info_courses.php';
    include 'get_info.php'; ?>
         <?php
       // Include database configuration
    include 'db_config.php';
    $conn = new mysqli($host, $user, $pass, $db);
// عرض الصوره 
$user_id_tea =$_SESSION['user_id']; // Get student ID from session
$sqlph = "SELECT image FROM teacher WHERE user_id=$user_id_tea";
$resultph = $conn->query($sqlph);
$rowph = $resultph->fetch_assoc();
$current_image = $rowph['image'];
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Add this line to include Font Awesome CSS -->
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="fontasome/fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/style2.css">
    <title>Teacher Dashboard</title>
    <!-- Add this line to include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<?php 
                                       @     session_start();

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
    <nav class="navbar navbar-expand-lg navbar-dark  fixed-top" style="background-color: #07294d;">
        <a class="navbar-brand" href="#">
        <img src="img/logo-2.png" alt="Logo" height="30" class="d-inline-block align-top">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
           

            <li class="nav-item">
            <!-- Profile dropdown -->
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="uploads/<?php echo $current_image; ?>" alt="Profile Image" class="profile-image">
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="#" onclick="showTeacherProfile()">Profile</a>
                <div class="dropdown-divider"></div>
                <form  method="post">
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
                <a href="#" class="list-group-item list-group-item-action active" onclick=" showTeacherDashboard(this) ">Dashboard</a>
                <a href="#" class="list-group-item list-group-item-action" onclick="showTeacherAddCourse(this)">
                    <i class="fas fa-plus"></i> Add Course
                </a>
                <a href="#" class="list-group-item list-group-item-action" onclick="showTeacherAddLesson(this)">
                    <i class="fas fa-plus"></i> Add Lesson
                </a>
                <a href="#" class="list-group-item list-group-item-action" onclick="showTeacherAddQuiz(this)">
                    <i class="fas fa-tasks"></i> Add Task
                </a>
                <a href="#" class="list-group-item list-group-item-action" onclick="showTeacherEnrollmentsTable(this)">
                    <i class="fas fa-list-alt"></i> Show Enrollments Table
                </a>
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
                    <h5 class="card-title">Teacher Dashboard</h5>
                    <!-- Dashboard content goes here -->
                    <div class="card" id="dashboardContent">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <canvas id="studentsBarChart" width="200" height="200"></canvas>
                                    <div class="chart-title text-center mt-3">Student Places</div>
                                </div>

                                <div class="col-md-6">
                                    <canvas id="coursesBarChart" width="200" height="200"></canvas>
                                    <div class="chart-title text-center mt-3">Each Course Has a Number of Students</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Recent Course Enrollments -->
                    <div class="mt-4">
                        <h5 class="card-title">Recent Course Enrollments</h5>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <span class="badge badge-info mr-2"><i class="fas fa-user"></i></span>
                                Student Jane Smith enrolled in "Web Development Fundamentals" on 2023-02-18.
                            </li>
                            <li class="list-group-item">
                                <span class="badge badge-info mr-2"><i class="fas fa-user"></i></span>
                                Student Mike Johnson enrolled in "Machine Learning Basics" on 2023-02-17.
                            </li>
                            <!-- Add more recent course enrollments -->
                        </ul>
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
                                    <img src="uploads/<?php echo $current_image; ?>" alt=""/>
                                   
                                </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="profile-head">
                                                    <h5>
                                                    <?php
                                                            echo $_SESSION['teacher_fname']. " " .$_SESSION['teacher_lname'] ;
                                                            ?>
                                                    </h5>
                                                    <h6>
                                                        Web Developer and Designer
                                                    </h6>
                                                    <p class="profile-rating">Rating:
                                                        <span>
                                                            &#9733;&#9733;&#9733;&#9734;&#9734; <!-- تقييم بثلاث نجوم من خمس -->
                                                        </span>
                                                    </p>
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
                                        <a href="#" class="profile-edit-btn" onclick="showTeacherEditProfile()">Edit Profile</a>
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
                                            <a href="">PHP, laravel</a><br/>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="tab-content profile-tab" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <div class="row">
                                                    <div class="col-md-6">
                                                        <label>User Id</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?php
                                                            echo $_SESSION['Teacher_ID'];
                                                            ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Name</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?php
                                                            echo $_SESSION['teacher_fname']. " " .$_SESSION['teacher_lname'] ;
                                                            ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Email</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?php
                                                            echo $_SESSION['email'];
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
                                                            ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Profession</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?php
                                                            echo $_SESSION['ED_Level'];
                                                            ?></p>
                                                    </div>
                                                </div>
                                    </div>
                                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                <!-- Experience -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Experience</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>Expert</p>
                                                    </div>
                                                </div>
                                                <!-- Hourly Rate -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Hourly Rate</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>10$/hr</p>
                                                    </div>
                                                </div>
                                                <!-- Total Projects -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Total Projects</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>230</p>
                                                    </div>
                                                </div>
                                                <!-- English Level -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>English Level</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>Expert</p>
                                                    </div>
                                                </div>
                                                <!-- Availability -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Availability</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>6 months</p>
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
// Assuming $conn is your database connection

// Initialize $current_image variable to avoid undefined variable notice


if(isset($_POST['upload'])){
    $file_name = $_FILES['file2']['name'];
    $file_temp = $_FILES['file2']['tmp_name'];
    $target_dir = "uploads/";
    move_uploaded_file($file_temp, $target_dir.$file_name);
    
    // تحديث قاعدة البيانات فقط إذا تم تحميل صورة جديدة
    if(!empty($file_name)) {
        // Assuming $teacher_id1 is defined elsewhere in your code
        $sqlph_update = "UPDATE teacher SET image=? WHERE user_id=?";
        $stmt = $conn->prepare($sqlph_update);
        $stmt->bind_param("si", $file_name, $user_id_tea);
        if ($stmt->execute()) {
            // تحديث الصورة الحالية بالصورة الجديدة
            $current_image = $file_name;
        } else {
            echo "حدث خطأ أثناء تحميل الصورة: " . $conn->error;
        }
        $stmt->close();
    }
}



if(isset($_POST['save_changes'])) {
    // Assuming $_SESSION['user_id'] contains the user's ID
    $firstName = $_POST['inputFirstName'];
    $lastName = $_POST['inputLastName'];
    $teacher_description = $_POST['teacher_description'];
    $country = $_POST['inputCountry'];
    $phoneNumber = $_POST['inputPhone'];
    $ED_Level=$_POST['ED_Level'];
    $birthday = $_POST['inputBirthday'];
    $namefull1 = $firstName . " " . $lastName;

    // Prepare and execute update queries with prepared statements
    $sql_account = "UPDATE account SET User_Name = ? WHERE user_id = ?";
    $sql_teacher = "UPDATE teacher SET teacher_fname = ?, teacher_lname = ?, teacher_description = ?, Country = ?, phoneNum = ?, Birthday = ? , ED_Level = ? WHERE user_id = ?";

    // Prepare statements
    $stmt_account = $conn->prepare($sql_account);
    $stmt_teacher = $conn->prepare($sql_teacher);

    // Bind parameters
    $stmt_account->bind_param("si", $namefull1, $user_id_tea);
    $stmt_teacher->bind_param("sssssssi", $firstName, $lastName, $teacher_description, $country, $phoneNumber, $birthday,$ED_Level, $user_id_tea);

    // Execute statements
    $result_account = $stmt_account->execute();
    $result_teacher = $stmt_teacher->execute();

    // Check if updates were successful
    if ($result_account && $result_teacher) {
        $update_message = "Profile updated successfully";
    } else {
        $update_message = "Error updating profile";
        // Log or handle the error appropriately
    }

    // Close statements
    $stmt_account->close();
    $stmt_teacher->close();
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
                                                <div class="card-header">Profile Picture</div>
                                                <div class="card-body text-center">
                                                    <!-- Profile picture image-->
                                                    <?php if(!empty($current_image) && file_exists("uploads/$current_image")): ?>
        <img class="img-account-profile rounded-circle mb-2" src="uploads/<?php echo $current_image; ?>" alt="صورة الملف الشخصي">
    <?php else: ?>
        <img class="img-account-profile rounded-circle mb-2" src="img/person_4.jpg" alt="صورة الملف الشخصي">
    <?php endif; ?>

    <!-- Profile picture help block -->
    <div class="small font-italic text-muted mb-4">JPG أو PNG بحجم لا يتجاوز 5 ميجابايت</div>

    <!-- Profile picture upload form -->
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="file2" style="display: none;">
        <button class="btn btn-primary" type="button" onclick="document.querySelector('input[name=\'file2\']').click();">اختر ملف الصورة</button>
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
                                                       
                                                        <!-- Form Row-->
                                                        <div class="row gx-3 mb-3">
                                                           <!-- Form Group (first name)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputFirstName">First name</label>
                                                <input class="form-control" name="inputFirstName"  id="inputFirstName" type="text" placeholder="Enter your first name" value="<?php echo isset($firstName) ? $firstName : ''; ?>">
                                            </div>
                                            <!-- Form Group (last name)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputLastName">Last name</label>
                                                <input class="form-control" name="inputLastName" id="inputLastName" type="text" placeholder="Enter your last name" value="<?php echo isset($lastName) ? $lastName : ''; ?>">
                                            </div>
                                        </div>
                                                     
                                                        <!-- Form Row -->
                                        <!-- Form Group (Country)-->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputCountry">Country</label>
                                            <input class="form-control" name="inputCountry" id="inputCountry" type="text" placeholder="Enter your country" value="<?php echo isset($country) ? $country : ''; ?>">
                                        </div>
                                                         <!-- Form Row -->
                                        <!-- Form Group (LinkedIn)-->
                                       <div class="mb-3">
                                            <label class="small mb-1" for="teacher_description">teacher_description</label>
                                            <input class="form-control" id="teacher_description" type="text" name="teacher_description" placeholder="Enter your teacher_description" value="">
                                        </div>

                                        <!-- Form Group (Facebook)-->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="ED_Level">ED_Level</label>
                                            <input class="form-control" id="ED_Level" type="text" name="ED_Level" placeholder="Enter yourED_Level">
                                        </div>
                                        <!-- Form Row -->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (phone number)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputPhone">Phone number</label>
                                                <input class="form-control" name="inputPhone" id="inputPhone" type="tel" placeholder="Enter your phone number" value="<?php echo isset($phoneNumber) ? $phoneNumber : ''; ?>">
                                            </div>
                                            <!-- Form Group (birthday)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputBirthday">Birthday</label>
                                                <input class="form-control" id="inputBirthday" type="text" name="inputBirthday" placeholder="Enter your birthday" value="<?php echo isset($birthday) ? $birthday : ''; ?>">
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
                                    <!-- Your profile section content goes here -->
                                </div>
            
                                <div class="col-xl-12" id="securitySection" style="display: none;">
                                    <!-- Account details card... -->
                                    <hr class="mt-0 mb-4">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <!-- Change password card-->
                                            <div class="card mb-4">
                                                <div class="card-header">Change Password</div>
                                                <div class="card-body">
                                                    <form>
                                                        <!-- Form Group (current password)-->
                                                        <div class="mb-3">
                                                            <label class="small mb-1" for="currentPassword">Current Password</label>
                                                            <input class="form-control" id="currentPassword" type="password" placeholder="Enter current password">
                                                        </div>
                                                        <!-- Form Group (new password)-->
                                                        <div class="mb-3">
                                                            <label class="small mb-1" for="newPassword">New Password</label>
                                                            <input class="form-control" id="newPassword" type="password" placeholder="Enter new password">
                                                        </div>
                                                        <!-- Form Group (confirm password)-->
                                                        <div class="mb-3">
                                                            <label class="small mb-1" for="confirmPassword">Confirm Password</label>
                                                            <input class="form-control" id="confirmPassword" type="password" placeholder="Confirm new password">
                                                        </div>
                                                        <button class="btn btn-primary" type="button">Save</button>
                                                    </form>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-12">
                                            <!-- Two factor authentication card-->
                                            <div class="card mb-4">
                                                <div class="card-header">Two-Factor Authentication</div>
                                                <div class="card-body">
                                                    <p>Add another level of security to your account by enabling two-factor authentication. We will send you a text message to verify your login attempts on unrecognized devices and browsers.</p>
                                                    <form>
                                                        <div class="form-check">
                                                            <input class="form-check-input" id="twoFactorOn" type="radio" name="twoFactor" checked="">
                                                            <label class="form-check-label" for="twoFactorOn">On</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" id="twoFactorOff" type="radio" name="twoFactor">
                                                            <label class="form-check-label" for="twoFactorOff">Off</label>
                                                        </div>
                                                        <div class="mt-3">
                                                            <label class="small mb-1" for="twoFactorSMS">SMS Number</label>
                                                            <input class="form-control" id="twoFactorSMS" type="tel" placeholder="Enter a phone number" value="555-123-4567">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- Delete account card-->
                                            <div class="card mb-4">
                                                <div class="card-header">Delete Account</div>
                                                <div class="card-body">
                                                    <p>Deleting your account is a permanent action and cannot be undone. If you are sure you want to delete your account, select the button below.</p>
                                                    <button class="btn btn-danger-soft text-danger" type="button">I understand, delete my account</button>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- Your security section content goes here -->
                                </div>
                            
                    </div>
                </div>
                    
                    </div>
                    </div>
                </div>
        
                <!-- Modal for Courses Table -->
                <div class="card" id="coursesTableModal" style="display: none;">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <div class="row">
                        <!-- ... (unchanged) ... -->
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="img/course-1.jpg" class="card-img" alt="Course Image">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h2 class="card-title">Course Name</h2>
                                            <p class="card-text">Lesson 3:7</p>
                                            
                                            <div class="mt-3" style="width: 100px;">
                                                <a href="#" class="btn btn-block  custom-btn"  onclick="showSingleCourse()" style="background-color: rgb(107 191 97); ">Manage</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="img/course-1.jpg" class="card-img" alt="Course Image">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h2 class="card-title">Course Name</h2>
                                            <p class="card-text">Lesson 3:7</p>
                                            <div class="mt-3" style=" width: 100px; ">
                                                <a href="#16C3B0" onclick="showSingleCourse()" class="btn btn-primary btn-block custom-btn" >Manage</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="img/course-1.jpg" class="card-img" alt="Course Image">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h2 class="card-title">Course Name</h2>
                                            <p class="card-text">Lesson 3:7</p>  
                                            <div class="mt-3" style=" width: 100px;">
                                                <a href="#" onclick="showSingleCourse()" class="btn btn-primary btn-block  custom-btn">Manage</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="img/course-1.jpg" class="card-img" alt="Course Image">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h2 class="card-title">Course Name</h2>
                                            <p class="card-text">Lesson 3:7</p>
                                            <div class="mt-3" style=" width: 100px;">
                                                <a href="#" onclick="showSingleCourse()" class="btn btn-primary btn-block  custom-btn">Manage</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <!-- Modal for add course -->
                <?php
// تحقق مما إذا تم النقر على زر إرسال النموذج
if(isset($_POST['add_course'])) {
    // انشاء اتصال بقاعدة البيانات
    $conn = new mysqli($host, $user, $pass, $db);

    // التحقق من وجود اتصال صحيح
    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // استقبال البيانات من النموذج
    $Course_Name = $_POST['Course_Name'];
    $Total_Level = $_POST['Total_Level'];
    $Description = $_POST['Description'];
    $Start_Time = $_POST['Start_Time'];
    $End_Time = $_POST['End_Time'];
    $Date_of_Create = $_POST['Date_of_Create'];

    // استقبال اسم الملف وحفظه في المتغير
    $file_namec = $_FILES['uploadfilec']['name'];

    // مسار حفظ الملفات المرفوعة
    $target_dir = "uploads/";

    // حفظ الملف في المسار المحدد
    $target_file = $target_dir . basename($_FILES["uploadfilec"]["name"]);
    move_uploaded_file($_FILES["uploadfilec"]["tmp_name"], $target_file);
    $Teacher_ID=$_SESSION['Teacher_ID'];
    // استعداد الاستعلام لحفظ البيانات في قاعدة البيانات
    $sqlc = "INSERT INTO course (Teacher_ID,Course_Name, Total_Level, Description, Start_Time, End_Time, Date_of_Create, Course_Image)
            VALUES ('$Teacher_ID','$Course_Name', '$Total_Level', '$Description', '$Start_Time', '$End_Time', '$Date_of_Create', '$file_namec')";

    // تنفيذ الاستعلام والتحقق من نجاحه
    if($conn->query($sqlc) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sqlc . "<br>" . $conn->error;
    }

    // إغلاق الاتصال بقاعدة البيانات
    $conn->close();
}
?>
                <div class="card" id="AddCourse" style="display: none;">
                    <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <!-- Form content for adding a course -->
                        <form method="post" enctype="multipart/form-data">
                <a href="teacherDash.php" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
                <div class="one">
                    <div class="i">
                        <p>Preview</p>
                        <img id="previewImage" src="img/bg_2.jpg" alt="Preview Image">
                    </div>

                    <div class="ii">
    <label for="uploadfilec" class="btn btn-primary">
        Choose File
        <input type="file" name="uploadfilec" id="uploadfilec" style="display: none;" onchange="previewFile()">
    </label>
</div>
                </div>
                <div class="mb-3">
                    <label for="Course_Name" class="form-label">Course_Name</label>
                    <input type="text" class="form-control" id="Course_Name" name="Course_Name" placeholder="Enter course title" required>
                </div>
                <div class="mb-3">
                    <label for="Total_Level" class="form-label">Total_Level</label>
                    <input type="text" class="form-control" id="Total_Level" name="Total_Level" placeholder="Enter Total_Level" required>
                </div>
                <div class="mb-3">
                    <label for="Description" class="form-label">Description</label>
                    <textarea class="form-control" id="Description" name="Description" placeholder="Enter course Description" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="Start_Time" class="form-label">Start_Time</label>
                    <input type="date" class="form-control" id="Start_Time" name="Start_Time" placeholder="Enter course Start_Time" required>
                </div>
                <div class="mb-3">
                    <label for="End_Time" class="form-label">End_Time</label>
                    <input type="date" class="form-control" id="End_Time" name="End_Time" placeholder="Enter courseEnd_Time" required>
                </div>
                <div class="mb-3">
                    <label for="Date_of_Create" class="form-label">Date_of_Create</label>
                    <input type="date" class="form-control" id="Date_of_Create" name="Date_of_Create" placeholder="Enter course Date_of_Create" required>
                </div>
                
                <button type="submit" class="btn btn-primary" name="add_course">Add Course</button>
            </form>
                    </div>
                    </div>
                </div>
                <!-- Modal for add lessson -->
                <?php
// التحقق من أن النموذج تم إرساله
if (isset($_POST['add_lesson'])) {
    // تضمين ملف التكوين للاتصال بقاعدة البيانات
    include 'db_config.php';

    // إنشاء اتصال بقاعدة البيانات
    $conn = new mysqli($host, $user, $pass, $db);

    // التحقق من أن الاتصال ناجح
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // استقبال البيانات من النموذج
    $course_id = $_POST['select_course'];
    $lesson_name = $_POST['Lesson_Name'];
    $lesson_duration = $_POST['lessonDuration'];
    $upload_date = $_POST['Upload_Date'];
    $Teacher_ID = $_SESSION['Teacher_ID']; // تأكد من بدء الجلسة وتحديد معرف المعلم

    // التحقق من أن الملف قد تم تحميله بدون أخطاء
    if (isset($_FILES['video_file']) && $_FILES['video_file']['error'] == 0) {
        $videoDir = 'videos/';
        $videoFile = $videoDir . basename($_FILES['video_file']['name']);
        $uploadOk = 1;
        $videoFileType = strtolower(pathinfo($videoFile, PATHINFO_EXTENSION));

        // التحقق مما إذا كان الملف هو فيديو
        $validExtensions = array("mp4", "webm", "ogg");
        if (!in_array($videoFileType, $validExtensions)) {
            echo "Sorry, only MP4, WEBM & OGG files are allowed.";
            $uploadOk = 0;
        }

        // التحقق مما إذا كان $uploadOk هو 0 بسبب خطأ
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // محاولة تحميل الملف
            if (move_uploaded_file($_FILES['video_file']['tmp_name'], $videoFile)) {
                echo "The file " . htmlspecialchars(basename($_FILES['video_file']['name'])) . " has been uploaded.";

                // استعداد الاستعلام لحفظ البيانات في قاعدة البيانات
                $sqll = "INSERT INTO lesson (Course_ID, Teacher_ID, Lesson_Name, Duration, Link_Video, Upload_Date)
                        VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sqll);
                if (!$stmt) {
                    die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
                }
                $stmt->bind_param("iissss", $course_id, $Teacher_ID, $lesson_name, $lesson_duration, $videoFile, $upload_date);

                // تنفيذ الاستعلام والتحقق من نجاحه
                if ($stmt->execute()) {
                    echo "New lesson created successfully";
                } else {
                    echo "Error: " . $sqll . "<br>" . $conn->error;
                }

                $stmt->close();
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "No file was uploaded or there was an error uploading the file.";
    }

    // إغلاق الاتصال بقاعدة البيانات
    $conn->close();
}
?>

                <div class="card" id="AddLesson" style="display: none;">
                    <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content" >
                                <!-- Form content -->
                                
                                <form method="post"  enctype="multipart/form-data">

    
<div class="mb-3">
    <label class="small mb-1" for="select_course">Select Course</label>
    <select class="form-select" name="select_course" id="select_course">
        <?php
        include 'db_config.php';
        $conn = new mysqli($host, $user, $pass, $db);

        // التحقق من نجاح الاتصال
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // استعلام لاسترداد الكورسات المرتبطة بالمدرس
        $teacher_id = $_SESSION['Teacher_ID']; // تفضيلي، يمكنك استخدام قيمة المعرّف المحفوظة في جلسة المستخدم
        $sqlcl = "SELECT Course_ID, Course_Name FROM course WHERE Teacher_ID = $teacher_id";
        $resultcl = $conn->query($sqlcl);

        // التحقق من وجود بيانات للعرض
        if ($resultcl->num_rows > 0) {
            // عرض خيار افتراضي

            // عرض الكورسات كخيارات
            while($rowcl = $resultcl->fetch_assoc()) {
                echo '<option value="' . $rowcl['Course_ID'] . '">' . $rowcl['Course_Name'] . '</option>';
            }
        } else {
            // إذا لم يتم العثور على كورسات
            echo '<option value="">No courses associated with the teacher</option>';
        }
        ?>
    </select>
</div>

<a href="teacherDash.php" type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</a>
<div class="mb-3">
    <label for="Lesson_Name" class="form-label">Lesson Name</label>
    <input type="text" class="form-control" id="Lesson_Name" name="Lesson_Name" placeholder="Enter lesson name">
</div>
<div class="mb-3">
    <label for="lessonDuration" class="form-label">Duration</label>
    <input type="text" class="form-control" id="lessonDuration" name="lessonDuration" placeholder="Enter lesson duration">
</div>
<div class="mb-3">
<form action="upload_video.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="video_file" class="form-label">Upload Video</label>
        <input type="file" class="form-control" id="video_file" name="video_file" accept="video/*">
    </div>


</div>
<div class="mb-3">
    <label for="Upload_Date" class="form-label">Upload Date</label>
    <input type="date" class="form-control" id="Upload_Date" name="Upload_Date" placeholder="Enter upload date">
</div>

<button type="submit" class="btn btn-primary" name="add_lesson">Add Lesson</button>
</form>
</form>                    
                    </div>
                    </div>
                </div>
                    <!-- Modal for add lessson -->
                <div class="card" id="DeleteLesson" style="display: none;">
                    <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content" >
                            
                                <form>
                                    <a href="teacherDash.php" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </a>
                                    <div class="mb-3">
                                        <label for="CourseId" class="form-label">CourseId</label>
                                        <input type="text" class="form-control" id="CourseId" placeholder="Enter CourseId">
                                    </div>
                                    <div class="mb-3">
                                        <label for="LessonId" class="form-label">LessonId</label>
                                        <input type="text" class="form-control" id="LessonId" placeholder="Enter LessonId">
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">Delete Lesson</button>
                                </form>
                        
                    </div>
                    </div>
                </div>
                <!-- CRAETE quiz-->
                <div class="card" id="createquiz" style="display: none;">
                    <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="Createquiz">
                            <a href="teacherDash.php" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </a>
                            <h1 class="heading">Create Quiz</h1>
                    <?php
// التحقق مما إذا تم النقر على زر "Add Quiz"
if(isset($_POST['add_quiz'])) {
    // استقبال البيانات من النموذج
    $select_course = $_POST['select_course1'];
    $quiz_name = $_POST['quiz_name'];
    $upload_date = $_POST['Upload_Date1'];
    $due_date = $_POST['Due_Date'];

    // التحقق من وجود Teacher_ID في الجلسة
    
        $teacher_id = $_SESSION['Teacher_ID'];
        echo "Quiz added successfully";

        // تضمين ملف الاعدادات للاتصال بقاعدة البيانات
        include 'db_config.php';
        $conn = new mysqli($host, $user, $pass, $db);

        // التحقق من نجاح الاتصال
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // استعلام SQL معدل
        $sql_quiz2 = "INSERT INTO task (Teacher_ID, Course_ID, Title, Upload_Date, Due_Date) VALUES (?, ?, ?, ?, ?)";
        
        // تحضير الاستعلام
        $stmt2 = $conn->prepare($sql_quiz2);
        $stmt2->bind_param("iisss", $teacher_id, $select_course, $quiz_name, $upload_date, $due_date);
        
        // تنفيذ الاستعلام
        if ($stmt2->execute()) {
            echo "Quiz added successfully";
        } else {
            echo "Error: " . $sql_quiz . "<br>" . $conn->error;
        }

        // إغلاق الاستعلام والاتصال بقاعدة البيانات
        $stmt2->close();
        $conn->close();
    } 
?>

<form id="quizForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-group">
    <label class="small mb-1" for="select_course">Select Course</label>
    <select class="form-select1" name="select_course1" id="select_course1">
        <?php
        include 'db_config.php';
        $conn = new mysqli($host, $user, $pass, $db);

        // التحقق من نجاح الاتصال
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // استعلام لاسترداد الكورسات المرتبطة بالمدرس
        if(isset($_SESSION['Teacher_ID'])) {
            $teacher_id = $_SESSION['Teacher_ID'];
            $sqlcl = "SELECT Course_ID, Course_Name FROM course WHERE Teacher_ID = ?";
            $stmt = $conn->prepare($sqlcl);
            $stmt->bind_param("i", $teacher_id);
            $stmt->execute();
            $resultcl = $stmt->get_result();
            
            // التحقق من وجود بيانات للعرض
            if ($resultcl->num_rows > 0) {
                // عرض الكورسات كخيارات
                while($rowcl = $resultcl->fetch_assoc()) {
                    echo '<option value="' . $rowcl['Course_ID'] . '">' . $rowcl['Course_Name'] . '</option>';
                }
            } else {
                // إذا لم يتم العثور على كورسات
                echo '<option value="">No courses associated with the teacher</option>';
            }
        } else {
            echo "Teacher ID not found in session.";
        }

        // إغلاق الاستعلام والاتصال بقاعدة البيانات
        $stmt->close();
        $conn->close();
        ?>
    </select>
    <label for="quiz_name" class="label">Quiz Name:</label>
    <input type="text" id="quiz_name" name="quiz_name" class="input-field" required>
    <div class="mb-3">
        <label for="Upload_Date1" class="form-label">Upload_Date</label>
        <input type="date" class="form-control" id="Upload_Date1" name="Upload_Date1" placeholder="Enter upload date">
    </div>
    <div class="mb-3">
        <label for="Due_Date" class="form-label">Due_Date</label>
        <input type="date" class="form-control" id="Due_Date" name="Due_Date" placeholder="Enter upload date">
    </div>
    <!-- المحتوى الخاص بالنموذج هنا -->
    <button type="submit" class="btn btn-primary" name="add_quiz">Add Quiz</button>
</form>


<!-- الجزء HTML -->
<?php
// التحقق مما إذا تم النقر على زر "Add Question"
if(isset($_POST['add_question'])) {
    // استقبال البيانات من النموذج
    $question = $_POST['question'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $correctAnswer = $_POST['correctAnswer'];
    $task_id = $_POST['select_quiz1'];

    // تضمين ملف الاعدادات للاتصال بقاعدة البيانات
    include 'db_config.php';
    $conn = new mysqli($host, $user, $pass, $db);

    // التحقق من نجاح الاتصال
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // استعلام SQL لإدراج السؤال في قاعدة البيانات
    $sql_qq = "INSERT INTO questions (Question, option1, option2, option3, correctAnswer, Task_ID) VALUES (?, ?, ?, ?, ?, ?)";

    // تحضير الاستعلام
    $stmt_qq = $conn->prepare($sql_qq);

    // ربط المتغيرات ببيانات الاستعلام
    $stmt_qq->bind_param("sssssi", $question, $option1, $option2, $option3, $correctAnswer, $task_id);

    // تنفيذ الاستعلام
    if ($stmt_qq->execute()) {
        echo "Question added successfully";
    } else {
        echo "Error: " . $sql_qq . "<br>" . $conn->error;
    }

    // إغلاق الاستعلام والاتصال بقاعدة البيانات
    $stmt_qq->close();
    $conn->close();
}
?>


<form id="addQuestionForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-group">
<label class="small mb-1" for="select_quiz">Select Quiz</label>
<select class="form-select" name="select_quiz1" id="select_quiz1">
    <?php
    include 'db_config.php';
    $conn = new mysqli($host, $user, $pass, $db);

    // التحقق من الاتصال بقاعدة البيانات
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // استعلام SQL لاسترداد البيانات
    $teacher_id = $_SESSION['Teacher_ID'];
    $sql_quiz = "SELECT Task_ID, Title FROM task WHERE Teacher_ID = $teacher_id";
    $result_quiz = $conn->query($sql_quiz);
    // التحقق من وجود بيانات لعرضها
    if ($result_quiz->num_rows > 0) {
        // عرض بيانات الاختيار كخيارات في عنصر select
        while($row_quiz = $result_quiz->fetch_assoc()) {
            echo '<option value="' . $row_quiz['Task_ID'] . '">' . $row_quiz['Title'] . '</option>';
        }
    } else {
        // إذا لم يتم العثور على بيانات، عرض رسالة لا يوجد بيانات
        echo '<option value="">No quizzes available</option>';
    }

    // إغلاق الاتصال بقاعدة البيانات
    $conn->close();
    ?>
</select>


    <label for="question" class="label">Question:</label>
    <input type="text" id="question" name="question" class="input-field" required>

    <label for="option1" class="label">Option 1:</label>
    <input type="text" id="option1" name="option1" class="input-field" required>

    <label for="option2" class="label">Option 2:</label>
    <input type="text" id="option2" name="option2" class="input-field" required>

    <label for="option3" class="label">Option 3:</label>
    <input type="text" id="option3" name="option3" class="input-field" required>

    <label for="correctAnswer" class="label">Correct Answer:</label>
    <select id="correctAnswer" name="correctAnswer" class="select-field" required>
        <option value="option1">Option 1</option>
        <option value="option2">Option 2</option>
        <option value="option3">Option 3</option>
    </select>

    <div class="submitbtn" style="text-align: center;">
        <button type="submit" class="submit-btn" name="add_question">Add Question</button>
    </div>
</form>
                        </div>
                        
                    </div>
                    </div>
                </div>
                <!-- Modal for Enrollments Table -->
                <div class="card" id="enrollmentsTableModal" style="display: none;">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="enrollmentsTableModalLabel">Enrollments Table</h5>
                                <!-- Add a cancel icon here -->
                                <a href="teacherDash.php" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                            </div>
                            <div class="modal-body">
                        <!-- Manage Enrollments Table -->
                        <?php


// تضمين ملف الاعدادات للاتصال بقاعدة البيانات
include 'db_config.php';
$conn = new mysqli($host, $user, $pass, $db);

// التحقق من نجاح الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// معرّف المعلم
$teacher_id = $_SESSION['Teacher_ID']; // تفضيلي، يمكنك استخدام قيمة المعرّف المحفوظة في جلسة المستخدم

// استعلام SQL لاسترداد الطلاب المسجلين في الدورات التي يقوم بها المعلم
$sql_students_en = "SELECT student.* 
FROM student
INNER JOIN student_course_registration ON student.student_ID = student_course_registration.student_ID
INNER JOIN course ON student_course_registration.Course_ID = course.Course_ID
WHERE course.Teacher_ID  = $teacher_id";

$result_students_en = $conn->query($sql_students_en);

// التحقق من وجود بيانات لعرضها
if ($result_students_en->num_rows > 0) {
    // عرض بيانات الطلاب في جدول HTML
    echo '<table class="table table-bordered">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Student ID</th>';
    echo '<th>First Name</th>';
    echo '<th>Last Name</th>';
    echo '<th>Action</th>'; // إضافة عمود للإجراءات
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    
    while($row = $result_students_en->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['student_ID'] . '</td>';
        echo '<td>' . $row['student_fname'] . '</td>';
        echo '<td>' . $row['student_lname'] . '</td>';
        echo '<td><button class="btn btn-danger btn-sm delete-btn">Delete</button></td>'; // زر حذف
        echo '</tr>';
    }
    
    echo '</tbody>';
    echo '</table>';
} else {
    echo 'No students found';
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>

                    </div>
                    <div class="modal-footer">
                                <!-- Use window.location.href to navigate to the desired page -->
                                <button type="button" class="btn btn-secondary" onclick="redirectToHomePage()">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <section id="corses-singel" class="pt-90 pb-120 gray-bg"style="margin-top:0px; display: none;" >
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="corses-singel-left mt-30">
                                    <div class="title">
                                        <h3>Learn basis javascirpt from start for beginner</h3>
                                    </div> <!-- title -->
                                    <div class="course-terms">
                                        <ul>
                                            <li>
                                                <div class="teacher-name">
                                                    <div class="thum">
                                                        <img src="img/teacher-1.jpg" alt="Teacher">
                                                    </div>
                                                    <div class="name">
                                                        <span>Teacher</span>
                                                        <h6>Mark anthem</h6>
                                                    </div>
                                                </div>
                                            </li>
                                        
                                            <li>
                                                <div class="review">
                                                    <span>Review</span>
                                                    <ul>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li class="rating">(20 Reviws)</li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div> <!-- course terms -->
                                    
                                    <div class="corses-singel-image pt-50">
                                        <img src="img/course-2.jpg" alt="Courses">
                                    </div> <!-- corses singel image -->
                                    
                                    <div class="corses-tab mt-30">
                                        <ul class="nav nav-justified" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                                            </li>
                                            <li class="nav-item">
                                                <a id="curriculam-tab" data-toggle="tab" href="#curriculam" role="tab" aria-controls="curriculam" aria-selected="false">Curriculam</a>
                                            </li>
                                            
                                        </ul>
                                        
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                                <div class="overview-description">
                                                    <div class="singel-description pt-40">
                                                        <h6>Course Summery</h6>
                                                        <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus .</p>
                                                    </div>
                                                    <div class="singel-description pt-40">
                                                        <h6>Requrements</h6>
                                                        <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus .</p>
                                                    </div>
                                                </div> <!-- overview description -->
                                            </div>
                                            <div class="tab-pane fade" id="curriculam" role="tabpanel" aria-labelledby="curriculam-tab">
                                                <div class="curriculam-cont">
                                                    <div class="title">
                                                        <h6>Learn basis javascirpt Lecture Started</h6>
                                                    </div>
                                                    <a href="#" class="btn btn-success ml-2" onclick="showTeacherAddLesson()">
                                                        <i class="fa fa-plus"></i> Add New Lecture
                                                    </a>
                                                    <a href="#" class="btn btn-success ml-2" style="background-color: red;" onclick="showTeacherdeleteLesson()">
                                                        <i class="fa fa-plus"></i> Delete Lecture
                                                    </a>
                                                    <div class="accordion" id="accordionExample">
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                
                                                                <a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                    <ul>
                                                                        <li><i class="fa fa-file-o"></i></li>
                                                                        <li><span class="lecture">Lecture 1.1</span></li>
                                                                        <li><span class="head">What is JavaScript</span></li>
                                                                        <li><span class="time d-none d-md-block"><i class="fa fa-clock-o"></i> <span>00:30:00</span></span></li>
                                                                    </ul>
                                                                </a>
                                                            
                                                            </div>
                                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    <p>Ut quis scelerisque risus, et viverra nisi. Phasellus ultricies luctus augue, eget maximus felis laoreet quis. Maecenas bibendum tempor eros.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="card">
                                                            <div class="card-header" id="headingTow">
                                                                <a href="#" data-toggle="collapse" class="collapsed" data-target="#collapseTow" aria-expanded="true" aria-controls="collapseTow">
                                                                    <ul>
                                                                        <li><i class="fa fa-file-o"></i></li>
                                                                        <li><span class="lecture">Lecture 1.2</span></li>
                                                                        <li><span class="head">What is javascirpt</span></li>
                                                                        <li><span class="time d-none d-md-block"><i class="fa fa-clock-o"></i> <span> 00.30.00</span></span></li>
                                                                    </ul>
                                                                </a>
                                                            </div>
            
                                                            <div id="collapseTow" class="collapse" aria-labelledby="headingTow" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    <p>Ut quis scelerisque risus, et viverra nisi. Phasellus ultricies luctus augue, eget maximus felis laoreet quis. Maecenasbibendum tempor eros.</p>
                                                                </div>
                                                            </div>
                                                        </div>
            
                                                        <div class="card">
                                                            <div class="card-header" id="headingThree">
                                                                <a href="#" data-toggle="collapse" class="collapsed" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                    <ul>
                                                                        <li><i class="fa fa-file-o"></i></li>
                                                                        <li><span class="lecture">Lecture 1.3</span></li>
                                                                        <li><span class="head">What is javascirpt</span></li>
                                                                        <li><span class="time d-none d-md-block"><i class="fa fa-clock-o"></i> <span> 00.30.00</span></span></li>
                                                                    </ul>
                                                                </a>
                                                            </div>
                                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    <p>Ut quis scelerisque risus, et viverra nisi. Phasellus ultricies luctus augue, eget maximus felis laoreet quis. Maecenasbibendum tempor eros.</p>
                                                                </div>
                                                            </div>
                                                        </div>
            
                                                        <div class="card">
                                                            <div class="card-header" id="headingFore">
                                                                <a href="#" data-toggle="collapse" class="collapsed" data-target="#collapseFore" aria-expanded="false" aria-controls="collapseFore">
                                                                    <ul>
                                                                        <li><i class="fa fa-file-o"></i></li>
                                                                        <li><span class="lecture">Lecture 1.4</span></li>
                                                                        <li><span class="head">What is javascirpt</span></li>
                                                                        <li><span class="time d-none d-md-block"><i class="fa fa-clock-o"></i> <span> 00.30.00</span></span></li>
                                                                    </ul>
                                                                </a>
                                                            </div>
                                                            <div id="collapseFore" class="collapse" aria-labelledby="headingFore" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    <p>Ut quis scelerisque risus, et viverra nisi. Phasellus ultricies luctus augue, eget maximus felis laoreet quis. Maecenasbibendum tempor eros.</p>
                                                                </div>
                                                            </div>
                                                        </div>
            
                                                        <div class="card">
                                                            <div class="card-header" id="headingFive">
                                                                <a href="#" data-toggle="collapse" class="collapsed" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                                    <ul>
                                                                        <li><i class="fa fa-file-o"></i></li>
                                                                        <li><span class="lecture">Lecture 1.5</span></li>
                                                                        <li><span class="head">What is javascirpt</span></li>
                                                                        <li><span class="time d-none d-md-block"><i class="fa fa-clock-o"></i> <span> 00.30.00</span></span></li>
                                                                    </ul>
                                                                </a>
                                                            </div>
                                                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    <p>Ut quis scelerisque risus, et viverra nisi. Phasellus ultricies luctus augue, eget maximus felis laoreet quis. Maecenasbibendum tempor eros.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="card">
                                                            <div class="card-header" id="headingSix">
                                                                <a href="#" data-toggle="collapse" class="collapsed" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                                    <ul>
                                                                        <li><i class="fa fa-file-o"></i></li>
                                                                        <li><span class="lecture">Lecture 1.6</span></li>
                                                                        <li><span class="head">What is javascirpt</span></li>
                                                                        <li><span class="time d-none d-md-block"><i class="fa fa-clock-o"></i> <span> 00.30.00</span></span></li>
                                                                    </ul>
                                                                </a>
                                                            </div>
                                                            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    <p>Ut quis scelerisque risus, et viverra nisi. Phasellus ultricies luctus augue, eget maximus felis laoreet quis. Maecenasbibendum tempor eros.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="card">
                                                            <div class="card-header" id="headingSeven">
                                                                <a href="#" data-toggle="collapse" class="collapsed" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                                                    <ul>
                                                                        <li><i class="fa fa-file-o"></i></li>
                                                                        <li><span class="lecture">Lecture 1.7</span></li>
                                                                        <li><span class="head">What is javascirpt</span></li>
                                                                        <li><span class="time d-none d-md-block"><i class="fa fa-clock-o"></i> <span> 00.30.00</span></span></li>
                                                                    </ul>
                                                                </a>
                                                            </div>
                                                            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    <p>Ut quis scelerisque risus, et viverra nisi. Phasellus ultricies luctus augue, eget maximus felis laoreet quis. Maecenasbibendum tempor eros.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> <!-- curriculam cont -->
                                            </div>
                                            
                                        
                                        </div> <!-- tab content -->
                                    </div>
                                </div> <!-- corses singel left -->
                                
                            </div>
                            
                        </div> <!-- row -->
                    
                    </div> <!-- container -->
                </section>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="bootstrap-4.3.1-dist/js/jquery-3.7.1.min.js"></script>
    <script src="bootstrap-4.3.1-dist/js/popper.min.js"></script>
    <script src="bootstrap-4.3.1-dist/js/bootstrap.js"></script>
    <script src="js/TeacherDash.js"></script>
    
</body>
</html>
