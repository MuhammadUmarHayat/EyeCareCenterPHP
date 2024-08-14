<?php
include 'db_actions.php';

$id= $_GET['id'];
$status="completed";

 $result=updateAppointmentStatus($id,$status);
 if($result){
echo "Completed";
 }
?>