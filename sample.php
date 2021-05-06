<?php
include 'db2.php';
session_start();
$query = $con->query("SELECT * FROM role_db WHERE role_id=".$_SESSION['userSession']);
$userRow=$query->fetch_array();
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
<?php include 'side.php';?>

<div class="common-div">
<h3>Dashboard</h3>
<div class="dash-table">
<table>
  <tr>
    <th>Task</th>
    <th>Customer</th>
    <th>Place</th>
    <th>Action</th>
  </tr>
  <tr>
    <td><?php
echo "Favorite color is " .$userRow['email']. ".<br>";
?></td>
    <td>Griffin</td>
    <td>$100</td>
    <td>
    <a href="Accept_work.php?s_id=<?php echo $row['work_id'];?>" class="atag"><input type="submit" value="Accept" name="btn_add"></a>
    </td>
  </tr>
</table>
</div>
</div>
</body>
</html>