<?php
include 'db2.php';
session_start();
if($_SESSION['login_admin']==""){
    header("location:index.php");
}
$result=mysqli_query($con,"SELECT * FROM `service_type`");
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
        table {
    border-collapse: collapse;
    width: 150%;
    margin-left: 30px;
  }
  
  th, td {

    text-align: center;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    border-bottom: 1px solid #ddd;
  }
  
  td:hover {background-color: hsl(210, 45%, 60%);}
  .atag{
      margin-left:-140px;
  }
</style>
</head>
<body>
<?php include 'side2.php';?>

<div class="common-div">
<h3>Dashboard</h3>
<div id="block_container">
<?php
    while ($row=mysqli_fetch_assoc($result)) { ?>
<a href="user_service_detail.php?s_id=<?php echo $row['type_id'];?>">
<div class="card-div-red">
<?php echo $row['type']; ?>
    <h4 class=card-div>5</h4>
</div></a>
<?php } ?>
</div>
</body>
</html>