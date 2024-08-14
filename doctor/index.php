
<?php

if(isset($_POST['logout'])) //check login button is clicked or not
{
    logout();
}
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
    <form action="index.php" method="post">
     <button type="submit" name="logout" class="btn btn-primary">Logout</button>
    
</form>
</body>
</html>