<?php
include 'db_actions.php';

$result= showAppointmentList();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Appointments List</h2>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Patient</th>
                    <th>Doctor</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && $result->num_rows > 0) 
                {
                    while ($row = $result->fetch_assoc()) 
                    {  
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['patient_id']; ?></td>
                    <td><?php echo $row['doctor_id']; ?></td>
                    
                    <td><?php echo $row['app_date']; ?></td>
                    <td><?php echo $row['app_time']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                        <a href="bookAppointment.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">Booked</a>
                        <a href="completeAppointment.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success">Completed</a>
                        <a href="cancelAppointment.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">Cancelled</a>
                      
                    </td>
                </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>No certifications found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
