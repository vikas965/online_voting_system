



<?php
include "db.php";
session_start();
if(isset($_POST['login']))
{
    $name=$_POST['username'];
    $password=md5($_POST['password']);   
    $get_voter = "SELECT * from voters where voter_name='$name' and voter_password='$password'";
    $result=mysqli_query($con,$get_voter);
    $num=mysqli_num_rows($result);
    if($num>0)
    {
      $_SESSION['voter']=$name;
      echo "<script>alert('Login Succesful')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }

    
}

?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp"
            crossorigin="anonymous" />

        <link rel="stylesheet" href="../style.css" />
</head>
<body>
    <style>




     h1,label{
      color: aliceblue;
     }  


body{
  padding: 2rem;
  padding-left: 3rem;
  padding-right: 3rem;
  background: rgba(0, 0, 0, 0.553);
}
    </style>

<div class="overlay">
    
<form class="row" action="" method="post" enctype="multipart/form-data" autocomplete="off">
<h1 class="text-center my-2">Voter Login</h1>
    <div class="col-md-12 my-2">
        <label for="username" class="form-label">Username</label>
        <input name="username" type="text" class="form-control" id="username" placeholder="Enter Username">
      </div>
  

  <div class="col-md-12 my-2">
    <label for="inputPassword4" class="form-label">Password</label>
    <input name="password" type="password" class="form-control" id="inputPassword4" placeholder="Enter a Passsword">
  </div>

  
 
  
  
  <div class="col-12 my-4">
    <input name="login" value="Login" type="submit" class="btn btn-primary w-100">
  </div>
</form>
</div>
</body>
</html>