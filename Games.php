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
                    <li class="nav-item "><a class="nav-link" href="courses.php">COURSES</a></li>
                    <li class="nav-item active"><a class="nav-link" href="Games.php">GAMES</a></li>
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
            <div class="title-page">Interactive games</div>
        </div>
        <div class="d-flex justify-content-center mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Interactive games</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
</div>


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
<section class="unique-section">
        <ul class="unique-cards">
            <li>
                <a href="games/Math4Kids-main/Math/index.html" class="unique-card">
                    <img src="img/math2.jpg" class="unique-card__image" alt="" />
                    <div class="unique-card__overlay">
                        <div class="unique-card__header">
                            <img class="unique-card__thumb" src="img/favicon.png" alt="" />
                            <div class="unique-card__header-text">
                                <h3 class="unique-card__title">Learn Math while you play</h3>
                                <span class="unique-card__status">7-12</span>
                            </div>
                        </div>
                        <p class="unique-card__description">This interactive math game engages children by teaching them the fundamentals of mathematics in a fun and interactive way. Discover the exciting world of math while playing! This game helps children improve their calculation skills and problem-solving abilities, making learning an enjoyable and thrilling experience.</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="games/speed-test/index.html" class="unique-card">
                    <img src="img/speed-test.jpg" class="unique-card__image" alt="" />
                    <div class="unique-card__overlay">
                        <div class="unique-card__header">
                        <img class="unique-card__thumb" src="img/favicon.png" alt="" />
                            <div class="unique-card__header-text">
                                <h3 class="unique-card__title">speed-test</h3>
                                <span class="unique-card__status">13-18</span>
                            </div>
                        </div>
                        <p class="unique-card__description">Speed Test is an exhilarating challenge designed to test your reflexes and accuracy. Choose your preferred difficulty level and prepare to engage in rapid-fire tasks that demand quick thinking and precision. Ready to push your limits and see how fast you can react? Get ready for a high-speed mental workout!</p>                    </div>
                </a>
            </li>
         
        </ul>
</section>
<section class="unique-section">
        <ul class="unique-cards">
          
            <li>
                <a href="games/game-arrengment/index.html" class="unique-card">
                    <img src="img/game arrengment.png" class="unique-card__image" alt="" />
                    <div class="unique-card__overlay">
                        <div class="unique-card__header">
                            <img class="unique-card__thumb" src="img/favicon.png" alt="" />
                            <div class="unique-card__header-text">
                                <h3 class="unique-card__title">game arrengment</h3>
                                <span class="unique-card__status">13-18</span>
                            </div>
                        </div>
                        <p class="unique-card__description">Code Arranger is a straightforward game where you organize snippets of code into the correct sequence. Sharpen your coding skills by arranging the segments in the right order to solve challenges and complete tasks. Ready to organize and optimize your code efficiently?</p>                    </div>
                </a>
            </li>
            <li>
                <a href="games/pacman/index.html" class="unique-card">
                    <img src="img/pacman.png" class="unique-card__image" alt="" />
                    <div class="unique-card__overlay">
                        <div class="unique-card__header">
                        <img class="unique-card__thumb" src="img/favicon.png" alt="" />
                            <div class="unique-card__header-text">
                                <h3 class="unique-card__title">pacman</h3>
                                <span class="unique-card__status">7-12</span>
                            </div>
                        </div>
                        <p class="unique-card__description">The Adventure Directions game is an interactive educational tool where children learn directional commands like right, left, up, and down by guiding characters through mazes and challenges</p>
                    </div>
                </a>
            </li>
        </ul>
</section>
<section class="unique-section">
        <ul class="unique-cards">
          
            <li>
                <a href="games/Flowchart/index.html" class="unique-card">
                    <img src="img/Flowchart.png" class="unique-card__image" alt="" />
                    <div class="unique-card__overlay">
                        <div class="unique-card__header">
                            <img class="unique-card__thumb" src="img/favicon.png" alt="" />
                            <div class="unique-card__header-text">
                                <h3 class="unique-card__title">FlowChart</h3>
                                <span class="unique-card__status">13-18</span>
                            </div>
                        </div>
                        <p class="unique-card__description">Flowchart Explorer is a fun game where you learn coding concepts using flowcharts. Arrange flowchart symbols in the right order to solve puzzles and complete tasks, helping you grasp coding logic visually. Ready to master coding with flowcharts?</p>                   </div>
                </a>
            </li>
            <li>
                <a href="Conditional_Loop_Game.php" class="unique-card">
                    <img src="img/Loopgame.PNG" class="unique-card__image" alt="" />
                    <div class="unique-card__overlay">
                        <div class="unique-card__header">
                        <img class="unique-card__thumb" src="img/favicon.png" alt="" />
                            <div class="unique-card__header-text">
                                <h3 class="unique-card__title">Conditional_Loop_Game</h3>
                                <span class="unique-card__status">13-18</span>
                            </div>
                        </div>
                        <rn class="unique-card__description">learn code with game</p>
                    </div>
                </a>
            </li>
        </ul>
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