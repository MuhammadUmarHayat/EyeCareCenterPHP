
<?php
include 'db_actions.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    // Retrieve form data
    $doctor_id = $_POST['doctor_id'];
    $app_date = $_POST['app_date'];
    $app_from = $_POST['app_from'];
    $app_to = $_POST['app_to'];
    $status = $_POST['status'];
    $remarks = $_POST['remarks'];

    // Call the saveAppointment function
    if (saveAppointment($doctor_id, $app_date, $app_from, $app_to, $status, $remarks)) {
        echo "<div class='alert alert-success'>Appointment saved successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Failed to save appointment.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Book Appointment</title>
</head>
<body>
<div class="container mt-5">
    <h2>Book an Appointment</h2>
    <form action="add_slot.php" method="POST">
        <div class="form-group">
            <label for="doctor_id">Doctor ID</label>
            <input type="text" class="form-control" id="doctor_id" name="doctor_id" required>
        </div>
        <div class="form-group">
            <label for="app_date">Appointment Date</label>
            <input type="date" class="form-control" id="app_date" name="app_date" required>
        </div>
        <div class="form-group">
            <label for="app_from">Appointment From (Time)</label>
            <input type="time" class="form-control" id="app_from" name="app_from" required>
        </div>
        <div class="form-group">
            <label for="app_to">Appointment To (Time)</label>
            <input type="time" class="form-control" id="app_to" name="app_to" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="available">Available</option>
                <option value="booked">Booked</option>
            </select>
        </div>
        <div class="form-group">
            <label for="remarks">Remarks</label>
            <textarea class="form-control" id="remarks" name="remarks" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save </button>
    </form>
</div>
</body>
</html>
