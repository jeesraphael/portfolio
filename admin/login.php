<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<head>
    <title>Admin | Login Page</title><!--begin::Primary Meta Tags-->
    <?php include "layout/header.php"; ?>
</head> <!--end::Head--> <!--begin::Body-->

<body class="login-page bg-body-secondary">
    <div class="login-logo"><b>Admin</b></div> <!-- /.login-logo -->
    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Login</p>
                <form action="supports/forms/login-submission.php" method="POST">
                    <div class="input-group mb-3"> <input type="email" class="form-control" placeholder="Email" name="email" required>
                        <div class="input-group-text"> <span class="bi bi-envelope"></span> </div>
                    </div>
                    <div class="input-group mb-3"> <input type="password" class="form-control" placeholder="Password" name="password" required>
                        <div class="input-group-text"> <span class="bi bi-lock-fill"></span> </div>
                    </div> <!--begin::Row-->
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" name="submit" class="btn btn-primary">Login </button>
                        </div> <!-- /.col -->
                    </div> <!--end::Row-->
                </form>
                <!--begin::Third Party Plugin(OverlayScrollbars)-->
                <footer>
                    <?php include "layout/footer.php"; ?>
                </footer>
</body><!--end::Body-->

</html>