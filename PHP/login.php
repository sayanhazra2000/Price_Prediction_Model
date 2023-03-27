<?php

include '../PHP/config.php';
session_start();

if (isset($_POST['submit'])) {

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if (mysqli_num_rows($select) > 0) {
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:../PHP/profile.php');
   } else {
      $message[] = 'Incorrect Email or Password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../CSS/login.css">
   <link rel="stylesheet" href="../CSS/nav.css">
   <link rel="stylesheet" href="../CSS/footer.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
   <link rel="icon" href="../IMAGES/logo.png">
</head>

<body>
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
   <center>
      <div class="form-container">

         <form action="" method="post" enctype="multipart/form-data">
            <h3>Login Here</h3>
            <?php
            if (isset($message)) {
               foreach ($message as $message) {
                  echo '<div class="message">' . $message . '</div>';
               }
            }
            ?>
            <input type="email" name="email" placeholder="Enter Email" class="box" required>
            <input type="password" name="password" placeholder="Enter Password" class="box" required>
            <!-- <input type="submit" name="submit" value="Login Now" class="btn"> -->
            <button type="submit" name="submit"><span></span>Login Now</button>
            <p>Don't have an Account? <a href="../PHP/register.php">Regiser Now</a></p>
         </form>

      </div>
   </center>
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