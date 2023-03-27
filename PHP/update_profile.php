<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if (isset($_POST['update_profile'])) {

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

   mysqli_query($conn, "UPDATE `user_form` SET name = '$update_name', email = '$update_email' WHERE id = '$user_id'") or die('query failed');

   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
   $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

   if (!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)) {
      if ($update_pass != $old_pass) {
         $message[] = 'Old Password not Matched!';
      } elseif ($new_pass != $confirm_pass) {
         $message[] = 'Confirm Password not Matched!';
      } else {
         mysqli_query($conn, "UPDATE `user_form` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
         $message[] = 'password updated successfully!';
      }
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/' . $update_image;

   if (!empty($update_image)) {
      if ($update_image_size > 2000000) {
         $message[] = 'Image is too Large';
      } else {
         $image_update_query = mysqli_query($conn, "UPDATE `user_form` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
         if ($image_update_query) {
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'Image Updated Succssfully!';
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
   <title>Update Profile</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../CSS/update_profile.css">
   <link rel="stylesheet" href="../CSS/nav.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
   <link rel="icon" href="../IMAGES/logo.png">
   <link rel="stylesheet" href="../CSS/footer.css">
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
      <div class="update-profile">

         <?php
         $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
         if (mysqli_num_rows($select) > 0) {
            $fetch = mysqli_fetch_assoc($select);
         }
         ?>

         <form action="" method="post" enctype="multipart/form-data">
            <?php
            if ($fetch['image'] == '') {
               echo '<img src="../IMAGES/avatar.png">';
            } else {
               echo '<img src="../uploaded_img/' . $fetch['image'] . '">';
            }
            if (isset($message)) {
               foreach ($message as $message) {
                  echo '<div class="message">' . $message . '</div>';
               }
            }
            ?>
            <div class="flex">
               <div class="inputBox">
                  <span>Username :</span>
                  <input type="text" placeholder="New User Name" name="update_name"
                     value="<?php echo $fetch['name']; ?>" class="box">
                  <span>Your Email :</span>
                  <input type="email" placeholder="New Email" name="update_email" value="<?php echo $fetch['email']; ?>"
                     class="box">
                  <span>Update Your Pic :</span>
                  <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
               </div>
               <div class="inputBox">
                  <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
                  <span>Old Password :</span>
                  <input type="password" name="update_pass" placeholder="Enter Previous Password" class="box">
                  <span>New Password :</span>
                  <input type="password" name="new_pass" placeholder="Enter New Password" class="box">
                  <span>Confirm Password :</span>
                  <input type="password" name="confirm_pass" placeholder="Confirm New Password" class="box">
               </div>
            </div>
           <center>
              <input type="submit" value="Update Profile" name="update_profile" class="btn" id="bt">
           </center>
            <!-- <a href="profile.php" class="btn">go back</a> -->
            <!-- <a  href="logout.php?logout=<?php echo $user_id; ?>" class="btn">Logout</a> -->
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