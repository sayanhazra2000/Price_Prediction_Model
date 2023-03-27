<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PREDICTJET</title>
  <link rel="stylesheet" href="../CSS/location.css">
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
            <li><i style="font-size: 15px;" id="navIcon" class="fa-solid fa-user"></i><a href="../PHP/profile.php">Profile</a>
            </li>
            <li><i style="font-size: 15px;" id="navIcon" class="fa-solid fa-address-card"></i><a
                href="../PHP/About_us.php">About us</a></li>
            <!-- <li><a href="#">Contact Us</a></li> -->
          </ul>
        </div>
  </nav>
  <div class="cover">
    <h1>Quick search a location</h1>
    <p id="text">we find best result for you..</p>
    <form class="flex-form">
      <!-- <label for="from">
          <i class="ion-location"></i>
        </label> -->
      <input type="search" placeholder="Enter location where you find house?">
      <input type="submit" value="Search">
    </form>
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