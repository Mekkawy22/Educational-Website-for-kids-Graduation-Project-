<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags for character set and viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.css">

    <!-- Title and additional stylesheets -->
    <title>Courses</title>
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fontasome/fontawesome-free-6.4.2-web/css/all.min.css">
</head>
<body>
<!-- Header Section -->
<header class="header  fixed-top">
    <!-- Top Header -->
    <div class="top-header fixed-top-header">
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
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">HOME</a></li>
                    <li class="nav-item active"><a class="nav-link" href="courses.php">COURSES</a></li>
                    <li class="nav-item "><a class="nav-link" href="Games.php">GAMES</a></li>
                    <li class="nav-item"><a class="nav-link" href="Teachers.php">TEACHER</a></li>
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
            <div class="title-page">Courses</div>
        </div>
        <div class="d-flex justify-content-center mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">course</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
</div>


 <!-- Courses Section -->
 <section class="ftco-section container-fluid">
    <div class="row">
        <?php
        // Array of courses (you can replace this with your actual data source)
        include 'get_info_courses.php';
       

        foreach ($courses as $course) {
            echo '<div class="col-md-4">';
            echo '<div class="card-hover">';
            echo '<div class="card-hover__content">';
            echo '<h3 class="card-hover__title">';
            echo '<span>' . $course['Course_Name'] . '</span>';
            echo '</h3>';
            echo '<p class="card-hover__text">' . $course['Description'] . '</p>';
            echo '<a href="#" class="card-hover__link">';
            $Course_Name=$course['Course_Name'];
            $course_id_en=$course['Course_ID'];
            echo '
            <form id="courseForm" action="courses_discovery.php" method="post">
                <input type="hidden" name="course_id_en" value="'.$course_id_en.'">
                <input type="hidden" name="course_name" value="'.$Course_Name.'">
                
                <button class="btn btn-primary btn-block custom-btn" >Learn More</button>
            </form>';            echo '<svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">';
            echo '<path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />';
            echo '</svg>';
            echo '</a>';
            echo '</div>';
            echo '<div class="card-hover__extra">';
            echo '<h4>register <span>now</span></h4>';
            echo '</div>';
            echo '<img src="' . $course['Course_Image'] . '" alt="Course Image">';
            echo '</div>';
            echo '</div>';
        }
        ?>
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
    <div class="row align-items-center footerr " style="height: 40px; ">
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