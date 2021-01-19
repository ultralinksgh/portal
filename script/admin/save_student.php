<?php 
session_start();
require "../UltraDBLayer.php";
$db = new UltraDBLayer();

$token = $db->validate($_POST["_token"]);
$studentId=$db->validate(strtoupper($_POST['student_id']));
$name=$db->validate(strtoupper($_POST['name']));
$email=$db->validate(strtolower($_POST['email']));
$level=$db->validate($_POST['level']);
$phone=$db->validate($_POST['phone']);
$program=$db->validate($_POST['program']);
$admission_year=$db->validate($_POST['admission_year']);
$centre=$db->validate($_POST['centre']);

(string) $table = "students";
(array) $fields[] = "studentid,name,email,phone,level,program,academic_year,centre";
(array) $values[] = "'$studentId','$name','$email','$phone','$level','$program','$admission_year','$centre'";

if($_SERVER['REQUEST_METHOD']=='POST'){
    if(empty($_POST['_token']) || $_POST['_token'] != $_SESSION['_token']){
        echo ('Invalid CSRF token');
    }else{
        echo $db->insert_data($table,$fields,$values);
    }
}
   
?>