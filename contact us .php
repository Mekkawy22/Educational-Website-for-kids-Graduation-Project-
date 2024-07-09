<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags for character set and viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.css">

    <!-- Title and additional stylesheets -->
    <title>Contact us</title>
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fontasome/fontawesome-free-6.4.2-web/css/all.min.css">
</head>
<body>

<!-- Header Section -->
<header class="heade fixed-top">
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
                <div class="col-md-6 col-sm-6 text-center  d-none d-sm-inline-block">
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
                    <li class="nav-item "><a class="nav-link" href="courses.php">COURSES</a></li>
                    <li class="nav-item "><a class="nav-link" href="Games.php">GAMES</a></li>
                    <li class="nav-item"><a class="nav-link" href="Teachers.php">TEACHER</a></li>
                    <li class="nav-item active"><a class="nav-link" href="contact us .php">CONTACT US</a></li>
                </ul>
                <button class="btn  login-btn" type="button">
                    <a href="login.php" class="text-white" style="text-decoration: none;">Join Us</a>
                </button>
            </div>
        </div>
    </nav>
</header>

<!-- Banner Section -->
<div class="section banner-page  carousel" style="background-image: url('img/bg_1.jpg');">
    <div class="content-wrap pos-relative">
        <div class="d-flex justify-content-center mb-3">
            <div class="title-page">Contact</div>
        </div>
        <div class="d-flex justify-content-center mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<section class="contact-body">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6 align-self-center">
                <div class="contact-container">
                    <div class="contact-label text-center">
                        <h3>Contact Us</h3>
                    </div>
                    <div class="contact-form-container">
                            <form class="contact-form" action="insert_data.php" method="post">
                                <label for="contactName" class="label-contact">Your Name:</label>
                                <input type="text" id="contactName" class="input-contact" name="contactName" placeholder="Enter Your Name" required>
                                
                                <label for="subject" class="label-contact">Subject:</label>
                                <input type="text" id="subject" class="input-contact" name="subject" placeholder="Enter Your Subject" required>

                                <label for="contactEmail" class="label-contact">Your Email:</label>
                                <input type="email" id="contactEmail" class="input-contact" name="contactEmail" placeholder="Enter Your Email" required>
                                
                                <label for="phoneNumber" class="label-contact">Phone Number:</label>
                                <input type="tel" id="phoneNumber" class="input-contact" name="phoneNumber" placeholder="Enter Your Phone Number" required>

                                <label for="message" class="label-contact">Message:</label>
                                <textarea id="contactMessage" class="input-contact" name="contactMessage" rows="6" placeholder="Enter Your Message" style="z-index: auto !important;" spellcheck="false" required></textarea>
                                
                                <div class="contact-button">
                                    <button type="submit" class="button-contact">Send Message</button>
                                </div>
                            </form>
                    </div>

                </div>
            </div>
            <div class="col-md-6 map-container align-self-center">
                <!-- Google Map iframe -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d110502.77769368565!2d31.176062278592564!3d30.05946276120533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583fa60b21beeb%3A0x79dfb296e8423bba!2sCairo%2C%20Cairo%20Governorate!5e0!3m2!1sen!2seg!4v1700852713268!5m2!1sen!2seg" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>

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
    <div class="row align-items-center footerr  " >
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