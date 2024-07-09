<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags for character set and viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.css">

    <!-- Title and additional stylesheets -->
    <title>Teachers</title>
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fontasome/fontawesome-free-6.4.2-web/css/all.min.css">
</head>
<body>
<!-- Header Section -->
<header class="header fixed-top">
    <!-- Top Header -->
    <div class="top-header fixed-top-header ">
            <div class="row align-items-center">
                <div class="col-md-6 col-sm-6 text-center">
                    <div class="top-icon info-item">
                        <i class="fas fa-phone"></i>
                        <div class="info-item">+62 7144 3300</div>
                    </div>
                    <div class="top-icon info-item">
                        <i class="fas fa-envelope"></i>
                        <div class="info-item"><a href="mailto:support@kids.com">support@kids.com</a></div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 text-center d-none d-sm-inline-block">
                    <div class="row sosmed-icon justify-content-center">
                        <a href="#" class="fb"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="tw"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="ig"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="in"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand logo" href="#">
                <img src="img/logo.png" alt="Logo">
            </a>            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                 <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">HOME</a></li>
                    <li class="nav-item "><a class="nav-link" href="courses.php">COURSES</a></li>
                    <li class="nav-item "><a class="nav-link" href="Games.php">GAMES</a></li>
                    <li class="nav-item active"><a class="nav-link" href="Teachers.php">TEACHER</a></li>
                    <li class="nav-item "><a class="nav-link" href="contact us .php">CONTACT US</a></li>
                </ul>
                <button class="btn  login-btn" type="button">
                    <a href="login.php" class="text-white" style="text-decoration: none;">Join Us</a>
                </button>
            </div>
        </div>
    </nav>
</header>
<!-- Banner Section -->

<div id="carouselExample" class="carousel slide">
    <div class="section banner-page " style="background-image: url('img/bg_1.jpg');">
        <div class="content-wrap pos-relative">
            <div class="d-flex justify-content-center mb-3">
                <div class="title-page">Teacher</div>
            </div>
            <div class="d-flex justify-content-center mb-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Teacher</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    </div>
    


 <!-- teacher Section -->
 <?php
// Database connection settings
include 'db_config.php';
$conn = new mysqli($host, $user, $pass, $db);

// Checking if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Using prepared statements to prevent SQL injection
$sql_teacher = "SELECT * FROM teacher";
$stmt_teacher = $conn->prepare($sql_teacher);

// Check if the statement is prepared successfully
if (!$stmt_teacher) {
    die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
}

// Executing the statement
$stmt_teacher->execute();

// Getting the result set
$result_teacher = $stmt_teacher->get_result();

// Initialize an empty array to store teacher data
$teachers = array();

// Fetching data and storing each row as an associative array in the $teachers array
while ($row_teacher = $result_teacher->fetch_assoc()) {
    // Get social media profiles for the current teacher
    $teacher_id = $row_teacher['Teacher_ID'];
    $sql_social_media = "SELECT platform, profile_url FROM teacher_social_media WHERE teacher_ID = ?";
    $stmt_social_media = $conn->prepare($sql_social_media);
    $stmt_social_media->bind_param('i', $teacher_id);
    $stmt_social_media->execute();
    $result_social_media = $stmt_social_media->get_result();

    // Initialize an empty array to store social media profiles
    $social_media_profiles = array();
    while ($row_social_media = $result_social_media->fetch_assoc()) {
        $social_media_profiles[] = $row_social_media;
    }

    // Add the social media profiles to the teacher data
    $row_teacher['social_media_profiles'] = $social_media_profiles;

    // Add the teacher data to the teachers array
    $teachers[] = $row_teacher;

    // Closing the social media statement
    $stmt_social_media->close();
}

// Closing the prepared statement
$stmt_teacher->close();

