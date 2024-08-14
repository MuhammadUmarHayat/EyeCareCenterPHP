
<?php

include 'form_validation.php';//include config file
include 'db_actions.php';//include config file
if(isset($_POST['signup'])) //check signup button is clicked or not
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
    
   $fname= $_POST['fname'];
   $lname= $_POST['lname'];
  $dob = $_POST['dob'];
   $email= $_POST['email'];
   $password= $_POST['password'];//$password,$repassword
   $repassword= $_POST['repassword'];
   $gender= $_POST['gender'];
   $age= $_POST['age'];
   $qual = $_POST['qual'];
   $specialization= $_POST['specialization'];  
   $experience= $_POST['experience'];     
                                                                     //fname,lname,dob,email,password,repassword,gender,age,qual,specialization,experience

if(isEmpty($fname)||isEmpty($lname)||isEmpty($dob)||isEmpty($email)||isEmpty($password)||isEmpty($repassword)||isEmpty($gender)||isEmpty($age)||isEmpty($qual)||isEmpty($specialization))
{
   die("Fields should not empty");
}
else
{
   if(isPasswordMached($password,$repassword))
   {
     // SaveDoctor($fname,$lname,$dob,$email,$password,$gender,$age,$qual,$specialization,$experience);
      if(isValidPassword($password)&&isValidEmail($email))
      {
         if(SaveDoctorInfo($fname, $lname, $dob, $email, $password, $gender, $age, $qual, $specialization, $experience))
         {
            echo "Record is saved success fully";
         }
      }
      else{
         die("Password or Email formate is not corract");
      }
      
 
 
   }
   else
   {
      die("Password dose not matched with Retype password");
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
                <h3 class="card-title mb-0">Doctor Registration</h3>
            </div>
            <div class="card-body">
                <form action="doctor_registration.php" method="post">
                    <div class="mb-3">
                        <label for="fname" class="form-label">First Name:</label>
                        <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First name" required>
                    </div>
                    <div class="mb-3">
                        <label for="lname" class="form-label">Last Name:</label>
                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last name" required>
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth:</label>
                        <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="mb-3">
                        <label for="repassword" class="form-label">Retype Password:</label>
                        <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Enter your password again" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender:</label>
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="undefined">Undefined</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age:</label>
                        <input type="number" class="form-control" id="age" name="age" placeholder="Enter your age" required>
                    </div>
                    <div class="mb-3">
                        <label for="qual" class="form-label">Qualification:</label>
                        <input type="text" class="form-control" id="qual" name="qual" placeholder="Enter your Qualification" required>
                    </div>
                    <div class="mb-3">
                        <label for="specialization" class="form-label">Specialization:</label>
                        <input type="text" class="form-control" id="specialization" name="specialization" placeholder="Enter specialization" required>
                    </div>
                    <div class="mb-3">
                        <label for="experience" class="form-label">Experience (Years):</label>
                        <input type="number" class="form-control" id="experience" name="experience" placeholder="Enter Experience" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
