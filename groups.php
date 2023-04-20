



<?php
include "db.php";
if(isset($_POST['insert']))
{
    $name=$_POST['groupname'];
    $img_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name']; 
    $img_upload_path = 'groups/'.$img_name;
    $insert = "INSERT INTO groups(group_name,group_image) VALUES('$name','$img_name')";
    $insert_result = mysqli_query($con,$insert);
    if($insert_result)
    {     
    move_uploaded_file($tmp_name,$img_upload_path);
    echo "<script>alert('Inserted Succesfully')</script>";
    echo "<script>window.open('admin.php','_self')</script>";
   
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




    


body{
  padding: 2rem;
  padding-left: 3rem;
  padding-right: 3rem;
  /* background: rgba(0, 0, 0, 0.553); */
}
    </style>

<div class="overlay">
    
<form class="row" action="" method="post" enctype="multipart/form-data" autocomplete="off">
<h1 class="text-center my-2">INSERT GROUP </h1>
    <div class="col-md-12 my-2">
        <label for="Group Name" class="form-label">Group Name</label>
        <input name="groupname" type="text" class="form-control" id="Group Name" placeholder="Enter Group Name" required>
      </div>
  
      <div class="col-12">
    
    <label for="formFile" class="form-label">Upload Your Image</label>
  <input name="image" class="form-control" type="file" id="formFile" required>
  </div>
 
  
  
  <div class="col-12 my-4">
    <input name="insert" value="Insert" type="submit" class="btn btn-primary w-100">
  </div>
</form>
</div>
</body>
</html>