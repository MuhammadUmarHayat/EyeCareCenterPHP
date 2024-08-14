<?php
include 'actions.php';//include config file
include 'db_actions.php';
 $patient_id=start_session();
 $id = $_GET['id']; 
$result=showDrInfo($id);
$message="";
if ($result->num_rows > 0) 
{
    $row = $result->fetch_assoc();
    

 $doctor_id=$row['doctor_id'];
 $app_date=$row['app_date'];
  $app_time=$row['app_from']."-".$row['app_to']; 
$status="pending";

sendAppointmentRequest($patient_id, $doctor_id, $app_date, $app_time, $status);
 $message="Your request is submitted Please wait for furthur action";
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div>
        <?php
echo $message;
        ?>
</div>
</body>
</html>