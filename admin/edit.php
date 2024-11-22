
<?php
session_start();
include "../configs/database.php";
if (!isset($_SESSION['email'])) {
    header('location:login.php');
}
if(isset($_GET['id'])){
    $projectId=$_GET['id'];
    $selectionForEditQuery="SELECT * FROM projects WHERE id='$projectId'";
    $selectionForEditQueryResult= $con->query($selectionForEditQuery);
    $row=$selectionForEditQueryResult->fetch_assoc();
}
//update
if(isset($_POST['submit'])){
    $projectId=$_POST['id'];
    $projectTitle=$_POST['project-title'];
    $projectDescription=$_POST['project-description'];
    $projectLink=$_POST['project-link'];
    $fileName=$_FILES['project-image']['name'];
    $tempLocation=$_FILES['project-image']['tmp_name'];
    $targetLocation="assets/images/".time().$fileName;
    move_uploaded_file($tempLocation,$targetLocation);
    $updateQuery="UPDATE projects SET project_title='$projectTitle',project_description='$projectDescription',project_image='$targetLocation',project_link='$projectLink' WHERE id='$projectId'";
    if($con->query($updateQuery)){
        header('location:projects.php');
    }

    
}
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit projects</title>
    <?php include "layout/header.php"; ?>
</head>
<body>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
<?php include_once "layout/dashboard-header.php"; ?>
<?php
?>



<section>
    <div class="container mt-3">
        <h2 >Edit Projects</h2>
        <div class="row">
            <div class="col-md-6 mx-auto">

                <form action="edit.php" method="POST" enctype="multipart/form-data">
                    
                    <input type="hidden" name="id" value="<?= $row['id']?>">
                     <div class="form-group mb-2">
                        <label for="formGroupExampleInput">Project title</label>
                        <input type="text" name="project-title" class="form-control" id="formGroupExampleInput"
                            value="<?= $row['project_title']?>" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="formGroupExampleInput2">Project description</label>
                        <input type="text" name="project-description" class="form-control" id="formGroupExampleInput2"
                        value="<?= $row['project_description']?>" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="formGroupExampleInput">Project image</label>
                        <img src="<?=$row['project_image']?>" alt="" style="width: 50px;height: 50px;margin-bottom: 5px;" id="imageview">
                        <input type="file" name="project-image" class="form-control" id="formGroupExampleInput" onchange="viewImage(event)" required>
                    </div>
                    
                    <div class="form-group mb-2">
                        <label for="formGroupExampleInput">Project link</label>
                        <input type="url" name="project-link" class="form-control" id="formGroupExampleInput"
                        value="<?= $row['project_link']?>" required>
                    </div>
                    <div class="form-group mb-2">
                        <input type="submit" name="submit" class="btn btn-success"value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>



<?php include "layout/dashboard-footer.php"; ?>
    </div>

    <footer>
        <?php include "layout/footer.php"; ?>
    </footer>
    <script>
        function viewImage(event){
        document.getElementById('imageview').src=URL.createObjectURL(event.target.files[0])
    }
    </script>
</body>
</html>