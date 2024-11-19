<!DOCTYPE html>
<html lang="en">

<head>
    <title>Portfolio | Projects</title>
    <?php include_once 'layout/header.php' ?>
</head>

<body>
    
    <?php include_once 'layout/nav.php'; ?>
    
    <div class="container">
        <h1 class="text-center" id="projects"> Projects</h1>
        <div class="row">
           <?php
                for ($i=0; $i < 4; $i++) { 
                   ?>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="assets/images/task-tracker-app.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Task Tracker App</h5>
                                <p class="card-text">A web application for managing daily tasks and to-do lists with priority
                                    levels and notifications.</p>
                                <div class="button text-center">
                                    <a href="#" class="btn btn-primary">Click to see</a>
                                </div>
                            </div>
                        </div>
                    </div>
                   <?php
                }
           ?>
        </div>
    </div>
    </div>
    <footer>
        <?php include_once 'layout/footer.php'; ?>
    </footer>
</body>

</html>