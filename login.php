<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags for character set and viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.css">

    <!-- Title and additional stylesheets -->
    <title>Login</title>
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fontasome/fontawesome-free-6.4.2-web/css/all.min.css">
</head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
</head>
<body class="d-flex align-items-center justify-content-center">
    <div class="containerr" id="container">
      
        <div class="form-container sign-up">
        <form class="signUp-Form" action="register.php" method="POST">
    <h1>Create Account</h1>
    <div class="social-icons">
        <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
        <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
        <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
    </div>
    <span>or use your email for registration</span>
    
    <!-- First and Last Name side by side -->
    <div class="input-group">
        <input type="text" name="first_name" id="SignUpFirstName" placeholder="First Name" required>
        <input type="text" name="last_name" id="SignUpLastName" placeholder="Last Name" required>
    </div>

    <input type="email" name="email" id="SignUpEmail" placeholder="Email" required>
    <input type="password" name="password" id="SignUpPassword" placeholder="Password" required>
    <input type="password" id="ConfirmPassword" placeholder="Confirm Password" required>

    <label for="userType">Select User Type:</label>
    <select class="user-type-select" name="userType" id="userType" required>
        <option value="student">Student</option>
        <option value="teacher">Teacher</option>
    </select>

    <button type="submit" name="Sign_Up"> Sign Up</button>
</form>

            
        </div>
        
        <div class="form-container sign-in">
        <form class="signIn-Form" action="signin_process.php" method="POST" onsubmit="return Validation()">
        <h1>Sign In</h1>
        <div class="social-icons">
            <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
        </div>
        <span>or use your email password</span>
        <input type="email" name="email" id="Email" placeholder="Email" required>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <a href="#" onclick="showForgotPasswordForm()">Forgot Your Password?</a>
                <button type="submit" name="Sign_in"> Sign In</button>
            </form>
        </div>
        <!-- Forgot Password form -->
        <div class="form-container forgot-password" style="display: none;">
            <form class="forgot-password-form" onsubmit="return ForgotPasswordValidation()">
                <h1>Forgot Password</h1>
                <p>Enter your email to reset your password</p>
                <input type="email" id="forgotPasswordEmail" placeholder="Email">
                <button>Reset Password</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of the site features</p>
                    <button class="hidden" id="login" onclick="showSignInForm()">Sign In</button>
                    <a href="index.php" class="go-to-home-link">Go to Home</a>

                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of the site features</p>
                    <button class="hidden" id="register" onclick="showSignUpForm()">Sign Up</button>
                    <a href="index.php" class="go-to-home-link">Go to Home</a>

                </div>
            </div>

        </div>
    </div>
 
<!-- Bootstrap JS and Popper.js (required for Bootstrap) -->
<script src="js/index.js"></script>
<script src="bootstrap-4.3.1-dist/js/popper.min.js"></script>
<script src="bootstrap-4.3.1-dist/js/jquery-3.7.1.min.js"></script>
<script src="bootstrap-4.3.1-dist/js/bootstrap.js"></script>

</body>
</html>
