



<?php
include "db.php";
if(isset($_POST['register']))
{
    $name=$_POST['username'];
    $email=$_POST['email'];
    $number=$_POST['number'];
    $age=$_POST['age'];
    $password=md5($_POST['password']);
    $cpassword=md5($_POST['cpassword']);
    if($password==$cpassword)
    {
    $insert = "INSERT INTO voters(voter_name,voter_age,voter_password,voter_mobile,voter_email,voting_status)
    VALUES('$name',$age,'$password', $number,'$email','no')";
    $inserit=mysqli_query($con,$insert);
    if($inserit)
    {
      echo "<script>alert('Registered Succesfully')</script>";
    }


    }
    else{
      echo "<script>alert('Passwords doesnt match')</script>";
      echo "<script>window.open('user_login.php','_self')</script>";
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
<h1 class="text-center my-2">Voter Registration </h1>
    <div class="col-md-6 my-2">
        <label for="username" class="form-label">Username</label>
        <input name="username" type="text" class="form-control" id="username" placeholder="Enter Username">
      </div>
  <div class="col-md-6 my-2">
    <label for="inputEmail4" class="form-label">Email</label>
    <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Enter Email">
  </div>
  <div class="col-md-6 my-2">
    <label for="mobile" class="form-label">Mobile Number</label>
        <input  name="number" type="number" class="form-control" id="mobile" placeholder="Enter mobile number">
  </div>
  <div class="col-md-6 my-2">
    
    <label for="inputAddress" class="form-label">Age</label>
    <input name="age"  class="form-control" id="inputAddress" placeholder="Enter Your Age">
  </div>
  <div class="col-md-6 my-2">
    <label for="inputPassword4" class="form-label">Password</label>
    <input name="password" type="password" class="form-control" id="inputPassword4" placeholder="Enter a Passsword">
  </div>
  <div class="col-md-6 my-2">
    <label for="confirmpassword" class="form-label">Confirm Password</label>
    <input name="cpassword" type="password" class="form-control" id="confirmpassword" placeholder="Confirm Your Password">
  </div>
  
 
  
  
  <div class="col-12 my-4">
    <input name="register" value="Register" type="submit" class="btn btn-primary w-100">
  </div>
</form>
</div>
</body>
</html>