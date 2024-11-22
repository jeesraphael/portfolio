<?php
session_start();
include "../configs/database.php";
if (!isset($_SESSION['email'])) {
    header('location:login.php');
}
$selectionQuery = "SELECT * FROM contact";
$selectionQueryResult = $con->query($selectionQuery);
$con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact list</title>
    <?php include "layout/header.php"; ?>

</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <?php include "layout/dashboard-header.php"; ?>
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="mb-0">Contact list</h3>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="container-fluid">
            <div class="row d-flex justify-content-center align-items-center mt-2">
                <div class="col-md-8 ">
                    <table class="table table-bordered table-success text-center">
                        <thead class="table-secondary">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Message</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody  class="align-middle">


                            <?php
                            $i=0;
                            while ($selectionRow = $selectionQueryResult->fetch_assoc()) {
                            ?>
                                <tr>
                                    <th scope="row"><?= ++$i ?></th>
                                    <td><?php echo $selectionRow['name']; ?></td>
                                    <td><?php echo $selectionRow['email']; ?></td>
                                    <td><?php echo $selectionRow['message']; ?></td>
                                    <td><a onclick="removeUser(<?= $selectionRow['id']?>)" href="javascript:void(0)" class="btn btn-danger">Delete</a></td>
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
    <form action="delete.php" method="POST" id="remove-item">
        <input type="hidden" name="userid" id="userid">
    </form>
    <script>
        function removeUser(id){
            if(confirm("Do you want to continue?")){
                document.getElementById('userid').value=id;
                document.getElementById('remove-item').submit();
            }
        }
    </script>
</body>
</html>
