<?php 
session_start();
require "../UltraDBLayer.php";
$db = new UltraDBLayer();

$studentId=$db->validate(strtoupper($_POST['student_id']));
$name=$db->validate(strtoupper($_POST['name']));
$gender=$db->validate($_POST['gender']);
$email=$db->validate(strtolower($_POST['email']));
$level=$db->validate($_POST['level']);
$phone=$db->validate($_POST['phone']);
$program=$db->validate($_POST['program']);
$admission_year=$db->validate($_POST['admission_year']);
$centre=$db->validate($_POST['centre']);
$password = password_hash('123456',PASSWORD_DEFAULT);

(string) $table = "students";
(array) $fields[] = "studentid,name,gender,email,phone,level,program,academic_year,center,password";
(array) $values[] = "'$studentId','$name','$gender','$email','$phone','$level','$program','$admission_year','$centre','$password'";

if($_SERVER['REQUEST_METHOD']=='POST'){
    if(empty($_POST['_token']) || $_POST['_token'] != $_SESSION['_token']){
        echo ('Invalid CSRF token');
    }else{
        echo $db->insert_data($table,$fields,$values);
    }
}
   
?>