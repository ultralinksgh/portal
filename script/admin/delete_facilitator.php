<?php 
session_start();
require "../UltraDBLayer.php";
$db = new UltraDBLayer();

$id = $db->validate($_POST["id"]);

(string) $table = "facilitators";
(string) $condition = "id='$id'";

if($_SERVER['REQUEST_METHOD']=='POST'){
    if(empty($_POST['_token']) || $_POST['_token']!=$_SESSION['_token']){
        echo ('Invalid CSRF token');
    }else{
        echo delete_record_on_condition($table, $condition);
    }
}
   
?>