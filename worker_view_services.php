<?php 
include 'db2.php';

$result=mysqli_query($con,"SELECT * FROM `services_db` join service_type on services_db.service_type=service_type.type_id");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="stylesheet.css" rel="stylesheet">
    <link rel="icon" href="favicon.png" type="image/png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Details</title>
    <style>
        h3{
            font-family: "Raleway", Helvetica, sans-serif;
        }
        a{
          text-decoration:none;
        }
        .card-detail{
            background-color: rgb(240, 74, 56);
            font-family: verdana;
            width:350px;
            padding:3px;
            color:white;
        }
        .card-detail-two{
            font-family: verdana;
            width:350px;
            margin-top:-30px;
            padding:3px;
            background:white;
        }
        .blah{
            margin-right:20px;
        }
        </style>
</head>
<body>
<?php include 'side3.php';?>

<div class="common-div">    
<h3>Service Detail</h3>
<div id="block_container">
<?php 
            $count=0;
            while ($row = mysqli_fetch_assoc($result)) {  ?>
            
<div class="blah">
<div class="card-detail">
<h3 style="margin-left:10px;"><?php echo $row['service_name'];?></h3>
<p style="margin-top:-12px; margin-left:10px;"><?php echo $row['service_price'];?></p>
</div>
<div class="card-detail-two">
<p style="margin-left:10px; margin-bottom:-10px;">Type: <?php echo $row['type'];?></p><br>
<p style="margin-bottom:-5px; margin-left:10px;">Description: <?php echo $row['service_desc'];?></p><br>
</div></div>
<?php } ?>
</div></div>
</body>
</html>