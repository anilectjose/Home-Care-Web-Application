<?php
include 'db2.php';
session_start();
if(isset($_SESSION['login_admin']))
{
  header("location:dashboard.php");
}
if (isset($_POST["submit"]))
{
  $usrname = mysqli_real_escape_string($con,$_POST['usrnm']);
  $epassword = mysqli_real_escape_string($con,$_POST['pswd']);

  $sql=mysqli_query($con,"SELECT * FROM role_db WHERE email='$usrname' AND password='$epassword'");
  while ($row = mysqli_fetch_assoc($sql)) {

  if($row['role']=='admin')
  {
    $_SESSION['login_admin']=$row['role_id'];
    header("location: dashboard.php");
  }
  elseif($row['role']=='worker')
  {
    $_SESSION['login_admin'] = $row['role_id'];
    header("location: worker_dashboard.php");
  }
  elseif($row['role']=='user')
  {
    $_SESSION['login_admin']=$row['role_id'];
    header("location: user_dashboard.php");
  }
  else
  {
    echo "<script>alert('Username and password are incorrect')</script>";
    echo "<script>window.location='index.php'</script>";
  }
}
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <link href="stylesheet.css" rel="stylesheet">
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <link rel="icon" href="favicon.png" type="image/png">
  <title>Login</title>
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
      <h1 id="title" class="title">Login to Home Care 24x7</h1>
      <p id="description" class="title-text"><em>Let us secure your house</em></p>
    </section>
  </header>

  <main>
    
    <form method="POST"><div id="survey-form">
      <section id="survey-fields">

        <label for="name" id="name-label">* Email:</label>
        <input id="name" type="email" placeholder="Enter your email" name="usrnm" required>
        <label for="Email" id="password-label">* Password:</label>
        <input id="email" type="password" placeholder="Enter your password" name="pswd" required>
      </section>
    </div>
      <input type="submit" value="Submit" name="submit"><input type="reset" value="Clear">
    </form> 
    <a href="signup.php" class="aclass"> Not a user?SignUp</a>
  </main>

</body>

</html>