<?php
include '../config.php';//include config file
function showCertificiationList()
{
    global $con; // Declare $con as a global variable
    $query = "SELECT * FROM `certifications`";
    $result = $con->query($query);
    return $result;
}
function showAppointmentList()
{
    global $con; // Declare $con as a global variable
    $query = "SELECT * FROM  `appointments`";
    $result = $con->query($query);
    return $result;
}
function updateAppointmentStatus($id,$status)
{
    global $con; // Declare $con as a global variable
    $query = "update  `appointments` set `status`= '$status' where `id`='$id'";
    $result=mysqli_query($con, $query);
if ($result) {
    return true;
} else {
    return false;
}
}
function saveAppointment($patient_id,$doctor_id,$app_date,$app_time,$status)
{
    //patient_id,doctor_id,$app_date,app_time,status
    global $con; // Declare $con as a global variable
    $query="INSERT INTO `appointments`( `patient_id`, `doctor_id`, `app_date`, `app_time`, `status`) 
    VALUES ('$patient_id','$doctor_id','$app_date','$app_time','$status')";
$result=mysqli_query($con, $query);
if ($result) {
    return true;
} else {
    return false;
}
}

function getPatient()
{
    global $con; // Declare $con as a global variable
    $records = mysqli_query($con, "SELECT * From users where role='patient'"); 
    return $records;

}
function getDoctor()
{   global $con; // Declare $con as a global variable
    $records = mysqli_query($con, "SELECT * From users where role='doctor'"); 
    return $records;

}