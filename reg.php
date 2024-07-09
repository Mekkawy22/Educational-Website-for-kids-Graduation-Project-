<?php 
                                            session_start();

                                            if(isset($_SESSION['login']) && $_SESSION['login'] === true){
                                                // Display welcome message 
                                                $username = $_SESSION['user'];
                                            } else {
                                                // Redirect to login page if not logged in
                                                header("Location: login.php"); 
                                                exit; // Ensure script execution stops after redirection
                                            }

                                            if(isset($_POST['logout'])){
                                                // Unset all session variables
                                               @ session_unset();
                                                // Destroy the session
                                              @  session_destroy();
                                                // Redirect to login page using JavaScript
                                                echo '<script>window.location.href = "login.php";</script>';
                                                exit; // Add exit here to stop further execution
                                            }
                                            ?>
<?php
// تأكد من استدعاء البيانات الخاصة بالطالب
include 'get_info.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // التحقق من وجود بيانات مُرسلة
    if (isset($_POST['course_id_en'])) {
        // استقبال قيمة course_id_en
        $course_id_en = $_POST['course_id_en'];
        echo $course_id_en ;
        // التحقق من وجود معرف طالب صالح في الجلسة
        if (!isset($_SESSION['student_ID'])) {
            die("Session data not found.");
        }
        
        // استرجاع معرف الطالب من الجلسة
        $student_id = $_SESSION['student_ID'];

        // ربط ملف الاتصال بقاعدة البيانات
        include 'db_config.php';

        // إنشاء اتصال جديد بقاعدة البيانات
        $conn = new mysqli($host, $user, $pass, $db);

        // التأكد من نجاح الاتصال
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // إعداد الاستعلام لإدراج السجل
        $sql_enroll = "INSERT INTO `student_course_registration` (`student_ID`, `Course_ID`) VALUES (?, ?)";
        $stmt_enroll = $conn->prepare($sql_enroll);

        // التحقق من نجاح إعداد الاستعلام
        if ($stmt_enroll === false) {
            die('Prepare failed: (' . $conn->errno . ') ' . $conn->error);
        }

        // ربط البيانات وتنفيذ الاستعلام
        $stmt_enroll->bind_param("ii", $student_id, $course_id_en);

        if ($stmt_enroll->execute()) {
            // إغلاق الاستعلام واتصال قاعدة البيانات
            $stmt_enroll->close();
            $conn->close();

            // عرض نافذة منبثقة باستخدام JavaScript
            echo <<<HTML
            <script>
                alert("تم تسجيلك في الدورة بنجاح!");
                window.location.href = 'studentDach.php'; // إعادة التوجيه إلى صفحة studentDash.php
            </script>
            HTML;
        } else {
            echo "<p>حدث خطأ أثناء تسجيلك في الدورة.</p>";
        }
    } else {
        echo "<p>لم يتم استلام course_id_en.</p>";
    }
} else {
    echo "<p>طريقة الطلب غير صحيحة.</p>";
}
?>
