<?php 
session_start();
require "../UltraDBLayer.php";
$db = new UltraDBLayer();

$courseIds=($_POST['course_ids']);
$staffId=$db->validate($_POST['staff_id']);
$academicYear=$db->validate($_POST['academic_year']);


if($_SERVER['REQUEST_METHOD']=='POST'){
    if(empty($_POST['_token']) || $_POST['_token'] != $_SESSION['_token']){
        echo ('Invalid CSRF token');
    }else{
        foreach($courseIds as $courseid){
            $conn = $db->connection();
            $exec = mysqli_query($conn, "INSERT INTO courses_allocation(staffid,courseid,academic_year) VALUES('$staffId', '$courseid','$academicYear')") or die(mysqli_error($conn));
        }
        if($exec){
            echo 'success';
        }
    }
}
   
?>