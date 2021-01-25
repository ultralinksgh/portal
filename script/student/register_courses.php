<?php 
session_start();
require "../UltraDBLayer.php";
$db = new UltraDBLayer();

$courseIds=($_POST['course_ids']);
$trimester=$db->validate($_POST['trimester']);
$academicYear=$db->validate($_POST['academic_year']);


if($_SERVER['REQUEST_METHOD']=='POST'){
    if(empty($_POST['_token']) || $_POST['_token'] != $_SESSION['_token']){
        echo ('Invalid CSRF token');
    }else{
        foreach($courseIds as $courseid){
            $conn = $db->connection();
            $exec = mysqli_query($conn, "INSERT INTO course_registrations(courseid,trimester,academic_year,is_late_registration) VALUES('$courseid', '$trimester','$academicYear', 0)") or die(mysqli_error($conn));
        }
        if($exec){
            echo 'success';
        }
    }
}
   
?>