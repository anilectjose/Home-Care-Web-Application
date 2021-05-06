<?php 
include 'db2.php';
$su_id=$_GET['s_id'];
$result="SELECT * FROM `worker_registration_db` join role_db on worker_registration_db.role_id=role_db.role_id where role_db.role_id='$su_id'";
$add=mysqli_query($con,$result);

 if(isset($_POST['submit']))
 {

    $name=$_POST['work_name'];
    $wphn=$_POST['work_phn'];    
    $wemail=$_POST['work_email'];
    $wolace=$_POST['work_place'];
    $wpswd=$_POST['work_pswd'];
    $wserv=$_POST['work_serv'];

    mysqli_query($con, "UPDATE `role_db` SET `email`='$wemail', `password`='$wpswd' WHERE role_id='$su_id'");   
    mysqli_query($con,"UPDATE `worker_registration_db` SET `w_name`='$name', `w_phone`='$wphn', `w_place`='$wolace', `worker_service`='$wserv' 
    WHERE role_id='$su_id'");

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
    <title>Edit Workers</title>
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
<h2 id="title" class="title">Edit Workers  </h2>
  <div class="addservices-div">
  <form method="POST"><div id="survey-form">
      <section id="survey-fields">
      <?php 
            while ($row = mysqli_fetch_assoc($add)) {  ?>
        <label for="name" id="name-label">* Worker name:</label>
        <input id="name" type="text" placeholder="Enter worker name" name="work_name" value="<?php echo $row['w_name'];?>" required>
        <label for="type" id="password-label">* Mobile number:</label>
        <input id="text" type="number" placeholder="Enter worker number" name="work_phn" value="<?php echo $row['w_phone'];?>" required>
        <label for="name" id="name-label">* Email:</label>
        <input id="name" type="email" placeholder="Enter worker mail" name="work_email" value="<?php echo $row['email'];?>" required>
        <label for="name" id="name-label">* Place:</label>
        <input id="text" type="text" placeholder="Enter worker location" name="work_place" value="<?php echo $row['w_place'];?>" required>
        <label for="type" id="password-label">* Password:</label>
        <input id="text" type="text" placeholder="Enter worker password" name="work_pswd" value="<?php echo $row['password'];?>" required>
        <?php } ?>
      <input type="submit" value="Submit" name="submit"><input type="reset" value="Clear">
      </section>
    </div>
    </form> 
  </div>
</div>

</div>
</body>
</html>