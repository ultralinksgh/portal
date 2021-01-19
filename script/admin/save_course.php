<?php 
session_start();
require "../UltraDBLayer.php";
$db = new UltraDBLayer();

$course_code=$db->validate(strtoupper($_POST['course_code']));
$course_title=$db->validate(strtoupper($_POST['course_title']));
$credit=$db->validate($_POST['credit']);
$trimester=$db->validate($_POST['trimester']);
$course_level=$db->validate($_POST['course_level']);

(string) $table = "courses";
(array) $fields[] = "course_code,course_title,credit,trimester,course_level";
(array) $values[] = "'$course_code','$course_title','$credit','$trimester','$course_level'";

if($_SERVER['REQUEST_METHOD']=='POST'){
    if(empty($_POST['_token']) || $_POST['_token'] != $_SESSION['_token']){
        echo ('Invalid CSRF token');
    }else{
        echo $db->insert_data($table,$fields,$values);
    }
}
   
?>