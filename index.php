<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags for character set and viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.css">

    <!-- Title and additional stylesheets -->
    <title>Home</title>
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fontasome/fontawesome-free-6.4.2-web/css/all.min.css">

</head>
<body>
<!-- Header Section -->
<header class="header fixed-top">
    <!-- Top Header -->
    <div class="top-header  fixed-top-header">
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
                <div class="col-md-6 col-sm-6 text-cente d-none d-sm-inline-block">
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
  <nav class="navbar navbar-expand-lg navbar-light  ">
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
                    <li class="nav-item active"><a class="nav-link" href="index.php">HOME</a></li>
                    <li class="nav-item "><a class="nav-link" href="courses.php">COURSES</a></li>
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

<!-- Carousel slide Section -->
<div id="carouselExample" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url('img/bg_1.jpg');">
            <img src="img/bg_1.jpg" alt="Slider" style="display: none;">
            <div class="overlay-bg"></div>
            <div class="container d-flex align-items-center">
                <div class="wrap-caption">
                    <h4 class="caption-supheading">Welcome to Kids</h4>
                    <h1 class="caption-heading">Best Kindergarten at the Middle East</h1>
                </div>
            </div>
        </div>
        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url('img/bg_2.jpg');">
            <img src="img/bg_2.jpg" alt="Slider" style="display: none;">
            <div class="overlay-bg"></div>
            <div class="container d-flex align-items-center">
                <div class="wrap-caption">
                    <h4 class="caption-supheading">Welcome to Kids</h4>
                    <h1 class="caption-heading">Best Kindergarten at the Middle East</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel Controls -->
    <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- Services Section -->
<!-- Custom Card Section -->
<div class="custom-container container-fluid" style="margin-top: -90px; position: relative; z-index: 1;">
    <div class="custom-card">
        <div class="custom-circle">
            <h2>01</h2>
        </div>
        <div class="custom-content">
            <p>Interactive games for ages 4-7 introduce basic coding concepts through fun, story-driven narratives with colorful characters and engaging scenarios.</p>

            <a href="#">Read More</a>
        </div>
    </div>
    <div class="custom-card">
        <div class="custom-circle">
            <h2>02</h2>
        </div>
        <div class="custom-content">
            <p>For ages 8-12, simplified programming languages like Scratch and Python teach logic, problem-solving, and project-based learning.</p>
            <a href="#">Read More</a>
        </div>
    </div>
    <div class="custom-card">
        <div class="custom-circle">
            <h2>03</h2>
        </div>
        <div class="custom-content">
            <p>For ages 13-18, explore diverse programming languages like JavaScript and Python, and gain insights into potential technology careers.</p>
            <a href="#">Read More</a>
        </div>
    </div>
</div>

<!-- Video Section -->
<section class="video-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="section-heading">Explore with Us!</h2>
                <p>Join us on an exciting adventure in the world of coding! Watch this video to see what <span style="color:#FF7300;">EDUBIN</span> is all about.</p>
                <div class="video-container">
                    <iframe src="img/intro.mp4" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="spacer-20"></div>
            </div>
        </div>
    </div>
</section>


<!-- Games Section -->
<section class="unique-section">
    <div class="col-md-12 text-center">
        <h2 class="section-heading" style="margin-bottom:50px">Interactive games</h2>
        <ul class="unique-cards">
            <li>
                <a href="games/Learn chemistry/index.html" class="unique-card">
                    <img src="img/chemical.jpg" class="unique-card__image" alt="" />
                    <div class="unique-card__overlay">
                        <div class="unique-card__header">
                            <img class="unique-card__thumb" src="img/favicon.png" alt="" />
                            <div class="unique-card__header-text">
                                <h3 class="unique-card__title">Learn chemistry while you play</h3>
                                <span class="unique-card__status">13-18</span>
                            </div>
                        </div>
                        <p class="unique-card__description">This interactive chemistry game engages students by teaching them about the elements of the modern periodic table and chemical reactions in a fun, interactive way. Discover the fascinating world of chemistry while playing!</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="games/Brain-Train/index.html" class="unique-card">
                    <img src="img/brain_train_logo.png" class="unique-card__image" alt="" />
                    <div class="unique-card__overlay">
                        <div class="unique-card__header">
                        <img class="unique-card__thumb" src="img/favicon.png" alt="" />
                            <div class="unique-card__header-text">
                                <h3 class="unique-card__title">Brain-Train</h3>
                                <span class="unique-card__status">13-18</span>
                            </div>
                        </div>
                        <p class="unique-card__description">Brain Train is a fun and challenging math puzzle game designed to give your brain a workout. Select your difficulty level and put your problem-solving skills to the test. Are you ready to train your brain?</p>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</section>

 <!-- Courses Section -->
 <section class="ftco-section container-fluid">
    <div class="row justify-content-center mb-5 pb-2">
        <div class="col-md-8 text-center heading-section ftco-animate fadeInUp ftco-animated">
            <h2 class="mb-4"><span>Our</span> Courses</h2>
        </div>
    </div>

    <div class="row">
    <section class="ftco-section container-fluid">
    <div class="row">
        <?php
        $counter=0;

        // Array of courses (you can replace this with your actual data source)
        include 'get_info_courses.php';
        
        foreach ($courses as $course) {
            if ($counter > 2) {
                break;
            }
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
            $counter++;

        }
        ?>
    </div>
</section>
        
    </div>
</section>

 <!-- teacher Sec-->

<!-- teacher Section -->
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-8 text-center heading-section ftco-animate fadeInUp ftco-animated">
                <h2 class="mb-4"><span>Our</span> Teacher </h2>
                
            </div>
        </div>	
        <!-- teacher Card Section -->
            <div class="row custom-container container-fluid" style="margin: 30px 0;">
                <div class="box">
                    <span style="--i:1;" data-name="Mahmoud Mekkawy" ><img src="uploads/te (1).jpeg"></span>
                    <span style="--i:2;" data-name="Mohamed EL-Fayomi" ><img src="uploads/te (2).jpeg"></span>
                    <span style="--i:3;" data-name="Mustafa Mohamed" ><img src="uploads/MustafaMohamed.jpg"></span>
                    <span style="--i:4;" data-name="Mustafa Nasser" ><img src="uploads/MustafaNasser.jpg"></span>
                    
                </div>
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
    <div class="row align-items-center footerr  " style="height: 40px;">
        <div class="col-12 text-center">
            <div class=" d-flex justify-content-center">
                <p class="text-white mb-0">Copyright 2023 © EDUBIN</p>
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