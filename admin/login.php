<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<head>
    <title>Admin | Login Page</title><!--begin::Primary Meta Tags-->
    <?php include "layout/header.php"; ?>
</head> <!--end::Head--> <!--begin::Body-->

<body class="login-page bg-body-secondary">
    <div class="login-logo"><b id="admin">Admin</b></div> <!-- /.login-logo -->
    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Login</p>
                <form action="" method="POST" id="login-form">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email" id="email">
                        <div class="input-group-text">
                            <span class="bi bi-envelope"></span>
                        </div>
                        <div class="input-group error mt-1">

                            <span id="email-error" style="color:red;"></span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                        <div class="input-group-text">
                            <span class="bi bi-lock-fill"></span>
                        </div>
                        <div class="input-group error mt-1">
                            <span id="password-error" style="color:red;"></span>
                        </div>
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

                <!-- using jquery and ajax -->

                <script>
                    $(document).ready(function() {
                        $('#login-form').validate({
                            rules: {
                                email: {
                                    required: true,
                                    email: true
                                },
                                password: {
                                    required: true
                                }
                            },
                            messages: {
                                email: {
                                    required: "Please enter your mailid"
                                },
                                password: {
                                    required: "Please enter your password"
                                }
                            },
                            errorPlacement: function(error, element) {
                                // error.insertAfter(" span"); // Places the error message below the input field
                                error.addClass('text-danger').appendTo(element.closest('div').find('.error'));
                            },
                            highlight: function(element) {
                                // $(element).addClass('text-danger'); // Adds a red border to invalid input fields
                                $(element).addClass('border-danger');
                            },
                            unhighlight: function(element) {
                                // $(element).removeClass('text-danger'); // Removes the red border when valid
                                $(element).removeClass('border-danger'); // Removes the red border when valid
                            },
                            submitHandler: function() {
                                let formData = new FormData();
                                let email = $('#email').val();
                                let password = $('#password').val();
                                formData.append('email', email);
                                formData.append('password', password);

                                $.ajax({
                                    url: "supports/forms/login-submission.php",
                                    type: "POST",
                                    data: formData, // JSON.stringify(formData)
                                    contentType: false, // 'application/json' if sending a json data,
                                    processData: false,
                                    success: function(response) {
                                        if (response.status === 200) {
                                            $('#login-form')[0].reset();
                                            window.location.href = "dashboard.php";
                                        } else if (response.error.length > 0) {
                                            response.error.forEach(errobj => {
                                                for (const key in errobj) {
                                                    let keyValue = errobj[key];
                                                    if (keyValue === "Please enter your mailid") {
                                                        $('#email-error').text(`*${keyValue}`);
                                                        $('#email').on('input', function() {
                                                            $('#email-error').text(''); // Clear the error message
                                                        });
                                                    } else if (keyValue === "Please enter a valid mailid") {
                                                        $('#email-error').text(`*${keyValue}`);
                                                        $('#email').on('input', function() {
                                                            $('#email-error').text(''); // Clear the error message
                                                        });
                                                    } else if (keyValue === "There is no such email field") {
                                                        $('#email-error').text(`*${keyValue}`);
                                                        $('#email').on('input', function() {
                                                            $('#email-error').text('');
                                                        });
                                                    } else if (keyValue === "There is no such password field") {
                                                        $('#password-error').text(`*${keyValue}`);
                                                        $('#password').on('input', function() {
                                                            $('#password-error').text('');
                                                        });
                                                    } else if (keyValue === "Please enter your password") {
                                                        $('#password-error').text(`*${keyValue}`);
                                                        $('#password').on('input', function() {
                                                            $('#password-error').text('');
                                                        });
                                                    } else if (keyValue === "Password is incorrect") {
                                                        $('#password-error').text(`*${keyValue}`);
                                                        $('#password').on('input', function() {
                                                            $('#password-error').text('');
                                                        });
                                                    } else if (keyValue === "There is no such user on this email") {
                                                        $('.login-logo').after(`<div class="error-message text-danger">${keyValue}</div>`);
                                                        $('#email, #password').on('input', function() {
                                                            $('.error-message').text('');
                                                        });
                                                    }
                                                    ////if we dont explicitly mentioned the status code then it will call the success callback
                                                    // else if(keyValue==="Database query failed"){
                                                    //     $('#email-error').text(`*${keyValue}`);
                                                    //     $('#email').on('input', function () {
                                                    //         $('#email-error').text(''); 
                                                    //     });                                                    
                                                    // } 
                                                }
                                            })
                                        }
                                    },
                                    error: function(xhr, status, error) {
                                        if (xhr.status === 500) {
                                            $('.login-logo').after(`<div class="error-message text-danger">${error}</div>`);
                                            $('#email, #password').on('input', function() {
                                                $('.error-message').text('');
                                            });
                                        }
                                    }
                                });

                            }
                        })
                    })
                </script>
</body>

</html>