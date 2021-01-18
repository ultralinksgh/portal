<?php 
session_start();
require "../UltraDBLayer.php";
$db = new UltraDBLayer();

$studentId=$db->validate($_POST['student_id']);
$name=$db->validate($_POST['name']);
$email=$db->validate($_POST['email']);
$level=$db->validate($_POST['level']);
$phone=$db->validate($_POST['phone']);
$program=$db->validate($_POST['program']);
$academic_year=$db->validate($_POST['academic_year']);

(string) $table = "students";
(array) $fields[] = "studentid,name,email,phone,level,program,academic_year";
(array) $values[] = "'$studentId','$name','$email','$phone','$level','$program','$academic_year'";

if($_SERVER['REQUEST_METHOD']=='POST'){
    if(empty($_POST['_token']) || $_POST['_token'] != $_SESSION['_token']){
        echo ('Invalid CSRF token');
    }else{
        echo insert_data($table,$fields,$values);
    }
}
   
?>