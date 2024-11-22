<?php
include "../../configs/database.php";
if(isset($_POST["submit"])){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $message=$_POST["message"];
    $insertQuery="INSERT INTO contact(name,email,message) VALUES('$name','$email','$message')";
    if($con->query($insertQuery)) 
        header("location:../alerts/success.php");
    else
        header("location:../alerts/error-alert.php");

}