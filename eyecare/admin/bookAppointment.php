<?php
include 'db_actions.php';
$id= $_GET['id'];
$status="booked";

 $result=updateAppointmentStatus($id,$status);
 if($result){

     $status='success';
    header("Location: http://localhost/eyecare/admin/appointments.php?status=" . $status);

 }
?>