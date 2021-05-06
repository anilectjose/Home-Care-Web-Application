<?php
include 'db2.php';
$su_id=$_GET['s_id'];
mysqli_query($con,"DELETE FROM worker_registration_db WHERE role_id ='$su_id'");
mysqli_query($con,"DELETE FROM role_db WHERE role_id ='$su_id'");
        header('location: workers.php');
?>