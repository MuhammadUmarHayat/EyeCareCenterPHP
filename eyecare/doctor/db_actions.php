<?php
include '../config/config.php';//include config file

function showUserProfile($email) 
{
    global $con; // Declare $con as a global variable
    
       $query = "
        SELECT u.*, d.*
        FROM users u
        JOIN doctors d ON u.email = d.doctor_id
        WHERE u.email = '$email' AND u.role = 'doctor'
    ";
    $result = $con->query($query);
    return $result;
}
function updateProfile($email, $first_name,$last_name,$birthday,$gender,$age,$qualification,$specialization,$experience)
{
//patient_id,doctor_id,$app_date,app_time,status
global $con; // Declare $con as a global variable
$query="UPDATE users 
     SET first_name = '$first_name', last_name = '$last_name', birthday = '$birthday', gender = '$gender', age = '$age' 
     WHERE email = '$email' ";
$result=mysqli_query($con, $query);
$query2="UPDATE doctors 
     SET qualification = '$qualification', specialization = '$specialization', experience = '$experience' 
     WHERE doctor_id = '$email' ";
     $result2=mysqli_query($con, $query2);
if ($result && $result2) {
return true;
} else {
return false;
}
}
function showAppointmentList($doctor_id)
{
    global $con; // Declare $con as a global variable
    $query = "Select * FROM `appointments` where `doctor_id`='$doctor_id'";
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