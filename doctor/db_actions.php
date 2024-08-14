<?php
include '../config.php';//include config file


function showAppointmentList($doctor_id)
{
    global $con; // Declare $con as a global variable
    $query = "Select `id`, `patient_id`, `doctor_id`, `app_date`, `app_time`, `status`  FROM `appointments` where `doctor_id`='$doctor_id'";
    $result = $con->query($query);
    return $result;
}
function saveAppointment($doctor_id,$app_date,$app_from,$app_to,$status,$remarks)
{
    //patient_id,doctor_id,$app_date,app_time,status
    global $con; // Declare $con as a global variable
    $query="INSERT INTO `doctor_available_slots`( `doctor_id`, `app_date`, `app_from`, `app_to`, `status`, `remarks`) 
    VALUES ('$doctor_id','$app_date','$app_from','$app_to','$status','$remarks')";
$result=mysqli_query($con, $query);
if ($result) {
    return true;
} else {
    return false;
}
}
?>