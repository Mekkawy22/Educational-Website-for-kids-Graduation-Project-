// Wait for the DOM content to be fully loaded before executing the code
document.addEventListener("DOMContentLoaded", function() {
    // Fetch data from the server using the fetch API
    fetch('AdminGraphdata.php')
    // Once the data is fetched, convert the response to JSON format
    .then(response => response.json())
    // Once the JSON data is available, proceed with rendering pie charts
    .then(data => {
        // Call a function to render pie charts with the fetched data
        renderCharts(data);
    })
    // If there's any error during the fetching process, log the error to the console
    .catch(error => console.error('Error fetching data:', error));
});

function renderCharts(data) {
    var studentsData = {
        labels: ["Enrolled", "Not Enrolled"],
        datasets: [{
            data: [data.totalStudents, 100 - data.totalStudents],
            backgroundColor: ["#007bff", "#ced4da"],
        }],
    };

    var teachersData = {
        labels: ["Enrolled", "Not Enrolled"],
        datasets: [{
            data: [data.totalTeachers, 100 - data.totalTeachers],
            backgroundColor: ["#b5d56a", "#ced4da"],
        }],
    };

    var coursesData = {
        labels: ["Enrolled", "Not Enrolled"],
        datasets: [{
            data: [data.totalCourses, 100 - data.totalCourses],
            backgroundColor: ["#ff6f6f", "#ced4da"],
        }],
    };

    var studentsPieChart = new Chart(document.getElementById("studentsPieChart"), {
        type: 'pie',
        data: studentsData,
    });

    var teachersPieChart = new Chart(document.getElementById("teachersPieChart"), {
        type: 'pie',
        data: teachersData,
    });

    var coursesPieChart = new Chart(document.getElementById("coursesPieChart"), {
        type: 'pie',
        data: coursesData,
    });
}
function showDashboard(link) {
    hideAllCards();
    document.getElementById('dashboard').style.display = 'block';
    setActiveLink(link);
    localStorage.setItem('activeTab', 'dashboard');
}

function showStudentTable(link) {
    hideAllCards();
    document.getElementById('studentsTableModal').style.display = 'block';
    setActiveLink(link);
    localStorage.setItem('activeTab', 'students');
}

function showTeacherTeble(link) {
    hideAllCards();
    document.getElementById('teachersTableModal').style.display = 'block';
    setActiveLink(link);
    localStorage.setItem('activeTab', 'teachers');
}

function showCourseTable(link) {
    hideAllCards();
    document.getElementById('coursesTableModal').style.display = 'block';
    setActiveLink(link);
    localStorage.setItem('activeTab', 'courses');
}

function showenrollmentsTable(link) {
    hideAllCards();
    document.getElementById('enrollmentsTableModal').style.display = 'block';
    setActiveLink(link);
    localStorage.setItem('activeTab', 'enrollments');
}

function setActiveLink(link) {
    var links = document.querySelectorAll('.list-group-item');
    links.forEach(function (el) {
        el.classList.remove('active');
    });

    link.classList.add('active');
}

function hideAllCards() {
    document.getElementById('dashboard').style.display = 'none';
    document.getElementById('studentsTableModal').style.display = 'none';
    document.getElementById('teachersTableModal').style.display = 'none';
    document.getElementById('coursesTableModal').style.display = 'none';
    document.getElementById('enrollmentsTableModal').style.display = 'none';
}

// تحديد الكارد النشطة عند إعادة تحميل الصفحة
window.onload = function () {
    var activeTab = localStorage.getItem('activeTab');
    if (activeTab) {
        var linkId = activeTab + 'TableLink';
        var activeLink = document.getElementById(linkId);
        if (activeLink) {
            activeLink.click();
        }
    }
};
