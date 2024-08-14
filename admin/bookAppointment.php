<?php
include 'db_actions.php';
$id= $_GET['id'];
$status="booked";

 $result=updateAppointmentStatus($id,$status);
 if($result){
echo "Booked";
 }
?>