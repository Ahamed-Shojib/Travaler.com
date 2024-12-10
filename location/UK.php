<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UK Travel Details</title>
   <!-- Favicon -->
   <link rel="icon" href="images/Tour-Logo.png">

<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/StyleX.css">

<!-- Bootstrap Link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- Bootstrap Link -->

<!-- Font Awesome Cdn -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
<!-- Font Awesome Cdn -->

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Rubik+Wet+Paint&display=swap" rel="stylesheet">
<!-- Google Fonts -->

</head>
<body>
<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg" id="navbar">
    <div class="container" id="nav_bar">
        <a class="navbar-brand" href="../index.php" id="logo"><span>T</span>ravaler</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span><i class="fa-solid fa-bars"></i></span>
        </button>
    </div>
    <div style="text-align: right;" class="collapse navbar-collapse" id="mynavbar">
        <a class="btn btn-outline-danger mx-2 my-2" href="user_login.php">Log In</a>
    </div>
</nav>
<!-- Navbar End -->
  <header class="head_img_uk">
    <h1>Explore United Kingdom</h1>
  </header>
  
  <div class="containerX">
    <!-- Info Section -->
    <section class="info">
      <h2>About United Kingdom</h2>
      <p>
        The United Kingdom is a country steeped in history and culture, blending iconic landmarks, scenic countryside, and vibrant modern cities. 
        From the grandeur of Buckingham Palace to the mysteries of Stonehenge, the UK offers endless opportunities to explore. 
        Discover charming English villages, rolling Scottish Highlands, and the buzzing streets of London. With world-class museums, castles, and theaters, the UK is a must-visit destination.
      </p>
    </section>

    <!-- Map Section -->
    <section class="map">
      <h2>Location</h2>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19797537.72522052!2d-25.355979487193785!3d52.7197111206687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited%20Kingdom!5e0!3m2!1sen!2sbd!4v1733070941341!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>

    <!-- Price Section -->
    <section class="price">
      <h2>Price</h2>
      <?php
      $price = 70000;
      ?>
      <p>Price per person: <strong>70K</strong></p>
    </section>

    <!-- Activities Section -->
    <section class="activity">
      <h2>Activities</h2>
      <p>The United Kingdom offers a wide range of activities for all types of travelers. Here are some highlights:</p>
      <ul>
        <li>Visit iconic landmarks such as the Tower of London and Westminster Abbey.</li>
        <li>Explore the cultural treasures of Edinburgh Castle and the Scottish Highlands.</li>
        <li>Walk through the historic streets of Oxford and Cambridge.</li>
        <li>Admire the beauty of Lake District National Park.</li>
        <li>Experience the vibrant nightlife and world-class theater in London’s West End.</li>
        <li>Take a day trip to Windsor Castle or the mystical Stonehenge.</li>
      </ul>
    </section>

    <!-- Booking Button -->
    <div class="book-now">
      <button><a href="checkout.php?price=<?php echo $price?>">Book Now</a></button>
    </div>
  </div>
   <!-- Footer Start -->
   <footer id="footer">
    <h1><span>T</span>ravaler</h1>
    <p>Stay up-to-date with the latest travel news, trends, and tips through
      our blog and newsletter.</p>
    <div class="social-links">
      <a href="https://www.facebook.com/ahamedshojib69"><i class="fa-brands fa-facebook"></i></a>
      <a
        href="https://www.linkedin.com/in/mehedi-hasan-shojib-645699249?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><i
          class="fa-brands fa-linkedin"></i></a>
      <a href="https://github.com/Ahamed-Shojib"><i class="fa-brands fa-github"></i></a>
      <a href="https://www.youtube.com/channel/UCnqSrFTK2JLRhHWlPkVTTkw"><i class="fa-brands fa-youtube"></i></a>
    </div>
    <!-- <div class="credit">
        <p>Designed By <a href="https://github.com/Ahamed-Shojib">VallyNore
            Coding</a></p>
      </div> -->
    <div class="copyright">
      <p><sup>&copy;</sup> 2024 Copyright || All Rights Reserved</p>
    </div>
  </footer>
  <!-- Footer End -->
</body>
</html>
