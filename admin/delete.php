<?php
include "../configs/database.php";
session_start();
if (isset($_SESSION['email'])) {

$id=$_POST['userid'];
$deleteQuery="DELETE FROM contact  WHERE id='$id'";
if($con->query($deleteQuery)){
    header("location:contacts.php");
}

}