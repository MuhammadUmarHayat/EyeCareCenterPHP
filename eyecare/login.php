
<?php

include 'form_validation.php';//include form validation file
include 'db_actions.php';//include config file
if(isset($_POST['login'])) //check login button is clicked or not
{
    //fname,lname,dob,email,password,repassword,gender,age,qual,specialization,experience
    $data = $_POST;
    if(isNull($data))
    {
      die("Data is null");
    }
    else
    {
     // die("Data is not null");
    
   
   $email= $_POST['email'];
   $password= $_POST['password'];//$password,$repassword
   $role= $_POST['role'];
     
                                                            

if(isEmpty($email)||isEmpty($password)||isEmpty($role))
{
   die("Fields should not empty");
}
else
{
    if($role==="admin")
    {
        if($email==="admin@admin.com"&& $password==="Password@vu")
        {
            header('Location:http://localhost/eyecare/admin/index.php');
        }
    }

    if(isValidUser($email,$password,$role))
         {
            if($role==="doctor")
            {
                
                    header('Location:http://localhost/eyecare/doctor/index.php');
                
            }
            if($role==="patient")
            {
                
                    header('Location:http://localhost/eyecare/patient/index.php');
                
            }
         }
         else{
            echo "Enter valid email/Data of Birth and or passwrod";

         }

  
}
    }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title mb-0">Login</h3>
            </div>
            <div class="card-body">
                <form action="login.php" method="post">
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="role" class="form-label">User Type</label>
                        <select class="form-select" id="role" name="role" required>
                            <option value="admin">Admin</option>
                            <option value="doctor">Doctor</option>
                            <option value="patient">Patient</option>
                        </select>
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" name ="login" class="btn btn-success">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
