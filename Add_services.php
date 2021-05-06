<?php 
include 'db2.php';

$result="SELECT * FROM `service_type`";
$add=mysqli_query($con,$result);

 if(isset($_POST['submit']))
 {

    $name=$_POST['serv_name'];
    $stype=$_POST['serv_type'];    
    $sprice=$_POST['serv_price'];
    $sdesc=$_POST['serv_desc'];
    $stags=$_POST['serv_tags'];

    mysqli_query($con,"INSERT INTO `services_db`( `service_name`, `service_type`, `service_price`, `service_desc`, `tags`) VALUES 
    ('$name','$stype','$sprice','$sdesc','$stags')");

        echo "<script>alert('Added');</script>";
        echo "<script>window.history.back();</script>";
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
    <title>Add Services</title>
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
<h2 id="title" class="title">Add Services    </h2>
  <div class="addservices-div">
  <form method="POST"><div id="survey-form">
      <section id="survey-fields">

        <label for="name" id="name-label">* Service:</label>
        <input id="name" type="text" placeholder="Enter service name" name="serv_name" required>
        <label for="type" id="password-label">* Service  type:</label>
        <select name="serv_type" required>
            <option disabled selected>Choose type</option>
        <?php
            while ($row=mysqli_fetch_assoc($add)) { ?>
            <option value="<?php echo $row['type_id']; ?>"><?php echo $row['type']; ?></option>
            <?php } ?>
        </select>
        <label for="name" id="name-label">* Price:</label>
        <input id="name" type="number" placeholder="Enter service price" name="serv_price" required>
        <label for="w3review">* Description:</label>

        <textarea id="text" type="text" placeholder="Enter service description" name="serv_desc" rows="4" cols="50"></textarea>
        <label for="type" id="password-label">* Tags:</label>
        <input id="text" type="text" placeholder="Enter service tags" name="serv_tags" required>

      <input type="submit" value="Submit" name="submit"><input type="reset" value="Clear">
      </section>
    </div>
    </form> 
  </div>
</div>
</body>
</html>