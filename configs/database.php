<?php
$hostName="localhost";
$userName="root";
$password="";
$dbName="portfolio";
$con=new mysqli($hostName,$userName,$password,$dbName);
if($con->connect_error){
    die("connection failed:".$con->connect_error);
}
