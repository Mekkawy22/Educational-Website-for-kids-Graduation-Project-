<?php
require_once('db_config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Add this line to include Font Awesome CSS -->
        <link rel="icon" href="img/favicon.png">
        <link rel="stylesheet" href="fontasome/fontawesome-free-6.4.2-web/css/all.min.css">
        <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.css">
        <link rel="stylesheet" href="css/style2.css">
        <title>Admin Control Panel</title>
        <!-- Add this line to include Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-dark  fixed-top" style="background-color: #07294d;">
            <a class="navbar-brand" href="#">
                <img src="img/logo-2.png" alt="Logo" height="30" class="d-inline-block align-top">
            </a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">                           
                    <li class="nav-item">
                        <!-- Profile dropdown -->
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="img/bg_1.jpg" alt="Profile Image" class="profile-image">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
                                
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
                            <button id="dashboardLink" class="list-group-item" onclick="showDashboard(this)">Dashboard</button>
                            <button id="studentsTableLink" class="list-group-item" onclick="showStudentTable(this)">Students</button>
                            <button id="teachersTableLink" class="list-group-item" onclick="showTeacherTeble(this)">Teachers</button>
                            <button id="coursesTableLink" class="list-group-item" onclick="showCourseTable(this)">Courses</button>
                            <button id="enrollmentsTableLink" class="list-group-item" onclick="showenrollmentsTable(this)">Enrollments</button>
                            </div>
                        </div>

                        <div class="col-lg-9">
                                    <!--welcome-->
                                    <?php 
                                            session_start();

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
                                                session_unset();
                                                // Destroy the session
                                                session_destroy();
                                                // Redirect to login page using JavaScript
                                                echo '<script>window.location.href = "login.php";</script>';
                                                exit; // Add exit here to stop further execution
                                            }
                                            ?>
                                     <div class="child-container">
                                        <div class="child-welcome-box">
                                            <h2 class="child-welcome-title">Welcome</h2>
                                            <h2 class="child-welcome-title"><?php echo $username; ?></h2>
                                            
                                        </div>
                                    </div>
                                    <!--mainDash-->
                                    <div class="card" id="dashboard">
                                            <div class="card-body">
                                                <h5 class="card-title">Admin Dashboard</h5>
                                                <!-- Dashboard content goes here -->
                                                <div class="card" id="dashboard">
                                                    <div class="card-body">
                                                    <div class="row">
                                                                <div class="col-md-4">
                                                                    <canvas id="studentsPieChart" width="200" height="200"></canvas>
                                                                    <div class="chart-title text-center mt-3">Students</div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <canvas id="teachersPieChart" width="200" height="200"></canvas>
                                                                    <div class="chart-title text-center mt-3">Teachers</div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <canvas id="coursesPieChart" width="200" height="200"></canvas>
                                                                    <div class="chart-title text-center mt-3">Courses</div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <!-- Modal for Massage -->

                                                 <?php
                                               

                                                // التحقق إذا كان هناك طلب حذف
                                                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['message_id'])) {
                                                    $message_id = $_POST['message_id'];

                                                    // استعلام لحذف الرسالة
                                                    $sql = "DELETE FROM contact_messages WHERE id = ?";
                                                    $stmt = $conn->prepare($sql);
                                                    $stmt->bind_param("i", $message_id);

                                                    if ($stmt->execute()) {
                                                        echo "<script>alert('Message deleted successfully.');</script>";
                                                    } else {
                                                        echo "<script>alert('Error deleting message: " . $conn->error . "');</script>";
                                                    }

                                                    $stmt->close();
                                                }

                                                // استعلام SQL لاسترداد الرسائل من جدول الاتصال
                                                $sql = "SELECT * FROM contact_messages";
                                                $result = $conn->query($sql);
                                                ?>

                                                <div class="mt-4">
                                                    <h5 class="card-title">Contact Messages</h5>
                                                    <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Subject</th>
                                                                    <th>Email</th>
                                                                    <th>Phone Number</th>
                                                                    <th>Message</th>
                                                                    <th>Reply</th>
                                                                    <th>Delete</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                // التحقق من وجود بيانات
                                                                if ($result->num_rows > 0) {
                                                                    // عرض البيانات في الجدول
                                                                    while($row = $result->fetch_assoc()) {
                                                                        echo "<tr>";
                                                                        echo "<td>" . $row["name"] . "</td>";
                                                                        echo "<td>" . $row["subject"] . "</td>";
                                                                        echo "<td class='email-cell'>" . $row["email"] . "</td>";
                                                                        echo "<td>" . $row["phone_number"] . "</td>";
                                                                        echo "<td>" . $row["message"] . "</td>";
                                                                        echo "<td><button type='button' class='btn btn-primary btn-sm reply-btn' data-email='" . $row["email"] . "' data-toggle='modal' data-target='#replyModal'>Reply</button></td>";
                                                                        echo "<td><form action='' method='POST'><input type='hidden' name='message_id' value='" . $row["id"] . "'><button type='submit' class='btn btn-danger btn-sm'>Delete</button></form></td>";
                                                                        echo "</tr>";
                                                                    }
                                                                } else {
                                                                    echo "<tr><td colspan='7'>No messages found</td></tr>";
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <!-- Modal for Reply -->
                                                <div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="replyModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="replyModalLabel">Reply to Message</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Form for reply message -->
                                                                <form action="mail.php" method="POST">
                                                                    <div class="form-group">
                                                                        <label for="recipient_email">Recipient Email:</label>
                                                                        <input type="email" class="form-control" id="recipient_email" name="email" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="reply_message">Reply Message:</label>
                                                                        <textarea class="form-control" id="reply_message" name="message" rows="5" required></textarea>
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary">Send Reply</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        const replyButtons = document.querySelectorAll('.reply-btn');
                                                        const emailInput = document.getElementById('recipient_email');

                                                        replyButtons.forEach(button => {
                                                            button.addEventListener('click', function() {
                                                                const email = this.getAttribute('data-email');
                                                                emailInput.value = email;
                                                            });
                                                        });
                                                    });
                                                </script>


                                            </div>
                                    </div>

                                    <!-- Modal for Students Table -->
                                    <div class="card" id="studentsTableModal" style="display: none;">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">                                       
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="studentsTableModalLabel">Students Table</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Manage Students Table -->
                                                    <table class="table table-bordered">
                                                        <!-- Table Header -->
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Name</th>
                                                                <th>Email</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <!-- Table Body -->
                                                        <tbody>
                                                        <?php
                                                        // Fetch student information from the database
                                                        $sql = "SELECT * FROM `student`";
                                                        $result = $conn->query($sql);

                                                        // Check if any rows were returned
                                                        if ($result->num_rows > 0) {
                                                            // Output data of each row
                                                            while($row = $result->fetch_assoc()) {
                                                                echo "<tr>";
                                                                echo "<td>" . $row["student_ID"] . "</td>";
                                                                echo "<td>" . $row["student_fname"] . "</td>";
                                                                echo "<td>" . $row["Email"] . "</td>";
                                                                echo "<td>";
                                                                echo "<form method='post'>";
                                                                echo "<input type='hidden' name='Delete_student' value='" . $row["student_ID"] . "'>";
                                                                echo "<button type='submit' class='btn btn-danger btn-sm' name='Delete_student'>Delete</button>";
                                                                echo "</form>";
                                                                echo "</td>";
                                                                echo "</tr>";
                                                            }
                                                        } else {
                                                            echo "<tr><td colspan='4'>No students found</td></tr>";
                                                        }
                                                        if(isset($_POST['Delete_student'])){
                                                            if(isset($_POST['Delete_student'])){
                                                                $student_id = $_POST['Delete_student'];
                                                                // Display a JavaScript confirmation dialog to confirm deletion
                                                                    echo '<script>
                                                                    var confirmation = confirm("Are you sure you want to delete the teacher and their related data?");
                                                                    if(confirmation){
                                                                        window.location = "delete_teacher.php?student_ID='.$student_id.'";
                                                                    }
                                                                </script>';
                                                                $Delete_student = "DELETE FROM `student` WHERE student_ID = $student_id;
                                                                ";
                                                                if ($conn->query($Delete_student) === TRUE ) {
                                                                echo "student and related data deleted successfully";
                                                            } else {
                                                                echo "Error deleting student or related data: " . $conn->error;
                                                            }
                                                            }
                                                        }              
                                                    ?>

                                                        </tbody>
                                                    </table>
                                                </div>                                       
                                            </div>
                                        </div>
                                    </div>
                                
                                    <!-- Modal for Teachers Table -->
                                    <div class="card" id="teachersTableModal" style="display: none;" >
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">                                           
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="teachersTableModalLabel">Teachers Table</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Manage Teachers Table -->
                                                        <table class="table table-bordered">
                                                            <!-- Table Header -->
                                                            <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>Name</th>
                                                                    <th>Email</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <!-- Table Body -->
                                                            <tbody>
                                                            <!-- PHP code to display course data -->
                                                            <?php
                                                            $sql = "SELECT * FROM teacher";
                                                            $result = $conn->query($sql);

                                                            if ($result->num_rows > 0) {
                                                                while($row = $result->fetch_assoc()) {
                                                                    echo "<tr>";
                                                                    echo "<td>" . $row["Teacher_ID"] . "</td>";
                                                                    echo "<td>" . $row["teacher_fname"] . "</td>";
                                                                    echo "<td>" . $row["email"] . "</td>";
                                                                    echo "<td>";
                                                                    echo "<form method='post'>";
                                                                    echo "<input type='hidden' name='Teacher' value='" . $row["Teacher_ID"] . "'>";
                                                                    echo "<button type='submit' class='btn btn-danger btn-sm' name='delete_teacher'>Delete</button>";
                                                                    echo "</form>";
                                                                    echo "</td>";
                                                                    echo "</tr>";
                                                                }
                                                            } else {
                                                                echo "<tr><td colspan='4'>No courses found</td></tr>";
                                                            }

                                                            if(isset($_POST['delete_teacher'])){
                                                                if(isset($_POST['Teacher'])){
                                                                    $teacher_id = $_POST['Teacher'];
                                                                    // Display a JavaScript confirmation dialog to confirm deletion
                                                                        echo '<script>
                                                                        var confirmation = confirm("Are you sure you want to delete the teacher and their related data?");
                                                                        if(confirmation){
                                                                            window.location = "delete_teacher.php?teacher_id='.$teacher_id.'";
                                                                        }
                                                                    </script>';
                                                                    $Delete_Teacher = "DELETE FROM `teacher` WHERE Teacher_ID = $teacher_id;
                                                                    ";
                                                                    if ($conn->query($Delete_Teacher) === TRUE ) {
                                                                    echo "Teacher and related data deleted successfully";
                                                                } else {
                                                                    echo "Error deleting Teacher or related data: " . $conn->error;
                                                                }
                                                                }
                                                            }
                                                            ?>
                                                        </tbody>                                              
                                                        </table>
                                                    </div>                                           
                                                </div>
                                            </div>
                                    </div>
                                    <!-- Modal for Courses Table -->
                                    <div class="card" id="coursesTableModal" style="display: none;">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="coursesTableModalLabel">Courses Table</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Manage Courses Table -->
                                                    <table class="table table-bordered">
                                                        <!-- Table Header -->
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Course Name</th>
                                                                <th>Instructor</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <!-- Table Body -->
                                                        <tbody>
                                                            <!-- PHP code to display course data -->
                                                            <?php
                                                            $sql = "SELECT * FROM course";
                                                            $result = $conn->query($sql);
                                                            if ($result->num_rows > 0) {
                                                                while($row = $result->fetch_assoc()) {
                                                                    echo "<tr>";
                                                                    echo "<td>" . $row["Course_ID"] . "</td>";
                                                                    echo "<td>" . $row["Course_Name"] . "</td>";
                                                                    echo "<td>" . $row["Teacher_ID"] . "</td>";
                                                                    echo "<td>";
                                                                    echo "<form method='post'>";
                                                                    echo "<input type='hidden' name='course_id' value='" . $row["Course_ID"] . "'>";
                                                                    echo "<button type='submit' class='btn btn-danger btn-sm' name='delete_course'>Delete</button>";
                                                                    echo "</form>";
                                                                    echo "</td>";
                                                                    echo "</tr>";
                                                                }
                                                            } else {
                                                                echo "<tr><td colspan='4'>No courses found</td></tr>";
                                                            }
                                                            // التحقق من إرسال معرف الكورس للحذف
                                                            if(isset($_POST['delete_course'])) {
                                                                if(isset($_POST['course_id'])) {
                                                                    $course_id = $_POST['course_id'];

                                                                    // Step 1: حذف السجلات المرتبطة من جدول questionoption
                                                                    $sql_delete_questionoptions = "DELETE FROM questionoption WHERE Task_ID IN (SELECT Task_ID FROM task WHERE Course_ID = $course_id)";
                                                                    if ($conn->query($sql_delete_questionoptions) === TRUE) {
                                                                        // Step 2: حذف السجلات المرتبطة من جدول questions
                                                                        $sql_delete_questions = "DELETE FROM questions WHERE Task_ID IN (SELECT Task_ID FROM task WHERE Course_ID = $course_id)";
                                                                        if ($conn->query($sql_delete_questions) === TRUE) {
                                                                            // Step 3: حذف السجلات المرتبطة من جدول task
                                                                            $sql_delete_tasks = "DELETE FROM task WHERE Course_ID = $course_id";
                                                                            if ($conn->query($sql_delete_tasks) === TRUE) {
                                                                                // Step 4: حذف السجلات المرتبطة من جدول lesson
                                                                                $sql_delete_lessons = "DELETE FROM lesson WHERE Course_ID = $course_id";
                                                                                if ($conn->query($sql_delete_lessons) === TRUE) {
                                                                                    // Step 5: حذف السجلات المرتبطة من جدول student_course_registration
                                                                                    $sql_delete_registration = "DELETE FROM student_course_registration WHERE Course_ID = $course_id";
                                                                                    if ($conn->query($sql_delete_registration) === TRUE) {
                                                                                        // Step 6: حذف الكورس نفسه من جدول course
                                                                                        $sql_delete_course = "DELETE FROM course WHERE Course_ID = $course_id";
                                                                                        if ($conn->query($sql_delete_course) === TRUE) {
                                                                                            echo "Course and associated records deleted successfully";
                                                                                        } else {
                                                                                            echo "Error deleting course: " . $conn->error;
                                                                                        }
                                                                                    } else {
                                                                                        echo "Error deleting student course registration: " . $conn->error;
                                                                                    }
                                                                                } else {
                                                                                    echo "Error deleting lessons: " . $conn->error;
                                                                                }
                                                                            } else {
                                                                                echo "Error deleting tasks: " . $conn->error;
                                                                            }
                                                                        } else {
                                                                            echo "Error deleting questions: " . $conn->error;
                                                                        }
                                                                    } else {
                                                                        echo "Error deleting question options: " . $conn->error;
                                                                    }
                                                                } else {
                                                                    echo "Error: Course ID not provided";
                                                                }
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>                                      
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal for Enrollments Table -->
                                    <div class="card" id="enrollmentsTableModal"  style="display: none;">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">                                        
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="enrollmentsTableModalLabel">Enrollments Table</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Manage Enrollments Table -->
                                                    <table class="table table-bordered">
                                                        <!-- Table Header -->
                                                        <thead>
                                                            <tr>
                                                                <th>Registration ID</th>
                                                                <th>Student ID</th>
                                                                <th>Course ID</th>
                                                                <th>Enrollment Date</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <!-- Table Body -->
                                                        <tbody>
                                                    <!-- PHP code to display course data -->
                                                    <?php
                                                    $sql = "SELECT * FROM student_course_registration";
                                                    $result = $conn->query($sql);

                                                    if ($result->num_rows > 0) {
                                                        while($row = $result->fetch_assoc()) {
                                                            echo "<tr>";
                                                            echo "<td>" . $row["registration_id"] . "</td>";
                                                            echo "<td>" . $row["student_ID"] . "</td>";
                                                            echo "<td>" . $row["Course_ID"] . "</td>";
                                                            echo "<td>" . $row["registration_date"] . "</td>";
                                                            echo "<td>";
                                                            echo "<form method='post'>";
                                                            echo "<input type='hidden' name='registration_id' value='" . $row["registration_id"] . "'>";
                                                            echo "<button type='submit' class='btn btn-danger btn-sm' name='delete_Enrollments'>Delete</button>";
                                                            echo "</form>";
                                                            echo "</td>";
                                                            echo "</tr>";
                                                        }
                                                    } else {
                                                        echo "<tr><td colspan='4'>No courses found</td></tr>";
                                                    }
                                                    // التحقق من إرسال معرف الكورس للحذف
                                                    if(isset($_POST['delete_Enrollments'])) {
                                                        if (isset($_POST['registration_id'])) {
                                                            $registration_id = $_POST['registration_id'];
                                                
                                                            // Perform deletion here
                                                            $sql_delete_registration = "DELETE FROM student_course_registration WHERE registration_id = $registration_id";
                                                            if ($conn->query($sql_delete_registration) === TRUE) {
                                                                echo "Record deleted successfully";
                                                            } else {
                                                                echo "Error deleting record: " . $conn->error;
                                                            }
                                                        } else {
                                                            echo "Error: Registration ID not provided";
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                                    </table>
                                                </div>                                     
                                            </div>
                                        </div>
                                    </div>
                        </div> 
            </div>           
        </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="bootstrap-4.3.1-dist/js/jquery-3.7.1.min.js"></script>
    <script src="bootstrap-4.3.1-dist/js/popper.min.js"></script>
    <script src="bootstrap-4.3.1-dist/js/bootstrap.js"></script>
    <script src="js/adminDash.js"></script> 
</body>
</html>