// Close the connection
$conn->close();
?>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <?php
            foreach ($teachers as $teacher) {
                echo '<div class="col-md-4 col-sm-6 col-xs-12 mb-3">';
                echo '<div class="card text-center p-4 ftco-animate" style="background-color: #f8f9fa; border: none; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">';
                echo '<img src="' . $teacher['image'] . '" class="card-img-top" alt="Card Image">';
                echo '<div class="card-body mt-3">';
                echo '<h3 class="card-title heading" style="color: #343a40; font-size: 1.5rem; font-weight: bold;">' . $teacher['teacher_fname'] . ' ' . $teacher['teacher_lname'] . '<br>- ' . $teacher['ED_Level'] . ' -</h3>';
                echo '<p class="card-text" style="color: #6c757d;">' . $teacher['teacher_description'] . '</p>';
                echo '<div class="row sosmed-icon justify-content-center">';

                // Adding social media links
                foreach ($teacher['social_media_profiles'] as $profile) {
                    $platform = strtolower($profile['platform']);
                    $profile_url = $profile['profile_url'];
                    echo '<a href="' . $profile_url . '" class="' . $platform . '"><i class="fa-brands fa-' . $platform . '"></i></a>';
                }

                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</section>



<!-- contact to Action Section -->
<div class="sectionn">
    <div class="content-wrap py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-12 col-md-12">
                    <div class="cta-1">
                        <div class="body-text">
                            <h3 class="my-1 text-secondary">Let's join the best kindergarten now!</h3>
                            <p class="uk18 mb-0 text-white">Subscribe now to embark on an inspiring journey of learning and innovation </p>
                        </div>
                        <div class="body-action">
                            <a href="contact us .php" class="btn btnn mt-3">CONTACT US</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scroll to Top Button -->
<div id="scroll-to-top" class="scroll-to-top">
    <i class="fas fa-chevron-up"></i>
</div>


<!-- Footer Section -->
<footer>
    <div class="footer ">
        <div class="content-wrapp">
            <div class="container">
                <div class="row">
                    <!-- Footer Item 1 -->
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="footer-item">
                            <img src="img/logo-2.png" alt="logo bottom" class="logo-bottom">
                            <div class="spacer-30"></div>
                            <p> Empowering young minds through education and creativity.</p>
                            <p>"Education that sparks imagination and learning." </p>
                        </div>
                    </div>                    

                    <!-- Footer Item 2 -->
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="footer-item">
                            <div class="footer-title">
                                Contact Info
                            </div>
                            <ul class="list-info">
                                <li>
                                    <div class="info-icon">
                                        <span class="fa fa-map-marker"></span>
                                    </div>
                                    <div class="info-text">99 S.t Dokki , egypt</div>
                                </li>
                                <li>
                                    <div class="info-icon">
                                        <span class="fa fa-phone"></span>
                                    </div>
                                    <div class="info-text">+201126847953</div>
                                </li>
                                <li>
                                    <div class="info-icon">
                                        <span class="fa fa-envelope"></span>
                                    </div>
                                    <div class="info-text">support@kids.com</div>
                                </li>
                                
                            </ul>
                        </div>
                    </div>

                    <!-- Footer Item 3 -->
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="footer-item">
                            <div class="footer-title">
                                Useful Links
                            </div>
                            <ul class="list">
                                <li><a href="index.php" title="About us">Home</a></li>
                                <li><a href="Teachers.php" title="Our Teacher">Our Teacher</a></li>
                                <li><a href="courses.php" title="Our Classes">Our Courses</a></li>
                                <li><a href="Games.php" title="Our Classes">Our Games</a></li>
                                <li><a href="contact us .php" title="Contact Us">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Footer Item 4 -->
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="footer-item">
                            <div class="footer-title">
                                Get in Touch
                            </div>
                            <p>Empowering young minds through innovative education. Explore the exciting journey of learning for children, where knowledge meets fun. Join us in creating a unique educational </p>
                            <div class="sosmed-icon d-inline-flex">
                                <a href="#" class="fb"><i class="fa-brands fa-facebook"></i></a>
                                <a href="#" class="tw"><i class="fa-brands fa-twitter"></i></a>
                                <a href="#" class="ig"><i class="fa-brands fa-instagram"></i></a>
                                <a href="#" class="in"><i class="fa-brands fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright -->
    <div class="row align-items-center  footerr" style="height: 40px; ">
        <div class="col-12 text-center">
            <div class=" d-flex justify-content-center">
                <p class="text-white mb-0">Copyright 2023 © EDUBIN</p>
            </div>
        </div>
    </div>
    
</div>
</footer>



<!-- Bootstrap JS and Popper.js (required for Bootstrap) -->
<script src="js/index.js"></script>
<script src="bootstrap-4.3.1-dist/js/popper.min.js"></script>
<script src="bootstrap-4.3.1-dist/js/jquery-3.7.1.min.js"></script>
<script src="bootstrap-4.3.1-dist/js/bootstrap.js"></script>

</body>
</html>