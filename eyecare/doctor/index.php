

<?php
include 'actions.php';//include config file
include 'db_actions.php';

$email = start_session();

include '../includes/header.php';//include footer
?>
   
   <?php
include '../includes/doctor_navbar.php';//include footer
?>

<?php
        echo $email;
        ?>
  
<?php
include '../includes/footer.php';//include footer
?>