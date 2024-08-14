

<?php

include 'config.php';

if (isset($_POST['save'])) 
{

    if (!empty($_FILES["image"]["name"]))
     {
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes))
         {



            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

            //save image


$email=$_POST['email'];
$certificate_no=$_POST['certificate_no'];
$cer_date=$_POST['cer_date'];
$cer_status=$_POST['cer_status'];


$query="INSERT INTO `certifications`( `patient_id`, `image`, `certification_no`, `certification_date`, `status`) 
   VALUES ('$email','$imgContent','$certificate_no','$cer_date','$cer_status')";  



mysqli_query($con, $query);

        }
    }

}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient Certifications</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title mb-0">Add Patient Certifications</h3>
            </div>
            <div class="card-body">
                <form action="add_certifications.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="email" class="form-label">Patient Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="certificate_no" class="form-label">Patient Certification No:</label>
                        <input type="text" class="form-control" id="certificate_no" name="certificate_no" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Certificate:</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="cer_date" class="form-label">Certification Issuing Date:</label>
                        <input type="date" class="form-control" id="cer_date" name="cer_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="cer_status" class="form-label">Certificate Status:</label>
                        <input type="text" class="form-control" id="cer_status" name="cer_status" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
