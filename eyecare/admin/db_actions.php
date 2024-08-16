<?php
 include '../config/config.php';//include config file

 function saveCertification($email,$imgContent,$certificate_no,$cer_date,$cer_status)
 {
    global $con; // Declare $con as a global variable
    $query="INSERT INTO `certifications`( `patient_id`, `image`, `certification_no`, `certification_date`, `status`) 
    VALUES ('$email','$imgContent','$certificate_no','$cer_date','$cer_status')";  
 $result=mysqli_query($con, $query);
 if ($result) {
    return true;
} else {
    return false;
}
 
 }
 function showPatientsList()
{
    global $con; // Declare $con as a global variable
    $query = "SELECT * FROM  `patients`";
    $result = $con->query($query);
    return $result;
}
function showCertificiationList()
{
    global $con; // Declare $con as a global variable
    $query = "SELECT * FROM `certifications`";
    $result = $con->query($query);
    return $result;
}
function updateCertification($id,$status)
{
    global $con; // Declare $con as a global variable
    $query = "update  `patients` set `certificate_status`= '$status' where `patient_id`='$id'";
    $result=mysqli_query($con, $query);
    $result2;
    //update users table
           
    $query2 = "update  `users` set `status`= '$status' where `email`='$id'";
    $result2=mysqli_query($con, $query2);

    

if ($result && $result2) {
    return true;
} else {
    return false;
}
}
function getCertificationInfo($id)
{
    global $con; // Declare $con as a global variable
    $query = "SELECT * FROM  `certifications` where id='$id'";
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
function deleteAppointment($id)
{
    global $con; // Declare $con as a global variable
    $query = "delete from `appointments` where `id`='$id'";
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
function totalDoctors()
{
    global $con; // Declare $con as a global variable
    $query = "SELECT COUNT(*) AS doctor_count FROM users WHERE role='doctor'";
    $result = mysqli_query($con, $query);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['doctor_count'];
    } else {
        // Handle the error appropriately
        return 0; // or false, or throw an exception
    }
}
function totalPatients()
{
    
        global $con; // Declare $con as a global variable
        $query = "SELECT COUNT(*) AS pat_count FROM users WHERE role='patient'";
        $result = mysqli_query($con, $query);
        
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row['pat_count'];
        } else {
            // Handle the error appropriately
            return 0; // or false, or throw an exception
        }
    }
    function totalAppointments()
{
    
        global $con; // Declare $con as a global variable
        $query = "SELECT COUNT(*) AS app_count FROM `appointments`";
        $result = mysqli_query($con, $query);
        
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row['app_count'];
        } else {
            // Handle the error appropriately
            return 0; // or false, or throw an exception
        }
    }

    function totalCertifications()
{
    
        global $con; // Declare $con as a global variable
        $query = "SELECT COUNT(*) AS cer_count FROM `certifications`";
        $result = mysqli_query($con, $query);
        
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row['cer_count'];
        } else {
            // Handle the error appropriately
            return 0; // or false, or throw an exception
        }
    }