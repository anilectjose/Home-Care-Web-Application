<?php
include 'db2.php';
session_start();
$usrname=$_SESSION["login_admin"]; 
$su_id=$_GET['s_id'];
mysqli_query($con,"INSERT INTO `work_db`(`service_id`, `user_id`, `status`) VALUES ('$su_id','$usrname','pending')");
        header('location: user_dashboard.php');
?>