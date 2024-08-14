<?php
include 'db_actions.php';
$id= $_GET['id'];
$status="cancelled";

 $result=updateAppointmentStatus($id,$status);
 if($result){
echo "Cancelled";
 }
?>