<?php
//patient database functionalities

include '../config.php';//include config file
function showAppointments($patient_id)
{
    global $con; // Declare $con as a global variable
    $query = "SELECT * FROM  `appointments` where patient_id='$patient_id'";
    $result = $con->query($query);
    return $result;
}
function showUserProfile($email) 
{
    global $con; // Declare $con as a global variable
    
    // Use a prepared statement to avoid SQL injection
    $stmt = $con->prepare("
        SELECT u.*, p.*
        FROM users u
        JOIN patients p ON u.email = p.patient_id
        WHERE u.email = ? AND u.role = 'patient'
    ");
    
    // Bind the $email parameter to the query
    $stmt->bind_param('s', $email);
    
    // Execute the query
    $stmt->execute();
    
    // Get the result
    $result = $stmt->get_result();
    
    return $result;
}
function updateProfile( $email,$first_name,$last_name,$birthday,$gender,$age,$addres,$problem, $remarks,$certificate_no,$certificate_status)
{
    global $con; // Declare $con as a global variable
     // Update the user's information in the database
     $update_user_query = "
     UPDATE users 
     SET first_name = ?, last_name = ?, birthday = ?, gender = ?, age = ? 
     WHERE email = ?
 ";
 $update_stmt_user = $con->prepare($update_user_query);
 $update_stmt_user->bind_param('ssssis', $first_name, $last_name, $birthday, $gender, $age, $email);

 // Update the patient's information in the database
 $update_patient_query = "
     UPDATE patients 
     SET addres = ?, problem = ?, remarks = ?, certificate_no = ?, certificate_status = ? 
     WHERE patient_id = ?
 ";
 $update_stmt_patient = $con->prepare($update_patient_query);
 $update_stmt_patient->bind_param('ssssss', $addres, $problem, $remarks, $certificate_no, $certificate_status, $email);

 if ($update_stmt_user->execute() && $update_stmt_patient->execute()) 
 {
     echo "Profile updated successfully.";
     // Redirect to the profile page or any other page as needed
     header("Location: patient_profile.php");
     exit();
 } else {
     echo "Error updating profile: " . $con->error;
 }

}

function showDoctorList()
{
    global $con; // Declare $con as a global variable

    // Prepare the SQL query
    $stmt = $con->prepare("
        SELECT 
            d.doctor_id, 
            d.qualification, 
            d.specialization, 
            d.experience, 
            d.is_available,
            u.first_name, 
            u.last_name, 
            u.email, 
            u.gender, 
            u.age 
        FROM 
            doctors d
        JOIN 
            users u 
        ON 
            u.email = d.doctor_id
        WHERE 
            u.role = 'doctor'
    ");
    
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($con->error));
    }
    
    // Execute the query
    if (!$stmt->execute()) {
        die('Execute failed: ' . htmlspecialchars($stmt->error));
    }
    
    // Get the result
    $result = $stmt->get_result();
    
    if ($result === false) {
        die('Get result failed: ' . htmlspecialchars($stmt->error));
    }
    
    return $result;
}

function showDrAvailableSlots($email) 
{
    global $con; // Declare $con as a global variable
    
    // Prepare the SQL query with error handling
    $stmt = $con->prepare("
       SELECT * FROM `doctor_available_slots` WHERE `doctor_id` = ? AND `status` = 'available'
    ");
    
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($con->error));
    }

    // Bind the $email parameter to the query
    $stmt->bind_param('s', $email);
    
    // Execute the query with error handling
    if (!$stmt->execute()) {
        die('Execute failed: ' . htmlspecialchars($stmt->error));
    }
    
    // Get the result with error handling
    $result = $stmt->get_result();
    
    if ($result === false) {
        die('Get result failed: ' . htmlspecialchars($stmt->error));
    }
    
    return $result;
}

function sendAppointmentRequest($patient_id, $doctor_id, $app_date, $app_time, $status)
{
    global $con; // Declare $con as a global variable
$query="INSERT INTO `appointments`( `patient_id`, `doctor_id`, `app_date`, `app_time`, `status`)
 VALUES ('$patient_id','$doctor_id','$app_date','$app_time','$status')";
$result=mysqli_query($con, $query);
if ($result)
 {
    return true;
} else 
{
    return false;
}
}

function showDrInfo($id)
{
    global $con; // Declare $con as a global variable
    $query = "SELECT * FROM `doctor_available_slots` WHERE `id`='$id'";
    $result = $con->query($query);
    return $result;
}

?>
