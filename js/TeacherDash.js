document.addEventListener("DOMContentLoaded", function() {
  // Fetch data from the server using the fetch API
  fetch('data.php')
      // Once the data is fetched, convert the response to JSON format
      .then(response => {
          if (!response.ok) {
              throw new Error('Network response was not ok');
          }
          return response.json();
      })
      // Once the JSON data is available, proceed with rendering pie charts
      .then(data => {
          // Call a function to render pie charts with the fetched data
          renderCharts(data.studentPlaces, data.courseEnrollment);
      })
      // If there's any error during the fetching process, log the error to the console
      .catch(error => console.error('Error fetching data:', error));
});

function renderCharts(studentPlacesData, courseEnrollmentData) {
  // Render your charts using the provided data

  // Function to draw the bar chart for student places
  function drawBarChart(data, canvasId, title) {
      var canvas = document.getElementById(canvasId);
      if (!canvas) {
          console.error(`Canvas with id ${canvasId} not found`);
          return;
      }
      canvas.width = 400; // Set the width of the canvas to 400 pixels
      canvas.height = 200; // Set the height of the canvas to 200 pixels
      var ctx = canvas.getContext("2d"); // Define ctx here

      new Chart(ctx, {
          type: "bar",
          data: {
              labels: Object.keys(data), // Use keys from data as labels
              datasets: [{
                  label: title,
                  data: Object.values(data), // Use values from data as chart data
                  backgroundColor: "#36A2EB", // Bar color
                  borderColor: "#36A2EB", // Border color
                  borderWidth: 1 // Border width
              }],
          },
          options: {
              title: {
                  display: true,
                  text: title
              },
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero: true
                      }
                  }]
              }
          }
      });
  }

  // Draw the bar charts with the provided data
  drawBarChart(studentPlacesData, "studentsBarChart", "Student Places");
  drawBarChart(courseEnrollmentData, "coursesBarChart", "Course Enrollment");
}



// edit profil
function toggleSection(section) {
    const profileSection = document.getElementById('profileSection');
    const securitySection = document.getElementById('securitySection');

    const profileNav = document.querySelector('#accountNav a:nth-child(1)');
    const securityNav = document.querySelector('#accountNav a:nth-child(2)');

    if (section === 'profile') {
        profileSection.style.display = 'block';
        securitySection.style.display = 'none';
        profileNav.classList.add('active');
        securityNav.classList.remove('active');
    } else if (section === 'security') {
        profileSection.style.display = 'none';
        securitySection.style.display = 'block';
        profileNav.classList.remove('active');
        securityNav.classList.add('active');
    }
}  

function showTeacherDashboard(link) {
  hideCards();
  document.getElementById('dashboard').style.display = 'block';
  setActiveLink(link);

}

function showTeacherCourse(link) {
  hideCards();
  document.getElementById('coursesTableModal').style.display = 'block';
  setActiveLink(link);

  
}

function showTeacherAddCourse(link) {
  hideCards();
  document.getElementById('AddCourse').style.display = 'block';
  setActiveLink(link);

}

function showTeacherAddLesson(link) {
  hideCards();
  document.getElementById('AddLesson').style.display = 'block';
  setActiveLink(link);


}

function showTeacherAddQuiz(link) {
  hideCards();
  document.getElementById('createquiz').style.display = 'block';
  setActiveLink(link);


}

function showTeacherEnrollmentsTable(link) {
  hideCards();
  document.getElementById('enrollmentsTableModal').style.display = 'block';
  setActiveLink(link);

}
function showTeacherProfile() {
    hideCards();
    document.getElementById('profileModal').style.display = 'block';
  }
function showTeacherEditProfile() {
    hideCards();
    document.getElementById('EditprofileModal').style.display = 'block';
  }
  function showSingleCourse() {
    hideCards();
    document.getElementById('corses-singel').style.display = 'block';
  }
  function showTeacherdeleteLesson() {
    hideCards();
    document.getElementById('DeleteLesson').style.display = 'block';
  }
  function setActiveLink(link) {
    var links = document.querySelectorAll('.list-group-item');
    links.forEach(function (el) {
      el.classList.remove('active');
    });

    link.classList.add('active');
  }


function hideCards() {
  document.getElementById('dashboard').style.display = 'none';
  document.getElementById('coursesTableModal').style.display = 'none';
  document.getElementById('enrollmentsTableModal').style.display = 'none';
  document.getElementById('AddLesson').style.display = 'none';
  document.getElementById('AddCourse').style.display = 'none';
  document.getElementById('createquiz').style.display = 'none';
  document.getElementById('profileModal').style.display = 'none';
  document.getElementById('EditprofileModal').style.display = 'none';
  document.getElementById('corses-singel').style.display = 'none';
  document.getElementById('DeleteLesson').style.display = 'none';


  }   