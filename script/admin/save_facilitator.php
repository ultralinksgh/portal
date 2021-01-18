<?php 
session_start();
require "../UltraDBLayer.php";
$db = new UltraDBLayer();

$staffId=$db->validate($_POST['staff_id']);
$name=$db->validate($_POST['name']);
$email=$db->validate($_POST['email']);
$phone=$db->validate($_POST['phone']);

(string) $table = "facilitators";
(array) $fields[] = "staffid,name,email,phone";
(array) $values[] = "'$staffId','$name','$email','$phone'";

if($_SERVER['REQUEST_METHOD']=='POST'){
    if(empty($_POST['_token']) || $_POST['_token'] != $_SESSION['_token']){
        echo ('Invalid CSRF token');
    }else{
        echo insert_data($table,$fields,$values);
    }
}
   
?>