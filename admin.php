
<?php
include "db.php";
session_start();
if(!isset($_SESSION['admin']))
{
    header("Location:admin_login.php");
}
else{

    $admin_name = $_SESSION['admin'];
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Admin Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp"
            crossorigin="anonymous" />
        <!-- <link rel="stylesheet" href="../style.css" /> -->
        <link rel="stylesheet" href="../all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
       
        <style>
           
           

        * {
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-image: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }

        .logo {
            width: 6%;
            height: 6%;
        }

        .br {
            border-radius: 10px;
            box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px,
                rgba(6, 24, 44, 0.65) 0px 4px 6px -1px,
                rgba(255, 255, 255, 0.08) 0px 1px 0px inset;
        }

        .admin-image {
            width: 100px;
            object-fit: contain;
        }

        .row {
            /* margin-right: -25px; */
            margin-left: 0;
            margin-right: 0;
        }

        button {
            background: none;
            border: none;
        }

        .sc {

            width: 9rem;

            border-radius: 10px;
            height: 1.8rem;
            box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px,
                rgba(6, 24, 44, 0.65) 0px 4px 6px -1px,
                rgba(255, 255, 255, 0.08) 0px 1px 0px inset;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px,
                rgba(0, 0, 0, 0.3) 0px 30px 60px -30px,
                rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
            background: linear-gradient(to top, #6a85b6 0%, #bac8e0 100%);
        }

        .scs{
            width: 9rem;

            border-radius: 10px;
            height: 1.8rem;
            box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px,
                rgba(6, 24, 44, 0.65) 0px 4px 6px -1px,
                rgba(255, 255, 255, 0.08) 0px 1px 0px inset;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px,
                rgba(0, 0, 0, 0.3) 0px 30px 60px -30px,
                rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
            background:red;
        }
        a{
            text-decoration:none;
        }
        .table_image {
            width: 7rem;
            height: 7rem;
            border-radius: 20px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;

        }

        .img{
            width: 5rem;
            height: 5rem;
            border-radius: 10px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
        }
        .side{
            display:flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%);
            border-radius: 10px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
            position: relative;
            top: 4rem;
            left: 10px;
            height: 100%;
            /* margin-left: 0.5rem; */
            /* position: fixed; */
            /* margin-left: 5px; */

        }
        .table_image{
            width: 100px;
            height: 100px;
            border-radius: 10px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
        }
        
        </style>

        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <img src="./logoicon.png" alt="" class="logo" />
                    <nav class="navbar navbar-expand-lg br">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="" class="nav-link">Welcome <?php echo $admin_name  ?></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </nav>
            <!-- <div class="bg-light">
                <h3 class="text-center p-2">Manage Details</h3>
            </div> -->

            <div class="row">
                <div class="col-md-2  p-1 align-items-center side mb-3 ">
                    <div class="image px-3 py-3">
                        <?php
                        
                        // $getimage = "SELECT * from admins where admin_name ='$admin'";
                        // $image_result= mysqli_query($con,$getimage );
                        // $am=mysqli_fetch_assoc($image_result);
                        // $adminimg=$am['admin_image']
                        
                        ?>
                        <a href=""><img src="adminimages/<?php ?>" class="admin-image" alt="" /></a>
                        <h2 class="text-center"><?php echo $admin_name ?></h2>
                    </div>
                    <div class="button text-center">
                        <button>
                            <a href="groups.php" class="nav-link text-light my-1 sc mx-1">Insert
                                Group</a>
                        </button>
                        <button>
                            <a href="admin.php?view_groups" class="nav-link text-light my-1 sc mx-1">View Groups</a>
                        </button>
                       
                        <button>
                            <a href="admin.php?view_voters" class="nav-link text-light my-1 sc mx-1">List Voters</a>
                        </button>
                        <button>
                            <a href="admin_logout.php" class="nav-link text-light my-1 scs mx-1">Logout</a>
                        </button>
                    </div>
                </div>
                <div class="col-md-10">
                <div class="container my-3">
            <?php
      
  if(isset($_GET['view_groups']))
  {
    $get_groups = "SELECT * from groups order by votes DESC";
    $exe_groups = mysqli_query($con,$get_groups);
    $s_no=1;
    echo "<h1 class='text-center'>All Products</h1>
    <div class='table-responsive'>
    <table class='table table-bordered text-center my-4'>
         <thead>
                         <tr>
                             <th>ID</th>
                             <th>Group Name</th>                        
                             <th>Image</th>
                             <th>Votes</th>
                             
                         </tr>
                     </thead> ";
 
    while($row=mysqli_fetch_assoc($exe_groups))
    {
        echo "<tr class='text-capitalize'>
        <td>$s_no</td>
        <td>{$row['group_name']}</td>
        <td><img src='groups/{$row['group_image']}' class='table_image'></td>
        <td>{$row['votes']}</td>
        
        </tr>";
        $s_no++;
    }

  }
 
  if(isset($_GET['view_voters']))
  {
    $get_voters = "SELECT * from voters";
    $exe_voters = mysqli_query($con,$get_voters);
    $sno=1;
    echo "<h1 class='text-center'>All Voters</h1>
    <div class='table-responsive'>
    <table class='table table-bordered text-center table-hover my-4'>
         <thead>
                         <tr>
                             <th>ID</th>
                             <th>Voter Name</th>                        
                             <th>Age</th>
                             <th>Vote status</th>
                             
                         </tr>
                     </thead> ";
 
    while($rowdata=mysqli_fetch_assoc($exe_voters))
    {
        echo "<tr class='text-capitalize'>
        <td>$sno</td>
        <td>{$rowdata['voter_name']}</td>
        <td>{$rowdata['voter_age']}</td>
        <td>{$rowdata['voting_status']}</td>
        
        </tr>";
        $sno++;
    }

  }


      ?>

        </div>
                </div>
            </div>
        </div>


        <div class="container my-3">
            <?php
      
//       if(isset($_GET['insert_category']))
//       {
//         include "insert_category.php";
//       }
       
//        if(isset($_GET['insert_brands']))
//       {
//         include "insert_brands.php";
//       }
//       if(isset($_GET['view_products']))
//       {
//         include "view_products.php";
//       }
//       if(isset($_GET['edit_products']))
//       {
//         include "edit_products.php";
//       }
//       if(isset($_GET['delete_products']))
//       {
//         include "delete_products.php";
//       }
//       if(isset($_GET['view_categories']))
//       {
//         include "view_categories.php";
//       }
//       if(isset($_GET['view_brands']))
//       {
//         include "view_brands.php";
//       }
//       if(isset($_GET['edit_brand']))
//       {
//         include "edit_brand.php";
//       }
//     if(isset($_GET['edit_cat']))
//     {
//         include "edit_cat.php";
//     }
//     if(isset($_GET['delete_brands']))
//     {
//         include "delete_brand.php";
// }
//     if(isset($_GET['delete_cat']))
//     {
//         include "delete_cat.php";
// }
      ?>
        </div>


        <!-- <div class="bg-info p-4">
            <center>All rights reserved <span>©</span> - Designed by Vikas</center>
        </div> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
        </script>
    </body>

</html>