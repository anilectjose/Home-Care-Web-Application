<?php
include 'db2.php';
session_start();
$usrname=$_SESSION["login_admin"];
$query2=mysqli_query($con,"SELECT * FROM role_db join users on users.role_id=role_db.role_id 
      WHERE role_db.role_id='$usrname'");
$real=mysqli_fetch_assoc($query2);
      $result=mysqli_query($con,"SELECT * FROM work_db join worker_registration_db on 
      worker_registration_db.role_id=work_db.worker_id join users  on work_db.user_id=users.role_id 
      join services_db on services_db.services_id=work_db.service_id where work_db.status!='pending' and work_db.user_id='$usrname'");

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
<div class="dash-table">
<table>
  <tr>
    <th>Task</th>
    <th>Customer</th>
    <th>Worker</th>
    <th>Place</th>
    <th>Action</th>
  </tr>
  <?php 
            while ($row = mysqli_fetch_assoc($result)) {  ?>
  <tr>
    <td><?php echo $row['service_name'];?></td>
    <td><?php echo $row['fname'];?></td>
    <td><?php echo $row['w_name'];?></td>
    <td><?php echo $row['place'];?></td>
    <td>
    <a href="Accept_work.php?s_id=<?php echo $row['work_id'];?>" class="atag"><input type="submit" value="Accept" name="btn_add"></a>
    </td>
  </tr>
  <?php } ?>
</table>
</div>
</div>
</body>
</html>