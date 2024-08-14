
<?php
include 'actions.php';//include config file
include 'db_actions.php';
start_session();
if(isset($_POST['logout'])) //check login button is clicked or not
{
    logout();
}
$email = $_GET['id']; // Get the email from the URL

 $doctors = showDrAvailableSlots($email);

 //print_r($doctors);


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
    <form action="index.php" method="post">
    <?php
        echo $email;
        ?>
    <button type="submit" name="logout" class="btn btn-primary">Logout</button>
       
        <p>
        
</p>
<div class="container mt-5">
    <div class="row">
        <?php 
        if ($doctors->num_rows > 0) {
            while ($row = $doctors->fetch_assoc()) {
             //   SELECT `id`, `doctor_id`, `app_date`, `app_from`, `app_to`, `status`, `remarks` FROM `doctor_available_slots`
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo  $row['doctor_id']; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['app_date']; ?></h6>
                            <p class="card-text">
                                <strong>From:</strong> <?php echo $row['app_from']; ?><br>
                                <strong>To:</strong> <?php echo $row['app_to']; ?> years<br>
                                <strong>Status:</strong> <?php echo $row['status']; ?><br>
                              
                            </p>
                            <a href="appointmentRequest.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Book Appointment</a>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p>No doctors found.</p>";
        }
        ?>
    </div>

</div>
    
    
</form>
</body>
</html>