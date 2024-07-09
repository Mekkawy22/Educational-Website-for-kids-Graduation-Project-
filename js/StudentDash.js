document.addEventListener('DOMContentLoaded', function() {
  // Fetch the data from the PHP script
  fetch('studentDashData.php')
  .then(response => response.json())
  .then(data => {
      // Process tasks data for chart
      const taskTitles = data.tasks.map(task => task.Title);
      const taskGrades = data.tasks.map(task => task.grade);

      // Process courses data for chart
      const courseNames = data.courses.map(course => course.Course_Name);
      const teacherNames = data.courses.map(course => course.teacher_fname);

      // Create gradient for task chart
      const ctx1 = document.getElementById('tasksChart').getContext('2d');
      const gradient1 = ctx1.createLinearGradient(0, 0, 0, 400);
      gradient1.addColorStop(0, 'rgba(255, 223, 186, 0.8)'); // Near yellow
      gradient1.addColorStop(1, 'rgba(255, 223, 186, 0.2)'); // Near yellow

      // Create tasks chart
      const tasksChart = new Chart(ctx1, {
          type: 'bar',
          data: {
              labels: taskTitles,
              datasets: [{
                  label: 'Grades',
                  data: taskGrades,
                  backgroundColor: gradient1,
                  borderColor: 'rgba(255, 215, 0, 1)', // Golden border
                  borderWidth: 1
              }]
          },
          options: {
              scales: {
                  y: {
                      beginAtZero: true,
                      grid: {
                          display: false // Remove grid lines
                      }
                  },
                  x: {
                      grid: {
                          display: false // Remove grid lines
                      }
                  }
              },
              plugins: {
                  legend: {
                      display: false // Remove legend
                  },
                  tooltip: {
                      backgroundColor: 'rgba(255, 223, 186, 0.8)', // Change tooltip background color
                      titleFont: {
                          size: 16
                      },
                      bodyFont: {
                          size: 14
                      }
                  }
              }
          }
      });

      // Create gradient for course chart
      const ctx2 = document.getElementById('coursesChart').getContext('2d');
      const gradient2 = ctx2.createLinearGradient(0, 0, 0, 400);
      gradient2.addColorStop(0, 'rgba(255, 99, 132, 0.8)'); // Near watermelon
      gradient2.addColorStop(1, 'rgba(255, 99, 132, 0.2)'); // Near watermelon

      // Create courses chart
      const coursesChart = new Chart(ctx2, {
          type: 'doughnut', // Change chart type to doughnut
          data: {
              labels: courseNames,
              datasets: [{
                  label: 'Courses',
                  data: Array(courseNames.length).fill(1), // Dummy data for pie slices
                  backgroundColor: courseNames.map((_, index) => {
                      const colors = ['rgba(255, 223, 186, 0.7)', 'rgba(255, 215, 0, 0.7)', 'rgba(255, 99, 132, 0.7)', 'rgba(135, 206, 250, 0.7)'];
                      return colors[index % colors.length];
                  }), // Dynamic colors
                  borderColor: 'rgba(255, 255, 255, 1)', // White border
                  borderWidth: 2 // Set border width to 2
              }]
          },
          options: {
              plugins: {
                  legend: {
                      display: true,
                      position: 'right' // Position legend to the right
                  },
                  tooltip: {
                      callbacks: {
                          label: function(context) {
                              return teacherNames[context.dataIndex];
                          }
                      }
                  }
              }
          }
      });
  })
  .catch(error => console.error('Error:', error));
});



function showStudentDashboard(link) {
    hideCards();
    document.getElementById('dashboard').style.display = 'block';
    setActiveLink(link);

  }

  function showStudentCourse(link) {
    hideCards();
    document.getElementById('coursesTableModal').style.display = 'block';
    setActiveLink(link);

  }

  function showStudentProfile() {
      hideCards();
      document.getElementById('profileModal').style.display = 'block';
    }
  function showStudentEditProfile() {
      hideCards();
      document.getElementById('EditprofileModal').style.display = 'block';
    }
    function showSingleCourse() {
        hideCards();
        document.getElementById('corses-singel').style.display = 'block';
      }
      function Takequiz() {
        hideCards();
        document.getElementById('Takequiz').style.display = 'block';
      }
      function showDiscoverCourse(link) {
        hideCards();
        document.getElementById('DiscoverCourses').style.display = 'block';
        setActiveLink(link);

      }
      function courseDetails() {
        hideCards();
        document.getElementById('courseDetail').style.display = 'block';
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
    document.getElementById('corses-singel').style.display = 'none';
    document.getElementById('profileModal').style.display = 'none';
    document.getElementById('EditprofileModal').style.display = 'none';
    document.getElementById('Takequiz').style.display = 'none';
    document.getElementById('DiscoverCourses').style.display = 'none';
    document.getElementById('courseDetail').style.display = 'none';
 }
