<?php 
include 'db2.php';

$result="SELECT * FROM `services_db`";
$add=mysqli_query($con,$result);

 if(isset($_POST['submit']))
 {

    $name=$_POST['work_name'];
    $wphn=$_POST['work_phn'];    
    $wemail=$_POST['work_email'];
    $wolace=$_POST['work_place'];
    $wpswd=$_POST['work_pswd'];
    $wserv=$_POST['work_serv'];

    mysqli_query($con, "INSERT INTO `role_db`(`email`, `password`, `role`) VALUES ('$wemail','$wpswd','worker')");
    $roleid =mysqli_insert_id($con);

    mysqli_query($con,"INSERT INTO `worker_registration_db`(`w_name`, `w_phone`, `w_place`, `worker_service`,`role_id`) 
    VALUES ('$name','$wphn','$wolace',' $wserv','$roleid')");

        echo "<script>alert('Added');</script>";
        echo "<script>window.history.back();</script>";
 }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="stylesheet.css" rel="stylesheet">
    <link rel="icon" href="favicon.png" type="image/png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="favicon.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Workers</title>
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
        input[type=text],[type=password],[type=email],[type=number] {
            width: 180px;
            padding: 5px;  
            border-radius: 10px;
        }
        select{
            width:140px; 
            height:30px;
            border-radius:5px;
            margin-bottom:30px;
        }

</style>
</head>
<body>
<?php include 'side.php';?>

<div class="common-div">
<h2 id="title" class="title">Add Workers  </h2>
  <div class="addservices-div">
  <form method="POST"><div id="survey-form">
      <section id="survey-fields">

        <label for="name" id="name-label">* Worker name:</label>
        <input id="name" type="text" placeholder="Enter worker name" name="work_name" required>
        <label for="type" id="password-label">* Mobile number:</label>
        <input id="text" type="number" placeholder="Enter worker number" name="work_phn" required>
        <label for="name" id="name-label">* Email:</label>
        <input id="name" type="email" placeholder="Enter worker mail" name="work_email" required>
        <label for="name" id="name-label">* Place:</label>
        <input id="text" type="text" placeholder="Enter worker location" name="work_place" required>
        <label for="type" id="password-label">* Password:</label>
        <input id="text" type="text" placeholder="Enter worker password" name="work_pswd" required>
        <label for="type" id="password-label">* Service:</label>
        <select name="work_serv" required>
        <option disabled selected>Choose type</option>
        <?php
            while ($row=mysqli_fetch_assoc($add)) { ?>
            <option value="<?php echo $row['service_name']; ?>"><?php echo $row['service_name']; ?></option>
            <?php } ?>
        </select>

      <input type="submit" value="Submit" name="submit"><input type="reset" value="Clear">
      </section>
    </div>
    </form> 
  </div>
</div>

</div>
</body>
</html>