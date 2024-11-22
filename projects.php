<?php
include_once "configs/database.php";
$projectListingQuery="SELECT * FROM projects";
$projectListingResult=$con->query($projectListingQuery);
$con->close();
?>







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
           while($projects=$projectListingResult->fetch_assoc()){
            ?>
                 <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="admin/<?=$projects['project_image'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?=$projects['project_title'] ?></h5>
                                <p class="card-text"><?=$projects['project_description'] ?></p>
                                <div class="button text-center">
                                    <a href="<?=$projects['project_link'] ?>" class="btn btn-primary">Click to see</a>
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