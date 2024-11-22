
<?php
session_start();
include "../configs/database.php";
if (!isset($_SESSION['email'])) {
    header('location:login.php');
}
$projectsQuery = "SELECT * FROM projects";
$projectsQueryResult = $con->query($projectsQuery);

// delete project
if(isset($_POST['projectid'])){
    $id=$_POST['projectid'];
$deleteQuery="DELETE FROM projects  WHERE id='$id'";
if($con->query($deleteQuery)){
    header("location:projects.php");
}
}

$con->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Projects</title>
    <?php include_once "layout/header.php";?>
</head>
<body>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
<?php include_once "layout/dashboard-header.php"; ?>

<main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="mb-0">Projects</h3>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="container-fluid ">
            <div class="row mt-2 mx-md-5">
                <div class="col-md-12">
                    <table class="table table-bordered table-success text-center w-100">
                        <thead class="table-secondary">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Link</th>
                                <th colspan="2" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody  class="align-middle">


                            <?php
                            $i=0;
                            while ($project = $projectsQueryResult->fetch_assoc()) {
                            ?>
                                <tr>
                                    <th scope="row"><?= ++$i ?></th>
                                    <td><?php echo $project['project_title']; ?></td>
                                    <td><?php echo $project['project_description']; ?></td>
                                    <td><img src="<?=$project['project_image']?>" alt="" style="width: 50px;height: 50px;margin-bottom: 5px;" id="imageview"> </td>
                                    <td><a target="_blank" href="<?php echo $project['project_link']; ?>"><i class="bi bi-link"></i><?php echo $project['project_link']; ?></a></td>
                                    <td><a onclick="removeProject(<?= $project['id']?>)" href="javascript:void(0)" class="btn btn-danger">Delete</a></td>
                                    <td><a href="edit.php?id=<?= $project['id']?>" class="btn btn-info">Edit</a></td>
                                </tr>
                               

                            <?php
                            }
                            ?>

                        </tbody>
                    </table>


                </div>
            </div>
        </div>

    </main>
    <?php include "layout/dashboard-footer.php"; ?>
    </div>

    <footer>
        <?php include "layout/footer.php"; ?>
    </footer>
    <form action="projects.php" method="POST" id="remove-project">
        <input type="hidden" name="projectid" id="projectid">
    </form>
    <script>
        function removeProject(id){
            if(confirm("Do you want to continue?")){
                document.getElementById('projectid').value=id;
                document.getElementById('remove-project').submit();
            }
        }
    </script>

</body>

</html>

