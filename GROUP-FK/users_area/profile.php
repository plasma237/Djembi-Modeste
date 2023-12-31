<!--connetion to file-->
<?php  
include('../include/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FK TECH-USER PROFILE</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
    crossorigin="anonymous">
    <!--bootstrap font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--css file-->
    <link rel="stylesheet" href="../style.css">

</head>
<style>
    body{
        overflow-x:hidden;
    }
    .profile_img{
    width: 90%;
    margin: auto;
    display: block;
    /* height: 100%; */
    object-fit: contain;
}
    .edit_img{
        width: 100px;
        height: 100px;
        object-fit: contain;
    }
</style>
<body>
<!--navbar-->
<div class="container-fluid p-0">
    <!--first child-->
  <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid">
             <img src="../background/LOGO2.jpg" alt="" class="logo">
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
               </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent1">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../display_all.php">Shop</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="profile.php">My Account</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../contact.php">Contact</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../cart.php"><i class="fa fa-shopping-cart"
             aria-hidden="true"></i><sup><?php cart_item(); ?></sup></a></li>
            <li class="nav-item">
            <a class="nav-link" href="#">Total price: <?php total_cart_price(); ?>/-</a>
            </li>
             </ul>
          <form class="d-flex" action="../search_product.php" method="get">
           <input class="form-control me-2" type="search" placeholder="search" 
            aria-label="search" name="search_data">
           <input type="submit" value="search" class="btn btn-outline-success"
            name="search_data_product">
          </form>
      </div>
    </div>
  </nav>
</div>
<!-- calling cart function -->
<?php  
cart();
?>

<!--second child-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
        <?php
        if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'>
            <a href='#' class='nav-link'>Welcome Guest</a>
             </li>";
             }else{
                 echo "<li class='nav-item'>
                 <a href='#' class='nav-link'>Welcome ".$_SESSION['username']."</a>
             </li>";
             } 
        if(!isset($_SESSION['username'])){
       echo "<li class='nav-item'>
            <a href='./users_area/user_login.php' class='nav-link'>Login</a>
        </li>";
        }else{
            echo "<li class='nav-item'>
            <a href='../users_area/user_logout.php' class='nav-link'>Logout</a>
        </li>";
        }
        ?>
    </ul>
</nav>

<!--third child-->
<div class="bg-light">
    <h3 class="text-center">Featured Products</h3>
    <p class="text-center">Summer Collection New Modern Design</p>
</div>

<!-- fourth child -->
<div class="row">
    <div class="col-md-2">
        <ul class="navbar-nav bg-secondary text-center" style="height:100vh">
        <li class="nav-item bg-info">
            <a class="nav-link text-light" href="#"><h4>Your Profile</h4></a>
            </li>
            <?php  
            $username=$_SESSION['username'];
            $user_image= "Select * from `user_table` where username='$username'";
            $user_image=mysqli_query($con,$user_image);
            $row_image=mysqli_fetch_array($user_image);
            $user_image=$row_image['user_image'];
            echo "<li class='nav-item'>
            <img src='./user_images/$user_image' alt='' class='profile_img my-4'>
            </li>";
            
            ?>
            
            <li class="nav-item">
            <a class="nav-link text-light" href="profile.php">Pending Orders</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-light" href="profile.php?edit_account">Edit Account</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-light" href="profile.php?my_order">My Orders</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-light" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
    <div class="col-md-10 text-center">
        <?php get_user_order_details(); 
        if(isset($_GET['edit_account'])){
            include('edit_account.php');
        }
        if(isset($_GET['my_order'])){
            include('user_order.php');
        }
        if(isset($_GET['delete_account'])){
            include('delete_account.php');
        }

        ?>
    </div>
</div>

<!--last child-->
        <!-- include footer -->
        <?php  
        include('../include/footer.php');
        ?>
        </div>



    <!--bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
     crossorigin="anonymous"></script>
</body>
</html>