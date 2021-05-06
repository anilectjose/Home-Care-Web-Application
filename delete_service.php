<?php
include 'db2.php';
$su_id=$_GET['s_id'];
mysqli_query($con,"DELETE FROM services_db WHERE services_id ='$su_id'");
        header('location: service_detail.php');
?>