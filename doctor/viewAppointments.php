<?php
include 'db_actions.php'; // Include your database connection file
include 'actions.php';


echo $doctor_id = start_session();

// Call the function to get the appointment list
$appointments = showAppointmentList($doctor_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Appointment List</title>
</head>
<body>
<div class="container mt-5">
    <h2>Appointment List for Doctor ID: <?php echo htmlspecialchars($doctor_id); ?></h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Patient ID</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if ($appointments->num_rows > 0) {
                while ($row = $appointments->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['patient_id']); ?></td>
                        <td><?php echo htmlspecialchars($row['app_date']); ?></td>
                        <td><?php echo htmlspecialchars($row['app_time']); ?></td>
                        <td><?php echo htmlspecialchars($row['status']); ?></td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='5'>No appointments found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
