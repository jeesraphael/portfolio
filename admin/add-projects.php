<?php
// ob_start(); if any accidental output happens before the header will throw headers been already sent so by using this will keep any accidental out put 
include "../configs/database.php";
session_start();
if (!isset($_SESSION['email'])) {
    header('location:login.php');
}
//// add projects form submission with out ajax

// if(isset($_POST['submit'],$_POST['project-title'],$_POST['project-description'],$_POST['project-link'],$_FILES['project-image'])) {
// $projectTitle=$_POST['project-title'];
// $projectDescription=$_POST['project-description'];
// $projectLink=$_POST['project-link'];
// $fileName=$_FILES['project-image']['name'];
// $tempLocation=$_FILES['project-image']['tmp_name'];
// $targetLocation="assets/images/".time().$fileName;
// move_uploaded_file($tempLocation,$targetLocation);
// $insertionQuery="INSERT INTO projects(project_title,project_description,project_image,project_link) VALUES('$projectTitle','$projectDescription','$targetLocation','$projectLink')";
// if($con->query($insertionQuery)){
//     header("location:projects.php");
// }else {
//     $_SESSION['err']="Error while inserting";
//     header("location:add-projects.php");
// }
// }

//// with ajax

if (isset($_POST['projectTitle'], $_POST['projectDescription'], $_FILES['projectImage'], $_POST['projectLink'])) {
    $projectTitle = $_POST['projectTitle'];
    $projectDescription = $_POST['projectDescription'];
    $projectLink = $_POST['projectLink'];
    $fileName = $_FILES['projectImage']['name'];
    $tempLocation = $_FILES['projectImage']['tmp_name'];
    $targetLocation = "assets/images/" . time() . $fileName;
    move_uploaded_file($tempLocation, $targetLocation);
    $insertionQuery = "INSERT INTO projects(project_title,project_description,project_image,project_link) VALUES('$projectTitle','$projectDescription','$targetLocation','$projectLink')";
    header('Content-type: application/json');
    if ($con->query($insertionQuery))
        echo json_encode([
            'status' => 200,
            'message' => "Submitted successfully",
        ]);
    else
        echo json_encode([
            'status' => 500,
            'message' => "Failed to Submit",
        ]);
    $con->close();
    exit;
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
        <section>
            <div class="container mt-3">
                <h2>Add Projects</h2>
                <div class="row">
                    <div class="col-md-6 mx-auto">

                        <form action="" method="POST" enctype="multipart/form-data" id="add-project">
                            <!-- <div class="form-group mb-2 text-danger fs-6">
                        <?= $_SESSION['err'] ?? "" ?>
                    </div> -->

                            <div class="form-group mb-2">
                                <label for="formGroupExampleInput">Project title</label>
                                <input type="text" name="projectTitle" class="form-control" id="project-title"
                                    placeholder="Project title">
                            </div>
                            <div class="form-group mb-2">
                                <label for="formGroupExampleInput2">Project description</label>
                                <input type="text" name="projectDescription" class="form-control" id="project-description"
                                    placeholder="Project description">
                            </div>
                            <div class="form-group mb-2">
                                <label for="formGroupExampleInput">Project image</label>
                                <input type="file" name="projectImage" class="form-control" id="project-image">
                            </div>

                            <div class="form-group mb-2">
                                <label for="formGroupExampleInput">Project link</label>
                                <input type="url" name="projectLink" class="form-control" id="project-link"
                                    placeholder="Project link">
                            </div>
                            <div class="form-group mb-2">
                                <input type="submit" name="submit" class="btn btn-success" value="Submit">
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
        <!-- using jquery and ajax -->
        <script>
            $(document).ready(function() {
                $('#add-project').validate({
                    rules: {
                        projectTitle: {
                            required: true
                        },
                        projectDescription: {
                            required: true
                        },
                        projectImage: {
                            required: true
                        },
                        projectLink: {
                            required: true
                        }
                    },
                    messages: {
                        projectTitle: {
                            required: "Please enter project title"
                        },
                        projectDescription: {
                            required: "Please enter project description"
                        },
                        projectImage: {
                            required: "Please attach project image"
                        },
                        projectLink: {
                            required: "Please add project link"
                        }
                    },
                    submitHandler: function() {
                        let formData = new FormData();
                        let projectImage = $('#project-image')[0].files[0];
                        let projectTitle = $('#project-title').val();
                        let projectDescription = $('#project-description').val();
                        let projectLink = $('#project-link').val();
                        formData.append('projectImage', projectImage);
                        formData.append('projectTitle', projectTitle);
                        formData.append('projectDescription', projectDescription);
                        formData.append('projectLink', projectLink);

                        $.ajax({
                            url: "add-projects.php",
                            type: "POST",
                            data: formData, // JSON.stringify(formData)
                            contentType: false, // 'application/json' if sending a json data,
                            processData: false,
                            success: function(response) {
                                console.log(response);
                                if (response.status === 200) {
                                    $('#add-project')[0].reset();
                                }
                                window.location.href = "projects.php";
                            },
                            error: function(error) {
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: "top-end",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.onmouseenter = Swal.stopTimer;
                                        toast.onmouseleave = Swal.resumeTimer;
                                    }
                                });

                                Toast.fire({
                                    icon: "error",
                                    title: error.message
                                });
                            }
                        })
                    }
                })
            })
        </script>
    </body>

</html>