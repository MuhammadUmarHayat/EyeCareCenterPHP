<?php

include 'db_actions.php';
include 'actions.php';
$test ;
if (isset($_GET['id'])) 
{
    $id = $_GET['id'];
    $cer = getCertificationInfo($id);  // Function to fetch the lab test details based on the ID
    if ($cer && $cer->num_rows > 0) 
                        
    {
        $row = $cer->fetch_assoc();
    }
}


if (isset($_POST['update'])) 
{
    $id = $_POST['id'];
    $patient_id = $_POST['patient_id'];
    $certification_no = $_POST['certification_no'];
    $status = $_POST['status'];
    
    // If a new image is uploaded, process it; otherwise, keep the existing image
    if (!empty($_FILES["image"]["name"])) 
    {
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

        if (in_array($fileType, $allowTypes)) 
        {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));
        } 
        else 
        {
            echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Only JPG, JPEG, PNG, and GIF files are allowed.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            return;
        }
    } 
    else 
    {
        
        $imgContent = $row['photo'];  // Keep existing photo if no new image is uploaded
                        
    }

    if (updateCertificateDetail($id,$patient_id, $imgContent,$certification_no,$status)) 
    {
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Lab Test has been updated successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';

        goCertificationList();// go to main page
    }
}

include '../includes/header.php';
include '../includes/admin_navbar.php';

?>
<?php
 
                           // $row = $test->fetch_assoc();
                            ?> 
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title mb-0">Edit Certificate</h3>
        </div>
        <div class="card-body">
            <form action="editCertificate.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="mb-3">
                    <label for="name" class="form-label">Patient ID:</label>
                    <input type="text" class="form-control" id="patient_id" name="patient_id" value="<?php echo $row['patient_id']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="detail" class="form-label">Certification Number :</label>
                    <textarea class="form-control" id="certification_no" name="certification_no" rows="3" required><?php echo $row['certification_no']; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Upload New Photo (optional):</label>
                    <input type="file" class="form-control" id="image" name="image">
                    <div class="form-text">Supported formats: JPG, PNG, JPEG, GIF</div>
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" width="100" height="100" class="img-thumbnail rounded-circle mt-2">
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status:</label>
                    <select class="form-select" id="status" name="status">
                        <option value="available" <?php echo ($row['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
                        <option value="unavailable" <?php echo ($row['status'] == 'inactive') ? 'selected' : ''; ?>>inactive</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" name="update" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
        <?php
        //}
        ?>
    </div>
</div>

<?php
include '../includes/footer.php';
?>
