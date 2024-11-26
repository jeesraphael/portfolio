<?php
/// without ajax
// session_start();
// include "../../../configs/database.php";
// if (isset($_POST['submit'])) {
//     $adminEmail = $_POST['email'];
//     $adminPassword = $_POST['password'];
//     $selectionQuery = "SELECT * FROM admin WHERE email='$adminEmail'";
//     $queryResult = $con->query($selectionQuery);
//     $loginSuccess = false;
//     if ($queryResult->num_rows > 0) {
//         $row = $queryResult->fetch_assoc();
//         if ($adminEmail === $row['email']) {
//             $adminName = $row['name'];
//             $hashedPassword = $row['password'];
//             if (password_verify($adminPassword, $hashedPassword)) {
//                 $_SESSION['email'] = $adminEmail;
//                 $_SESSION['name'] = $adminName;
//                 $loginSuccess = true;
//             } else {
//                 $passwordErrorMessage = "Password is incorrect";
//             }
//         } else {
//             $userErrorMessage = "user doesn't exists";
//         }
//     }
//     if ($loginSuccess)
//         header('location:../../dashboard.php');
//     else header('location:../../login.php');
// } else header("location:../../login.php");
// $con->close();
?>
<?php
// using ajax
include "../../../configs/database.php";
header('Content-type: application/json');
session_start();
$data = [];
$errors = [];
$loginSuccess = true;
if (!isset($_POST['email'])) {
    $loginSuccess = false;
    array_push($errors, ['email' => "There is no such email field"]);
}
if (empty($_POST['email'])) {
    $loginSuccess = false;
    array_push($errors, ['email' => "Please enter your mailid"]);
}
if (!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
    $loginSuccess = false;
    array_push($errors, ['email' => "Please enter a valid mailid"]);
}

if (!isset($_POST['password'])) {
    $loginSuccess = false;
    array_push($errors, ['password' => "There is no such password field"]);
}
if (empty($_POST['password'])) {
    $loginSuccess = false;
    array_push($errors, ['password' => "Please enter your password"]);
}
if (!$loginSuccess) {
    echo json_encode([
        "status" => 401,
        "message" => "Invalid request",
        "data" => $data,
        "error" => $errors
    ]);
    exit;
} else {
    $adminEmail = $_POST['email'];
    $adminPassword = $_POST['password'];
    try {
        $selectionQuery = "SELECT * FROM admin WHERE email='$adminEmail'";
        $queryResult = $con->query($selectionQuery);
    } catch (Exception $e) {
        http_response_code(500);  // Internal Server Error
        array_push($errors, ['server error' => "Database query failed"]);
        echo json_encode([
            'status' => 500,
            'message' => 'Internal Server Error',
            'data' => $data,
            'error' => $errors
        ]);
        exit;
    }
    if ($queryResult->num_rows > 0) {
        $row = $queryResult->fetch_assoc();
        $adminName = $row['name'];
        $hashedPassword = $row['password'];
        if (password_verify($adminPassword, $hashedPassword)) {
            $_SESSION['email'] = $adminEmail;
            $_SESSION['name'] = $adminName;
            //http_response_code(200); //success
            echo json_encode([
                'status' => 200,
                'message' => 'Login successful',
                'data' => $data,
                'error' => $errors
            ]);
            exit;
        } else {
            //http_response_code(401); //Unauthorized
            array_push($errors, ['password' => "Password is incorrect"]);
            echo json_encode([
                'status' => 401,
                'message' => 'Unauthorized',
                'data' => $data,
                'error' => $errors
            ]);
            exit;
        }
    } else {
        //http_response_code(404);  // user not found
        array_push($errors, ['user error' => "There is no such user on this email"]);
        echo json_encode([
            'status' => 404,
            'message' => 'User not found',
            'data' => $data,
            'error' => $errors
        ]);
        exit;
    }
}
$con->close();
?>