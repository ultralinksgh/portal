<?php 
session_start();
require "../UltraDBLayer.php";
$db = new UltraDBLayer();

$academic_year=$db->validate($_POST['academic_year']);
$start_registration_date=$db->validate($_POST['start_registration_date']);
$end_registration_date=$db->validate($_POST['end_registration_date']);
$late_start_date=$db->validate($_POST['late_start_date']);
$late_end_date=$db->validate($_POST['late_end_date']);

(string) $table = "course_registration_settings";
(array) $fields[] = "academic_year,start_registration_date,end_registration_date,late_start_date,late_end_date";
(array) $values[] = "'$academic_year','$start_registration_date','$end_registration_date','$late_start_date','$late_end_date'";
(string) $condition = "academic_year='$academic_year'";

if($_SERVER['REQUEST_METHOD']=='POST'){
    if(empty($_POST['_token']) || $_POST['_token'] != $_SESSION['_token']){
        echo ('Invalid CSRF token');
    }else{
        $countExistingRecord = $db->count_rows_on_condition($table, $condition);
        if($countExistingRecord > 0){
            echo $academic_year." course registration is already set";
            exit();
        }
        echo $db->insert_data($table,$fields,$values);
    }
}
   
?>