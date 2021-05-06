<?php 
include 'db2.php';
$su_id=$_GET['s_id'];
$result="SELECT * FROM `services_db` join service_type on services_db.service_type=service_type.type_id where services_id='$su_id'";
$add=mysqli_query($con,$result);
$add2=mysqli_query($con,"SELECT * FROM service_type");
 if(isset($_POST['submit']))
 {

    $name=$_POST['serv_name'];
    $stype=$_POST['serv_type'];    
    $sprice=$_POST['serv_price'];
    $sdesc=$_POST['serv_desc'];
    $stags=$_POST['serv_tags'];

    mysqli_query($con,"UPDATE `services_db` SET 
    `service_name`='$name',`service_type`='$stype',`service_price`='$sprice',`service_desc`='$sdesc',`tags`='$stags' where services_id='$su_id'");

        echo "<script>alert('Updated');</script>";
        header('location: service_detail.php');
 }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="stylesheet.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="favicon.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Services</title>
    <style>
        .addservices-div{
            padding-top:20px;
            margin-left:220px;
            background:white;
            width:100%;
            border-radius:5px;
        }
        h2{
            margin-left:500px; 
            font-family: "Raleway", Helvetica, sans-serif;
        }
        textarea{
          width:200px;
          padding: 5px;  
          border-radius: 10px;
        }
        select{
            width:140px; 
            height:30px;
            border-radius:5px;
        }
</style>
</head>
<body>
<?php include 'side.php';?>
<div class="common-div">
<h2 id="title" class="title">Edit Services    </h2>
  <div class="addservices-div">
  <form method="POST"><div id="survey-form">
      <section id="survey-fields">
      <?php 
            $count=0;
            while ($row = mysqli_fetch_assoc($add)) {  ?>
        <label for="name" id="name-label">* Service:</label>
        <input id="name" type="text" placeholder="Enter service name" name="serv_name" value="<?php echo $row['service_name'];?>" required>
        <label for="type" id="password-label">* Service  type:</label>
        <select name="serv_type" required>
            <option value="<?php echo $row['type_id']; ?>" disabled selected><?php echo $row['type']; ?></option>
        </select>
        <label for="name" id="name-label">* Price:</label>
        <input id="name" type="number" placeholder="Enter service price" name="serv_price" value="<?php echo $row['service_price'];?>" required>
        <label for="w3review">* Description:</label>

        <textarea id="text" type="text" placeholder="Enter service description" name="serv_desc" rows="4" cols="50">
        <?php echo $row['service_desc'];  ?></textarea>
        <label for="type" id="password-label">* Tags:</label>
        <input id="text" type="text" placeholder="Enter service tags" name="serv_tags" value="<?php echo $row['tags'];?>" required>

      <input type="submit" value="Submit" name="submit"><input type="reset" value="Clear">
      <?php } ?>
      </section>
    </div>
    </form> 
  </div>
</div>
</body>
</html>