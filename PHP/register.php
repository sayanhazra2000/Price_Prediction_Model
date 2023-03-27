<?php

include '../PHP/config.php';

if (isset($_POST['submit'])) {

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/' . $image;

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if (mysqli_num_rows($select) > 0) {
      $message[] = 'User Already Exist';
   } else {
      if ($pass != $cpass) {
         $message[] = 'Confirm Password Not Matched!';
      } elseif ($image_size > 2000000) {
         $message[] = 'Image size is too Large!';
      } else {
         $insert = mysqli_query($conn, "INSERT INTO `user_form`(name, email, password, image) VALUES('$name', '$email', '$pass', '$image')") or die('query failed');

         if ($insert) {
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'Registered Successfully!';
            header('location:../PHP/login.php');
         } else {
            $message[] = 'Registeration Failed!';
         }
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../CSS/register.css">
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
            <h3>Register Here</h3>
            <?php
            if (isset($message)) {
               foreach ($message as $message) {
                  echo '<div class="message">' . $message . '</div>';
               }
            }
            ?>
            <input type="text" name="name" placeholder="Enter Username" class="box" required>
            <input type="email" name="email" placeholder="Enter Email" class="box" required>
            <input type="password" name="password" placeholder="Enter Password" class="box" required>
            <input type="password" name="cpassword" placeholder="Confirm Password" class="box" required>
            <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
            <!-- <input type="submit" name="submit" value="Register Now" class="btn"> -->
            <button type="submit" name="submit"><span></span>Sign up</button>
            <p>Already have an Account? <a href="../PHP/login.php" class="p">Login Now</a></p>
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