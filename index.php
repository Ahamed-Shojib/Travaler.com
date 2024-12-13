<?php
session_start();
$user_first_name = ''; // Default value
if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
  // Fetch user first name from database based on user_id
  $conn = new mysqli('localhost', 'root', '', 'travel');
  $result = $conn->query("SELECT first_name FROM users WHERE id='$user_id'");
  $user = $result->fetch_assoc();
  if ($user) {
    $user_first_name = $user['first_name'];
  }
  $conn->close();
}
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Travel Website</title>
  <!-- Favicon -->
  <link rel="icon" href="images/Tour-Logo.png">
  <link rel="stylesheet" href="css/style.css">

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
  <!-- Google Fonts -->
</head>

<body>

  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg" id="navbar">
    <div class="container" id="nav_bar">
      <a class="navbar-brand" href="index.php" id="logo"><span>T</span>ravaler</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span><i class="fa-solid fa-bars"></i></span>
      </button>
      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#book">Book</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#packages">Packages</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#services">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#gallary">Gallary</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>
          <?php if(!empty($user_first_name)): ?>
          <li class="nav-item">
            <a class="nav-link" href="User/view_profile.php">Profile</a>
          </li>
          <?php endif; ?>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="text" placeholder="Search">
          <button class="btn btn-outline-warning" type="button">Search</button>
        </form>
        <?php if(!empty($user_first_name)): ?>
        <span class="navbar-text mx-2">Hi, <?php echo $user_first_name; ?></span>
        <a class="btn btn-outline-danger mx-2 my-2" href="User/logout.php">Logout</a>
        <?php else: ?>
        <a class="btn btn-outline-danger mx-2 my-2" href="User/user_login.php">Log In</a>
        <?php endif; ?>
      </div>
    </div>
  </nav>
  <!-- Navbar End -->

  <!-- Home Section Start -->
  <div class="home" id="home">
    <div class="content">
      <h5>Welcome To Travaler</h5>
      <h1>Visit <span class="changecontent"></span></h1>
      <p>We're committed to making your travel dreams a reality and ensuring
        <br>
        that every trip you take is filled with joy and adventure. <br>If you
        have
        any questions or need assistance, our support team is always here to
        help.
      </p>
      <a class="btn btn-outline-warning" href="#book">Book Place</a>
    </div>
  </div>
  <!-- Home Section End -->

  <!-- Section Book Start -->
  <section class="book" id="book">
    <div class="container">

      <div class="main-text">
        <h1><span>B</span>ooking</h1>
      </div>

      <div class="row">

        <div class="col-md-6 py-3 py-md-0">
          <div class="mx-auto">
            <img src="./images/book_img.jpg" height="405px" width="95%" alt>
          </div>
        </div>

        <div class="col-md-6 py-3 py-md-0">
          <div class="book_area">
            <form action="Cart.php">
              <label class="my-2" for="location">Select a Destination:</label>
              <select class="form-select" id="location" name="location" required>
                <option value="United Kingdom">Cox's Bazar</option>
                <option value="France">Saintmartin</option>
                <option value="Pakistan">Jaflong</option>
                <option value="Italy">Shrimongol</option>
                <option value="United States">Kolkata</option>
                <option value="United States">Paris</option>
                <option value="United States">Dubai</option>
              </select>
              <label class="my-2" for="amount">Select Booking Amount:</label>
              <input type="number" class="form-control" id="amount" value="1" required>
              <label class="my-2" for="date">Select Booking Date:</label>
              <input type="date" class="form-control" placeholder="Arrivals" required><br>

              <?php
              if (isset($_SESSION['user_id'])) {
                echo '<input type="submit" value="Book Now" class="submit btn btn-outline-warning" required>';
              } else {
                echo '<a class="btn btn-outline-danger mx-2 my-2" href="User/user_login.php">Log In</a>';
              }
              ?>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- Section Book End -->

  <?php require('./location/bangladesh.php'); ?>
  <!-- Section Packages Start -->
  <section class="packages" id="packages">
    <div class="container">

      <div class="main-txt">
        <h1><span>P</span>ackages</h1>
      </div>

      <div class="row" style="margin-top: 30px;">

        <div class="col-md-4 py-3 py-md-0">

          <div class="card">
            <img src="./images/uk.png" alt>
            <div class="card-body">
              <h3>United Kingdom</h3>
              <p>The UK offers historic landmarks like the Tower of London,
                scenic Lake District, vibrant Edinburgh festivals, mysterious
                Stonehenge, charming Cotswolds, and dynamic cities like London
                and Cardiff.</p>
              <div class="star">
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
              </div>
              <h6>Price: <strong>70K</strong></h6>
              <a class="btn btn-outline-warning" href="#book">Book Now</a>
              <a class="btn btn-outline-success" href="location/UK.php">Visit Now</a>
            </div>
          </div>

        </div>
        <div class="col-md-4 py-3 py-md-0">

          <div class="card">
            <img src="./images/france.png" alt>
            <div class="card-body">
              <h3>France</h3>
              <p>France offers iconic landmarks like the Eiffel Tower, rich
                history at the Louvre, picturesque Provence, stunning Riviera,
                world-class wine regions,Cardiff's medieval castle, the
                charming Cotswolds, and exquisite cuisine.</p>
              <div class="star">
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star "></i>
                <i class="fa-solid fa-star "></i>
              </div>
              <h6>Price: <strong>65K</strong></h6>
              <a class="btn btn-outline-warning" href="#book">Book Now</a>
              <a class="btn btn-outline-success" href="location/France.php">Visit Now</a>
            </div>
          </div>

        </div>
        <div class="col-md-4 py-3 py-md-0">

          <div class="card">
            <img src="./images/pakistan.png" alt>
            <div class="card-body">
              <h3>Pakistan</h3>
              <p>Pakistan features diverse landscapes including the majestic
                Himalayas, ancient Mohenjo-Daro ruins, bustling bazaars of
                Lahore, serene Hunza Valley, and cultural richness in Karachi,
                offering a blend of history, nature, and tradition.</p>
              <div class="star">
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star "></i>
              </div>
              <h6>Price: <strong>50K</strong></h6>
              <a class="btn btn-outline-warning" href="#book">Book Now</a>
              <a class="btn btn-outline-success" href="location/Pakistan.php">Visit Now</a>
            </div>
          </div>

        </div>

      </div>

      <div class="row" style="margin-top: 30px;">

        <div class="col-md-4 py-3 py-md-0">

          <div class="card">
            <img src="./images/italy.png" alt>
            <div class="card-body">
              <h3>Italy</h3>
              <p>Italy entices with iconic landmarks such as the Colosseum and
                Vatican City, picturesque landscapes like Tuscany and the
                Amalfi Coast, world-renowned cuisine, and rich cultural
                heritage in cities like Rome, Florence, and Venice.</p>
              <div class="star">
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star "></i>
                <i class="fa-solid fa-star "></i>
                <i class="fa-solid fa-star "></i>
              </div>
              <h6>Price: <strong>65K</strong></h6>
              <a class="btn btn-outline-warning" href="#book">Book Now</a>
              <a class="btn btn-outline-success" href="location/Italy.php">Visit Now</a>
            </div>
          </div>

        </div>
        <div class="col-md-4 py-3 py-md-0">

          <div class="card">
            <img src="./images/india.png" alt>
            <div class="card-body">
              <h3>India</h3>
              <p>India captivates with its vibrant culture, majestic landmarks
                like the Taj Mahal and Red Fort, diverse landscapes from
                Himalayan peaks to Kerala backwaters, spiritual centers like
                Varanasi, and flavorsome cuisine rich in spices and
                diversity.</p>
              <div class="star">
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star "></i>
                <i class="fa-solid fa-star "></i>
              </div>
              <h6>Price: <strong>45K</strong></h6>
              <a class="btn btn-outline-warning" href="#book">Book Now</a>
              <a class="btn btn-outline-success" href="location/India.php">Visit Now</a>
            </div>
          </div>

        </div>
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <img src="./images/us.png" alt>
            <div class="card-body">
              <h3>United States</h3>
              <p>The USA offers diverse landscapes from the Grand Canyon to
                New York City skyscrapers, iconic landmarks like the Statue of
                Liberty, cultural hubs in Los Angeles and Chicago, and natural
                wonders such as Yellowstone National Park.</p>
              <div class="star">
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star "></i>
              </div>
              <h6>Price: <strong>80K</strong></h6>
              <a class="btn btn-outline-warning" href="#book">Book Now</a>
              <a class="btn btn-outline-success" href="location/USA.php">Visit Now</a>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- Section Packages End -->

  <!-- Section Services Start -->
  <section class="services" id="services">
    <div class="container">

      <div class="main-txt">
        <h1><span>S</span>ervices</h1>
      </div>

      <div class="row" style="margin-top: 30px;">

        <div class="col-md-4 py-3 py-md-0">
          <a style="text-decoration: none;color:black" href="#">
            <div class="card">
              <i class="fas fa-hotel"></i>
              <div class="card-body">
                <h3>Affordable Hotel</h3>
                <p>Affordable hotels provide budget-friendly accommodation
                  options with essential amenities, catering to travelers.
                </p>
              </div>
            </div>
          </a>

        </div>
        <div class="col-md-4 py-3 py-md-0">
          <a style="text-decoration: none;color:black" href="#">
            <div class="card">
              <i class="fas fa-utensils"></i>
              <div class="card-body">
                <h3>Food & Drinks</h3>
                <p>Food and drink encompass a vast array of culinary delights,
                  from international cuisines to local specialties and
                  satisfying dining experiences.</p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4 py-3 py-md-0">
          <a style="text-decoration: none;color:black" href="#">
            <div class="card">
              <i class="fas fa-bullhorn"></i>
              <div class="card-body">
                <h3>Safty Guide</h3>
                <p>Safety guides provide essential information for avoiding
                  hazards and responding effectively to
                  emergencies well-being in various
                  situations.</p>
              </div>
            </div>
          </a>
        </div>

      </div>

      <div class="row" style="margin-top: 30px;">

        <div class="col-md-4 py-3 py-md-0">
          <a style="text-decoration: none;color:black" href="#">
            <div class="card">
              <i class="fas fa-globe-asia"></i>
              <div class="card-body">
                <h3>Around The World</h3>
                <p>Around the world, diverse cultures, landscapes and people
                  offer interconnectedness on our
                  shared planet.</p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4 py-3 py-md-0">
          <a style="text-decoration: none;color:black" href="#">
            <div class="card">
              <i class="fas fa-plane"></i>
              <div class="card-body">
                <h3>Fastest Travel</h3>
                <p>The fastest mode of travel, air travel, enables rapid
                  transportation across vast distances.</p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4 py-3 py-md-0">
          <a style="text-decoration: none;color:black" href="Activity/adventures.php">
            <div class="card">
              <i class="fas fa-hiking"></i>
              <div class="card-body">
                <h3>Adventures</h3>
                <p>Adventures encompass thrilling experiences, from exploring
                  rugged, igniting curiosity.</p>
              </div>
            </div>
          </a>
        </div>

      </div>

    </div>
  </section>
  <!-- Section Services End -->

  <!-- Section Gallary Start -->
  <section class="gallary" id="gallary">
    <div class="container">

      <div class="main-txt">
        <h1><span>G</span>allary</h1>
      </div>

      <div class="row" style="margin-top: 30px;">
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <img src="./images/img_1.gif" alt height="230px">
          </div>
        </div>
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <img src="./images/img_3.jpg" alt height="230px">
          </div>
        </div>
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <img src="./images/img_4.jpg" alt height="230px">
          </div>
        </div>
      </div>

      <div class="row" style="margin-top: 30px;">
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <img src="./images/g1.png" alt height="230px">
          </div>
        </div>
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <img src="./images/g2.png" alt height="230px">
          </div>
        </div>
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <img src="./images/g3.png" alt height="230px">
          </div>
        </div>
      </div>

      <div class="row" style="margin-top: 30px;">
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <img src="./images/g4.png" alt height="230px">
          </div>
        </div>
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <img src="./images/g5.png" alt height="230px">
          </div>
        </div>
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <img src="./images/g6.png" alt height="230px">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section Gallary End -->

  <!-- About Start -->
  <section class="about" id="about">
    <div class="container">

      <div class="main-txt">
        <h1>About <span>Us</span></h1>
      </div>

      <div class="row" style="margin-top: 50px;">

        <div class="col-md-6 py-3 py-md-0">
          <div class="card">
            <img src="./images/about-us.jpg" height="380px">
          </div>
        </div>

        <div class="col-md-6 py-3 py-md-0">
          <h2>How Travel Agency Work</h2>
          <p style="text-align: justify;">At <span class="text-warning h4">Travaler</span>, we
            are committed to
            promoting
            sustainable travel.
            We provide resources and tips on how to minimize your
            environmental impact, support local communities, and travel
            responsibly. Our goal is to ensure that the places we love to
            visit remain beautiful and vibrant for future generations.</p>
          <p style="text-align: justify;">Embark on your next adventure with
            Wanderlust and explore the
            world like never before. Sign up today to access exclusive
            content, special offers, and a community of passionate travelers
            ready to share the journey with you. Your adventure starts
            here!</p>
          <a class="about-btn btn btn-outline-warning">Read
            More</a>
        </div>

      </div>

    </div>
  </section>
  <!-- About End -->

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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>

</body>

</html>