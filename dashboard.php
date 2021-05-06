<?php
session_start();
if($_SESSION['login_admin']==""){
    header("location:index.php");
}
include 'db2.php';

$result=mysqli_query($con,"SELECT * FROM `services_db` ");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="favicon.png" type="image/png">
    <link href="stylesheet.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
              h3{
            font-family: "Raleway", Helvetica, sans-serif;
        }
        a{
          text-decoration:none;
        }
</style>
</head>
<body>
<?php include 'side.php';?>

<div class="common-div">
<h3>Dashboard</h3>
<div id="block_container">
<a href="services.php">
<div class="card-div-red">
    Services
    <h4 class=card-div>5</h4>
</div></a>
<a href="users.php">
<div class="card-div-blue">
    Users
    <h4 class=card-div>5</h4>
</div></a>
<a href="workers.php">
<div class="card-div-green">
    Workers
    <h4 class=card-div>5</h4>
</div></a>
<a href="complaints .php">
<div class="card-div-yellow">
    Complaints
    <h4 class=card-div>5</h4>
</div></a>
</div>
<div class="dash-table">

</div>
</div>
</body>
</html>