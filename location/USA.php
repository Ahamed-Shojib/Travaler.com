<?php
include('session_user_name.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>USA Travel Details</title>
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
      <?php if (!empty($user_first_name)): ?>
      <span class="navbar-text mx-2">Hi, <?php echo $user_first_name; ?></span>
      <a class="btn btn-outline-danger mx-2 my-2" href="../User/logout.php">Logout</a>
      <?php else: ?>
      <a class="btn btn-outline-primary mx-2 my-2" href="../User/user_login.php">Log In</a>
      <?php endif; ?>
    </div>
  </nav>
  <!-- Navbar End -->
  <!-- Header Section -->
  <header class="head_img_USA">
    <h1>Explore USA</h1>
  </header>

  <!-- Main Container -->
  <div class="containerX">
    <!-- Info Section -->
    <section class="info">
      <h2>About USA</h2>
      <p>The United States of America offers a diverse range of attractions, from iconic landmarks like the Statue of
        Liberty and Golden Gate Bridge to natural wonders such as Yellowstone National Park. Explore bustling cities
        like New York, Los Angeles, and Chicago, or take a scenic road trip through the Grand Canyon, Rocky Mountains,
        or along the Pacific Coast. Enjoy world-class museums, vibrant cultural festivals, and incredible cuisine from
        coast to coast.</p>
    </section>

    <!-- Map Section -->
    <section class="map">
      <h2>Location</h2>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31551070.509361878!2d-124.78440762195248!3d37.2757098432076!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5495a0d5c106b49f%3A0xe5bb62d808cd94cb!2sUnited%20States!5e0!3m2!1sen!2s!4v1699467409422!5m2!1sen!2s"
        allowfullscreen loading="lazy">
      </iframe>
    </section>

    <!-- Price Section -->
    <?php
      $price = 80000;
      ?>
    <section class="price">
      <h2>Price</h2>
      <p>Price per person: <strong>80K</strong></p>
    </section>

    <!-- Activities Section -->
    <section class="activity">
      <h2>Activities</h2>
      <p>The USA offers an incredible variety of experiences. Here are some must-try activities:</p>
      <ul>
        <li>Visit the Statue of Liberty in New York and take a ferry ride to Ellis Island.</li>
        <li>Explore the Grand Canyon and its breathtaking viewpoints.</li>
        <li>Drive along the iconic Route 66 or the Pacific Coast Highway.</li>
        <li>Experience the vibrant nightlife of Las Vegas.</li>
        <li>Take a walk through the historic streets of Boston or Charleston.</li>
        <li>Marvel at the natural geysers of Yellowstone National Park.</li>
        <li>Enjoy cultural festivals and museums in Washington D.C.</li>
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