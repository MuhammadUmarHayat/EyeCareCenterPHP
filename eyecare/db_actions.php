<?php
 include 'config/config.php';//include config file


function SaveDoctorPersonalInfo($fname, $lname, $dob, $email, $password, $gender, $age, $qual, $specialization, $experience)
{
  global $con; // Declare $con as a global variable
    
    $dates = date("d/m/Y");
    
    // Insert data into the 'users' table
    $query = "INSERT INTO `users`(`first_name`, `last_name`, `birthday`, `email`, `password`, `gender`, `age`, `dates`, `role`, `status`) 
              VALUES ('$fname','$lname','$dob','$email','$password','$gender','$age','$dates','doctor','valid')";
    $result1 = mysqli_query($con, $query); // Execute the query and store the result

   
    // Check if both queries were successful
    if ($result1) 
    {
        return true;//save
    } else 
    {
        return false;//not save
    }
}



function SaveDoctorExperiencelInfo($email, $qual, $specialization, $experience, $imgContent)
{
    try
    {

    
  global $con; // Declare $con as a global variable
    
 
       // Insert data into the 'doctors' table
    $query2 = "INSERT INTO `doctors`(`doctor_id`, `qualification`, `specialization`, `experience`, `is_available`,`photo`) 
               VALUES ('$email','$qual','$specialization','$experience','yes','$imgContent')";
    $result2 = mysqli_query($con, $query2); // Execute the query and store the result

    // Check if both queries were successful
    if ($result2) 
    {
        return true;//save
    } else 
    {
        return false;//not save
    }
}
catch (Exception $e) 
   {
    
    echo $e;
    }
}




function SavePatientInfo($fname, $lname, $dob, $email, $password, $gender, $age, $address,$problem,$certificate_no,$image)
{
    global $con; // Declare $con as a global variable
    
    $dates = date("Y/m/d");
    
    // Insert data into the 'users' table
    $query = "INSERT INTO `users`(`first_name`, `last_name`, `birthday`, `email`, `password`, `gender`, `age`, `dates`, `role`, `status`) 
              VALUES ('$fname','$lname','$dob','$email','$password','$gender','$age','$dates','patient','pending')";
    $result1 = mysqli_query($con, $query); // Execute the query and store the result

    // Insert data into the 'doctors' table
    $query2 = "INSERT INTO `patients`(`patient_id`, `addres`, `problem`, `remarks`, `image`, `certificate_no`, `certificate_status`) 
    VALUES ('$email','$address','$problem','ok','$image','$certificate_no','pending')";
    $result2 = mysqli_query($con, $query2); // Execute the query and store the result

    // Check if both queries were successful
    if ($result1 && $result2) {
        return true;//save
    } else {
        return false;//not save
    }
}


function isValidUser($email,$password,$role)
{
    global $con; // Declare $con as a global variable
    $query = "SELECT * FROM `users` 
    WHERE `birthday`='$email' or `email`='$email'and `password`='$password' and `role`='$role' and status='valid' ";
    $result = $con->query($query);
    if ($result && $result->num_rows > 0) 
    {
       return true;//user is valid
    }
    return false; //user is invalid
}
//////Contact us table
function sendContactUsMessage($name,$to,$from,$message)
{
    global $con; // Declare $con as a global variable
    $query="INSERT INTO `contactus`(`name`, `to_email`, `from_email`,  `message`) VALUES ('$name','$to','$from','$message')";
    $result1 = mysqli_query($con, $query); 
   
    if ($result1) 
    {
        return true;//save
    } else {
        return false;//not save
    }
}
function viewMessages()
{
    global $con; // Declare $con as a global variable
    $query = "SELECT * FROM `contactus`";
    $result = $con->query($query);
    if ($result && $result->num_rows > 0) 
    {
       return true;// 
    }
    return false; 
}
function viewAdminMessage()
{
    global $con; // Declare $con as a global variable
    $query = "SELECT * FROM `contactus` where `to_email`='admin@admin.com'";
    $result = $con->query($query);
    if ($result && $result->num_rows > 0) 
    {
       return true;// 
    }
    return false; 

}
