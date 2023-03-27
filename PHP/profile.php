<?php

include '../PHP/config.php';
session_start();
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:../PHP/login.php');
}
;

if (isset($_GET['logout'])) {
   unset($user_id);
   session_destroy();
   header('location:../PHP/login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../CSS/profile.css">
   <link rel="stylesheet" href="../CSS/nav.css">
   <link rel="stylesheet" href="../CSS/footer.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
   <link rel="icon" href="../IMAGES/logo.png">
</head>

<body class="body">



   <nav>
      <section class="bgImage">
         <div>
            <!-- <link rel="stylesheet" href="nav.css"> -->
            <div class="navbar">
               <video src="../IMAGES/logo.webm" controls loop autoplay class="logo"></video>
               <!-- <img src="logo.png" class="logo"> -->
               <ul>
                  <li><i style="font-size: 15px;" id="navIcon" class="fa-sharp fa-solid fa-house"></i><a
                        href="../PHP/Home.php">Home</a>
                  </li>
                  <li><i style="font-size: 15px;" id="navIcon" class="fa-sharp fa-solid fa-location-dot"></i><a
                        href="../PHP/location.php">Location</a></li>
                  <li><i style="font-size: 15px;" id="navIcon" class="fa-solid fa-user"></i><a
                        href="../PHP/profile.php">Profile</a>
                  </li>
                  <li><i style="font-size: 15px;" id="navIcon" class="fa-solid fa-address-card"></i><a
                        href="../PHP/About_us.php">About us</a></li>
                  <!-- <li><a href="#">Contact Us</a></li> -->
               </ul>
            </div>
   </nav>
   <div class="container">
      <div class="profile">
         <?php
         $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
         if (mysqli_num_rows($select) > 0) {
            $fetch = mysqli_fetch_assoc($select);
         }
         if ($fetch['image'] == '') {
            echo '<img src="../IMAGES/avatar.png">';
         } else {
            echo '<img src="../uploaded_img/' . $fetch['image'] . '">';
         }
         ?>
         <h2>
            <?php echo $fetch['name']; ?>
         </h2>
         <a href="../client/app.html" class="btn">Predict Home Price</a>
         <a href="../PHP/update_profile.php" class="btn">Update Profile</a>
         <!-- <a href="login.php?logout=<?php echo $user_id; ?>" class="btn">Logout</a> -->
         <a href="../PHP/logout.php?logout=<?php echo $user_id; ?>" class="btn">Logout</a>
         <!-- <a href="logout.php" tite="Logout"> -->
         <p>New <a href="../PHP/login.php">Login</a> or <a href="../PHP/register.php">Register</a></p>
      </div>

   </div>

   <footer>
      <div class="box">
         <ul>
            <!-- <img src="logo.png" class="logo"> -->
            <video src="../IMAGES/logo.webm" controls loop autoplay class="logo"></video>
            <li>
               <i style="font-size: 20px
          ;" class="fa-brands fa-google"></i>
               <i style="font-size: 20px
          ;" class="fa-brands fa-facebook"></i>
               <i style="font-size: 20px
          ;" class="fa-brands fa-twitter"></i>
            </li>
            <li>
               Copyright @2023 all right reserved by PREDICTJET
            </li>
         </ul>
      </div>
      <!-- <p>Author: Sayan Hazra</p>
    <p><a href="sayanhazra1222@gmail.com">hege@example.com</a></p> -->
   </footer>
</body>

</html>