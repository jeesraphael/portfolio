<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container ">
            <a class="navbar-brand fs-3" href="#">My Portfolio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-5">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="projects.php">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container">
        <h1 class="text-center" id="projects"> Projects</h1>
        <div class="row my-5 d-flex justify-content-center align-items-center">
            <div class="col-md-4 d-flex flex-column justify-content-center align-items-center">
                <div class="card mb-4">
                    <img src="task-tracker-app.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Task Tracker App</h5>
                        <p class="card-text">A web application for managing daily tasks and to-do lists with priority
                            levels and notifications.</p>
                        <div class="button text-center">
                            <a href="#" class="btn btn-primary">Click to see</a>
                        </div>
                    </div>

                </div>
                <div class="card mb-4">
                    <img src="weather-dashboard.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title ">Weather Dashboard</h5>
                        <p class="card-text">A real-time weather app that displays current weather conditions and a
                            5-day forecast using a public weather API.</p>
                        <div class="button text-center">
                            <a href="#" class="btn btn-primary">Click to see</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex flex-column justify-content-center align-items-center">
                <div class="card mb-4">
                    <img src="e-commerce-product-page.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">E-commerce Product Page</h5>
                        <p class="card-text">A simple e-commerce product page with features like product listing,
                            filters, and an interactive shopping cart.</p>
                        <div class="button text-center">
                            <a href="#" class="btn btn-primary">Click to see</a>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <img src="expense-tracker.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title ">Expense Tracker</h5>
                        <p class="card-text">A tool for users to log their daily expenses and visualize spending trends
                            through charts and graphs.</p>
                        <div class="button text-center">
                            <a href="#" class="btn btn-primary">Click to see</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex flex-column justify-content-center align-items-center">
                <div class="card mb-4">
                    <img src="chat-application.jpg" class="card-img-top img-fluid" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Chat Application</h5>
                        <p class="card-text">A real-time chat application using WebSocket for instant messaging between
                            users in a shared room.</p>
                        <div class="button text-center">
                            <a href="#" class="btn btn-primary">Click to see</a>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <img src="quiz-app.png" class="card-img-top " alt="...">
                    <div class="card-body">
                        <h5 class="card-title ">Quiz App</h5>
                        <p class="card-text">An interactive quiz application with a timer, multiple-choice questions,
                            and a scoring system.</p>
                        <div class="button text-center">
                            <a href="#" class="btn btn-primary">Click to see</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <hr>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>