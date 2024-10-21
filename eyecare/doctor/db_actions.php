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
return true;//updated
} else {
return false;//not updated
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
if ($result) 
{
    return true;
} else 
{
    return false;
}
}
function totalAppointments($doctor_id)
{
    
        global $con; // Declare $con as a global variable
        $query = "SELECT COUNT(*) AS app_count FROM `appointments` where `doctor_id`='$doctor_id'";
        $result = mysqli_query($con, $query);
        
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row['app_count'];//total appointments
        } else {
            // Handle the error appropriately
            return 0; // or false, or throw an exception
        }
}
function totalPendingAppointments($doctor_id)
{
    $status="pending";
    
        global $con; // Declare $con as a global variable
        $query = "SELECT COUNT(*) AS app_count FROM `appointments` where `doctor_id`='$doctor_id' and `status`='$status'";
        $result = mysqli_query($con, $query);
        
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row['app_count'];//total appointments
        } else {
            // Handle the error appropriately
            return 0; // or false, or throw an exception
        }
}
function totalCompleteAppointments($doctor_id)
{
    $status="completed";
    
        global $con; // Declare $con as a global variable
        $query = "SELECT COUNT(*) AS app_count FROM `appointments` where `doctor_id`='$doctor_id' and `status`='$status'";
        $result = mysqli_query($con, $query);
        
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row['app_count'];//total appointments
        } else {
            // Handle the error appropriately
            return 0; // or false, or throw an exception
        }
}

function totalFeedBacks($doctor_id)
{
    
        global $con; // Declare $con as a global variable
        $query = "SELECT COUNT(*) AS app_count FROM `feedbacks` where `doctor_id`='$doctor_id'";
        $result = mysqli_query($con, $query);
        
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row['app_count'];//total appointments
        } else {
            // Handle the error appropriately
            return 0; // or false, or throw an exception
        }
}
function genAppointmentChart($doctor_id)
{
    global $con; // Use the global $con variable for the database connection

    // Fetch appointment counts grouped by status for a given doctor
    $query = "SELECT status, COUNT(*) AS app_count FROM `appointments` WHERE `doctor_id` = '$doctor_id' GROUP BY `status`";
    $result = mysqli_query($con, $query);

    $data = []; // Initialize an empty array

    // Populate $data with status and count values
    while ($row = mysqli_fetch_assoc($result)) {
        $data[$row['status']] = $row['app_count'];
    }

    return $data; // Return the chart data
}

?>