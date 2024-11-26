<!DOCTYPE html>
<html lang="en">

<head>
    <title>Portfolio | Contact</title>
    <?php include_once 'layout/header.php' ?>
</head>

<body>

    <?php include_once 'layout/nav.php'; ?>

    <div class="container">
        <h1 class="text-center" id="contact">Contact</h1>
        <div class="row  my-5 d-flex justify-content-center align-items-center">
            <div class="col-md-6 ">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d251063.1230629157!2d75.928209211!3d10.511589047554196!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba7ee15ed42d1bb%3A0x82e45aa016ca7db!2sThrissur%2C%20Kerala!5e0!3m2!1sen!2sin!4v1731930403535!5m2!1sen!2sin"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-6">
                <form action="" method="POST" id="login-form">
                    <!-- Name input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" />
                    </div>

                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="email">Email address</label>
                        <input type="email" name="email" id="email" class="form-control" />
                    </div>

                    <!-- Message input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="message">Message</label>
                        <textarea class="form-control" name="message" id="message" rows="4"></textarea>
                    </div>
                    <!-- Submit button -->
                    <button class="btn btn-primary btn-block mb-4">Send</button>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <?php include_once 'layout/footer.php'; ?>
    </footer>
    <!-- using jquery and ajax for form validation and form submission -->
    <script>
        $(document).ready(function() {
            $("#login-form").validate({
                rules: {
                    name: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    message: {
                        required: true,
                    }
                },
                messages: {
                    name: {
                        required: "Enter your name"
                    },
                    email: {
                        required: "Enter your email"
                    },
                    message: {
                        required: "Please enter your notes"
                    }
                },
                submitHandler: function() {
                    // form.submit();
                    $.post("supports/forms/form-submission.php", {
                            name: $('#name').val(),
                            email: $('#email').val(),
                            message: $('#message').val()
                        },
                        function(data) {
                           let parsedData = JSON.parse(data);                   
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
                            if (parsedData.status === 200) {

                                $('#name').val('')
                                $('#email').val('')
                                $('#message').val('')
                            }
                            Toast.fire({
                                icon: parsedData.status === 200 ? "success" : "error",
                                title: parsedData.message
                            });
                        });
                }
            })
        })
    </script>


</body>

</html>