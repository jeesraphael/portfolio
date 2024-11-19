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
                <form action="./supports/forms/form-submission.php" method="POST">
                    <!-- Name input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="form4Example1">Name</label>
                        <input type="text" name="name" id="form4Example1" class="form-control" />
                    </div>

                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="form4Example2">Email address</label>
                        <input type="email" name="email" id="form4Example2" class="form-control" />
                    </div>

                    <!-- Message input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="form4Example3">Message</label>
                        <textarea class="form-control" name="message" id="form4Example3" rows="4"></textarea>
                    </div>



                    <!-- Submit button -->
                    <input data-mdb-ripple-init type="submit" name="submit" class="btn btn-primary btn-block mb-4" value="Send">
                </form>
            </div>
        </div>
    </div>
    <footer>
        <?php include_once 'layout/footer.php'; ?>
    </footer>
</body>

</html>