<?php
include 'db2.php';
session_start();
$usrname=$_SESSION["login_admin"]; 
$su_id=$_GET['s_id'];
mysqli_query($con,"UPDATE `work_db` set `worker_id`='$usrname', `status`='Approved' where work_id='$su_id'");
        header('location: worker_dashboard.php');
?>