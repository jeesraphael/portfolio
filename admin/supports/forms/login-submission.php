<?php
session_start();
include "../../../configs/database.php";
if (isset($_POST['submit'])) {
    $adminEmail = $_POST['email'];
    $adminPassword = $_POST['password'];
    $selectionQuery = "SELECT * FROM admin WHERE email='$adminEmail'";
    $queryResult = $con->query($selectionQuery);
    $loginSuccess = false;
    if ($queryResult->num_rows > 0) {
        $row = $queryResult->fetch_assoc();
        if ($adminEmail === $row['email']) {
            $adminName = $row['name'];
            $hashedPassword = $row['password'];
            if (password_verify($adminPassword, $hashedPassword)) {
                $_SESSION['email'] = $adminEmail;
                $_SESSION['name'] = $adminName;
                $loginSuccess = true;
            } else {
                $passwordErrorMessage = "Password is incorrect";
            }
        } else {
            $userErrorMessage = "user doesn't exists";
        }
    }
    if ($loginSuccess)
        header('location:../../dashboard.php');
    else header('location:../../login.php');
} else header("location:../../login.php");

$con->close();
