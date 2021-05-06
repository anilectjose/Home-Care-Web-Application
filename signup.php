<?php 
include 'db2.php';

$result="SELECT * FROM `users`";
$add=mysqli_query($con,$result);

 if(isset($_POST['btn_add']))
 {

    $name=$_POST['namesurname'];
    $email=$_POST['email'];    
    $password=$_POST['password'];
    $number=$_POST['phone'];
    $place=$_POST['placee'];

    mysqli_query($con, "INSERT INTO `role_db`(`email`, `password`, `role`) VALUES ('$email','$password','user')");
         $roleid =mysqli_insert_id($con);

    mysqli_query($con,"INSERT INTO `users`(`fname`, `phone`, `place`, `role_id`) VALUES ('$name','$number','$place','$roleid')");
 

        echo "<script>alert('Added');</script>";
        echo "<script>window.history.back();</script>";
 }


?>
<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <link href="stylesheet.css" rel="stylesheet">
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <link rel="icon" href="favicon.png" type="image/png">
  <title>Sign Up</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
  <script src='main.js'></script>
  <style>
    @import url(https://fonts.googleapis.com/css?family=Raleway:400,500);

    body {
    background: hsl(210, 45%, 60%);
    font-family: "Raleway", Helvetica, sans-serif;
  }

   
  </style>
</head>

<body>
  <header>
    <section class="title-text">
      <h1 id="title" class="title">SignUp to Home Care 24x7</h1>
      <p id="description" class="title-text"><em>Let us secure your house</em></p>
    </section>
  </header>

  <main>
    
    <form method="POST"><div id="survey-form">
      <section id="survey-fields">

        <label for="name" id="name-label">* Name:</label>
        <input id="name" name="namesurname" type="text" placeholder="Enter your name" required>
        <label for="email" id="email-label">* Email:</label>
        <input id="email" name="email" type="email" placeholder="Enter your email" required>
        <label for="phone" id="phone-label">* Phone:</label>
        <input id="phone" name="phone" type="number" placeholder="Enter your number" required>
        <label for="name" id="name-label">* Place:</label>
        <input id="name" name="placee" type="text" placeholder="Enter your name" required>
        <label for="password" id="password-label">* Password:</label>
        <input id="password" name="password" type="password" placeholder="Enter your password" required>
      </section>
    </div>
      <input type="submit" value="Submit" name="btn_add"><input type="reset" value="Clear">
    </form> 
    <a href="index.php" class="aclass"> Already a user? Login</a>
  </main>

</body>

</html>