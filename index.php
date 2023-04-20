<?php
include "db.php";
session_start();
if(!isset($_SESSION['voter']))
{
    echo "<script>window.open('user_login.php','_self')</script>";
}
else{
    $name= $_SESSION['voter'];
    $get_details = "SELECT * from voters where voter_name='$name'";
    $details_res = mysqli_query($con,$get_details);
    $row=mysqli_fetch_assoc($details_res);
    $number = $row['voter_mobile'];
    $email=$row['voter_email'];
    $status=$row['voting_status'];
    $age=$row['voter_age'];
  
}   

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <style>
    body{
        overflow-x: hidden;
    }
    .container1,.container2{
        width: 18rem;
        height: 19rem ;
        border: 2px solid rgba(0, 0, 0, 0.674);
        border-radius: 0.5rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .container2{
        border: none;
        margin-top: 4rem;

    }
    .col-md-6{
        display: flex;
        align-items: center;
        justify-content: center;
    }
   .container1 img{
        width: 100px;
        height: 100px;
        border-radius: 40px;
       
    }
    h4{
        border-radius: 5px;
        padding: 3px;
    }
    .Group{
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1rem;
        background: url('https://thumbs.gfycat.com/GrandGraciousGallinule.webp');
        margin-top: 1rem;
        width: 20rem;
        border-radius: 10px;
    }
    .Group img{
        border-radius: 10px;
    }
    
    #preloader{
        width: 100%;
        height: 100%;
        display: block;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 99;
        display: flex;
        align-items: center;
        justify-content: center;
        background: white;
       
    }
    .move{
        position: absolute;
       
        z-index: 100;
    }
   iframe{
    display: none;
   }
   .he{
    background: rgba(0, 0, 0, 0.315);
    padding: 10px;
    border-radius: 10px;
   }
   a{
    text-decoration:none;
    font-size:18px;
   }
   .container2 img{
    filter: brightness(180%);
    
   }

   .container2 a{
    text-decoration: none;
    color: blue;
    background: white;
    padding: 3px;
    padding-left: 6px;
    padding-right: 6px;
    border-radius: 3px;
   }
</style>
  <body>
    <div id="preloader">
        <img class="move" width="200" height="200"   src="https://cms-assets.tutsplus.com/cdn-cgi/image/width=600/uploads/users/1112/posts/25209/image/animate-bird-slide-25.gif" alt="">
        
    </div>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/fInjJFpHeHY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/IMikqgYse04" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/IMikqgYse04" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/IMikqgYse04" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    <h1 class='text-center mt-2 mb-3'>Vote Here</h1>
   <div class="row">
    <div class="col-md-6 p-2">
        
        <div class="container1">
            <img src="voter.png" alt="">
            <?php
            
            echo "<h3 class='mt-2 text-capitalize'>$name($age)</h3>
            <p>Mobile : $number <br>Email : $email <br>         
            </p>";
           
            
            ?>
            <?php
            if($status=='no'){
           echo " <h4 class='text-center bg-danger text-light'>Not Voted</h4>";
            }
            else{
                echo " <h4 class='text-center text-light' style='background:green;'>Voted</h4>";
            }
            ?>
            <a href="./logout.php" class='text-danger'>Logout</a>
        </div>
    </div>
    <div class="col-md-6 p-2">
        <div class="container2">
            <h2 class="text-center he">Groups</h2>
            <?php

            $select_groups = "SELECT * FROM groups";
            $select = mysqli_query($con,$select_groups);
            if($select)
            {
                while($row=mysqli_fetch_assoc($select))
                {
                    echo "<div class='Group'>
                    <div class='div text-light'> <p>{$row['group_name']}</p>";
                    if($status=='no')
                    {
                        echo "<a href='index.php?grp_id={$row['group_id']}'>Vote</a></div>";
                    }
                    else{
                        echo "<button class='btn btn-primary'>Voted</button></div>";
                    }
                    echo "
                     <img src='groups/{$row['group_image']}'  width='70' height='70'>
                 </div>
                ";
                }
            }
            
            
            ?>
            
            
          
        </div>
    </div>

   </div>
<?php

if(isset($_GET['grp_id']))
{
   $voter_name= $name;
   $grp_id = $_GET['grp_id'];
   $voteit = "UPDATE voters set voting_status='yes' where voter_name='$voter_name'";
   $voted = mysqli_query($con,$voteit);

   $select_votes = "SELECT * from groups where group_id =$grp_id ";
   $get_votes = mysqli_query($con,$select_votes);
   $votedata  = mysqli_fetch_assoc($get_votes);
   $votes = $votedata['votes'];

   $update_votes = $votes + 1 ;
   $update_votes = "UPDATE groups set votes=$update_votes where group_id=$grp_id";
   $votes_updated = mysqli_query($con,$update_votes);

   if($voted && $votes_updated)
   {
    echo "<script>alert('Voted Succesfully')</script>";
    echo "<script>window.open('index.php','_self')</script>";
   }


}

?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <script>
       window.onload = function()
       {
        document.getElementById("preloader").style.display="none"
       }
    </script>
  </body>
</html>