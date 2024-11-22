<?php
session_start();
include "../configs/database.php";
if (!isset($_SESSION['email'])) {
    header('location:login.php');
}
$submissionCountQuery = "SELECT COUNT(*) AS totalSubmissionCount  FROM contact";
$countQueryResult = $con->query($submissionCountQuery);
if ($countQueryResult->num_rows > 0) {
    $countRowArray = $countQueryResult->fetch_assoc();
    $count = $countRowArray['totalSubmissionCount'];
    if($count>0)$count-1;
    $con->close();
?>

        <!DOCTYPE html>
        <html lang="en"> <!--begin::Head-->

        <head>
            <title>Admin | Dashboard</title><!--begin::Primary Meta Tags-->
            <?php include "layout/header.php"; ?>
        </head>

        <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
            <?php include "layout/dashboard-header.php"; ?>
            <!--end::Sidebar--> <!--begin::App Main-->
            <main class="app-main"> <!--begin::App Content Header-->
                <div class="app-content-header"> <!--begin::Container-->
                    <div class="container-fluid"> <!--begin::Row-->
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="mb-0">Dashboard</h3>
                            </div>
                        </div> <!--end::Row-->
                    </div> <!--end::Container-->
                </div> <!--end::App Content Header--> <!--begin::App Content-->
                <div class="app-content"> <!--begin::Container-->
                    <div class="container-fluid"> <!--begin::Row-->
                        <div class="row"> <!--begin::Col-->
                            <div class="col-lg-3 col-6"> <!--begin::Small Box Widget 1-->
                                <div class="small-box text-bg-primary">
                                    <div class="inner">
                                        <h3><?=$count?></h3>
                                        <p>Total submission count</p>
                                    </div><a href="contacts.php" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                        More info <i class="bi bi-link-45deg"></i> </a>
                                </div> <!--end::Small Box Widget 1-->
                            </div>

                        </div> <!-- /.row (main row) -->
                    </div> <!--end::Container-->
                </div> <!--end::App Content-->
            </main> <!--end::App Main--> <!--begin::Footer-->
            <?php include "layout/dashboard-footer.php"; ?>
            </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->

            <?php include "layout/footer.php"; ?>
        </body><!--end::Body-->

        </html>
<?php
    }
?>