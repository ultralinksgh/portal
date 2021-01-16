<?php 
session_start();
require "../UltraDBLayer.php";
$db = new UltraDBLayer();

$course_id=$db->validate($_POST['course_id']);
$course_code=$db->validate($_POST['course_code']);
$course_title=$db->validate($_POST['course_title']);
$credit=$db->validate($_POST['credit']);
$trimester=$db->validate($_POST['trimester']);
$course_level=$db->validate($_POST['course_level']);

(string) $table = "courses";
(string) $values = "coursetitle='$course_title', credit='$credit', trimester='$trimester', courselevel='$course_level'";
(string) $condition = "id='$course_id'";

if($_SERVER['REQUEST_METHOD']=='POST'){
    if(empty($_POST['_token']) || $_POST['_token']!=$_SESSION['_token']){
        echo ('Invalid CSRF token');
    }else{
        echo update_record_on_condition($table,$values,$condition);
    }
}
   
?>