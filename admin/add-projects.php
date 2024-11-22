<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location:login.php');
}
// add projects form submission
include "../configs/database.php";
if(isset($_POST['submit'])){
$projectTitle=$_POST['project-title'];
$projectDescription=$_POST['project-description'];
$projectLink=$_POST['project-link'];
$fileName=$_FILES['project-image']['name'];
$tempLocation=$_FILES['project-image']['tmp_name'];
$targetLocation="assets/images/".time().$fileName;
move_uploaded_file($tempLocation,$targetLocation);
$insertionQuery="INSERT INTO projects(project_title,project_description,project_image,project_link) VALUES('$projectTitle','$projectDescription','$targetLocation','$projectLink')";
if($con->query($insertionQuery)){
    header("location:projects.php");
}else {
    $_SESSION['err']="Error while inserting";
    header("location:add-projects.php");
}


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add projects</title>
    <?php include "layout/header.php"; ?>
</head>
<body>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
<?php include_once "layout/dashboard-header.php"; ?>
<?php
?>



<section>
    <div class="container mt-3">
        <h2 >Add Projects</h2>
        <div class="row">
            <div class="col-md-6 mx-auto">

                <form action="add-projects.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-2 text-danger fs-6">
                        <?=$_SESSION['err']??""?>
                    </div>
                   
                     <div class="form-group mb-2">
                        <label for="formGroupExampleInput">Project title</label>
                        <input type="text" name="project-title" class="form-control" id="formGroupExampleInput"
                            placeholder="Project title" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="formGroupExampleInput2">Project description</label>
                        <input type="text" name="project-description" class="form-control" id="formGroupExampleInput2"
                            placeholder="Project description" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="formGroupExampleInput">Project image</label>
                        <input type="file" name="project-image" class="form-control" id="formGroupExampleInput" required>
                    </div>
                    
                    <div class="form-group mb-2">
                        <label for="formGroupExampleInput">Project link</label>
                        <input type="url" name="project-link" class="form-control" id="formGroupExampleInput"
                            placeholder="Project link" required>
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
</body>
</html>










