<?php 
session_start();
require "../UltraDBLayer.php";
$db = new UltraDBLayer();

$staffId=$db->validate($_POST['staff_id']);
$name=$db->validate(strtoupper($_POST['name']));
$email=$db->validate(strtolower($_POST['email']));
$phone=$db->validate($_POST['phone']);

$defaultPassword = password_hash("123456", PASSWORD_DEFAULT);

(string) $table = "facilitators";
(array) $fields[] = "staffid,name,email,phone,password";
(array) $values[] = "'$staffId','$name','$email','$phone','$defaultPassword'";

if($_SERVER['REQUEST_METHOD']=='POST'){
    if(empty($_POST['_token']) || $_POST['_token'] != $_SESSION['_token']){
        echo ('Invalid CSRF token');
    }else{
        echo $db->insert_data($table,$fields,$values);
    }
}
   
?>