/*login form*/
function showForgotPasswordForm() {
    const container = document.getElementById('container');
    container.classList.remove("active");
    document.querySelector('.sign-in').style.display = 'none';
    document.querySelector('.sign-up').style.display = 'none';
    document.querySelector('.forgot-password').style.display = 'block';
}

function showSignInForm() {
    const container = document.getElementById('container');
    container.classList.remove("active");
    document.querySelector('.sign-in').style.display = 'block';
    document.querySelector('.sign-up').style.display = 'none';
    document.querySelector('.forgot-password').style.display = 'none';
}

function showSignUpForm() {
    const container = document.getElementById('container');
    container.classList.add("active");
    document.querySelector('.sign-in').style.display = 'none';
    document.querySelector('.sign-up').style.display = 'block';
    document.querySelector('.forgot-password').style.display = 'none';
} 
/* login validation*/
function Validation() {
    var email = document.getElementById('Email').value.trim();
    var password = document.getElementById('password').value.trim();
    
    if (email === "" || password === "") {
        alert("Please enter your email and password");
        return false; // Prevent form submission if values are empty
    }

    return true; // Allow form submission if validation passes
}

/* sign-up validation */
function SignUpValidation() {
    var name = document.getElementById('SignUpName').value.trim();
    var email = document.getElementById('SignUpEmail').value.trim();
    var password = document.getElementById('SignUpPassword').value.trim();
    
    if (name === "" || email === "" || password === "") {
        alert("Please enter your name, email, and password");
        return false; // Prevent form submission if values are empty
    }

    return true; // Allow form submission if validation passes
}
// scroll//
document.addEventListener("DOMContentLoaded", function () {
    var topHeader = document.querySelector(".top-header");
    var lastScrollTop = 0;

    window.addEventListener("scroll", function () {
      var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

      if (scrollTop > 50) {
        // Scroll down more than 50 pixels, hide the top header
        topHeader.style.display = "none";
      } else {
        // Scroll up or at the top, show the top header
        topHeader.style.display = "block";
      }

      lastScrollTop = scrollTop;
    });
  });
  
  // number 
  // Function to animate counting from 0 to a specified number
function animateCount(targetElement, targetValue, duration) {
    let currentCount = 0;
    const step = targetValue / (duration / 10);

    const interval = setInterval(() => {
        currentCount += step;
        document.getElementById(targetElement).innerText = Math.floor(currentCount);

        if (currentCount >= targetValue) {
            clearInterval(interval);
            document.getElementById(targetElement).innerText = targetValue;
        }
    }, 10);
}

// Set the target numbers and animation duration (in milliseconds)
const studentsCountTarget = 50;
const teachersCountTarget = 10;
const coursesCountTarget = 10;
const activeStudentsCountTarget = 25;

// Adjust the duration according to your preference
const animationDuration = 3000;

// Trigger the counting animation when the document is fully loaded
document.addEventListener("DOMContentLoaded", function() {
    animateCount("studentsCount", studentsCountTarget, animationDuration);
    animateCount("teachersCount", teachersCountTarget, animationDuration);
    animateCount("coursesCount", coursesCountTarget, animationDuration);
    animateCount("activeStudentsCount", activeStudentsCountTarget, animationDuration);
});
// Wait for the DOM content to be fully loaded before executing the script
document.addEventListener("DOMContentLoaded", function () {
    var scrollButton = document.getElementById("scroll-to-top");

    window.addEventListener("scroll", function () {
        scrollButton.style.display = (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) ? "block" : "none";
    });

    scrollButton.addEventListener("click", function () {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    });
});


