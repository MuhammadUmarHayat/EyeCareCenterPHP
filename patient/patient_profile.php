<?php
include 'db_actions.php';
include 'actions.php';
// Start the session

$email = start_session();
$result = showUserProfile($email);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h4><?php echo $row['first_name'] . " " . $row['last_name']; ?></h4>
                </div>
                <div class="card-body">
                    <p class="card-text"><strong>Birthday:</strong> <?php echo $row['birthday']; ?></p>
                    <p class="card-text"><strong>Email:</strong> <?php echo $row['email']; ?></p>
                    <p class="card-text"><strong>Gender:</strong> <?php echo $row['gender']; ?></p>
                    <p class="card-text"><strong>Age:</strong> <?php echo $row['age']; ?></p>
                    <p class="card-text"><strong>Address:</strong> <?php echo $row['addres']; ?></p>
                    <p class="card-text"><strong>Problem:</strong> <?php echo $row['problem']; ?></p>
                    <p class="card-text"><strong>Remarks:</strong> <?php echo $row['remarks']; ?></p>
                    <p>
                    <a class="btn btn-sm btn-dark btn-lg" href="editPatientProfile.php?id=<?php echo $row['email']; ?>" >Edit</a>
        </p>
                </div>
            </div>
            <?php
        }
    } else {
        ?>
        <div class="alert alert-warning" role="alert">
            No results found.
        </div>
        <?php
    }
    ?>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
