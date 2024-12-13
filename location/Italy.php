<?php
include('session_user_name.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Italy Travel Details</title>
  <?php
    include('../re_use/links.php');
    ?>

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
  <header class="head_img_italy">
    <h1>Explore Italy</h1>
  </header>

  <div class="containerX">
    <!-- Info Section -->
    <section class="info">
      <h2>About Italy</h2>
      <p>Italy is a land of wonders, offering breathtaking architecture, historic landmarks, and a rich cultural
        heritage.
        Marvel at the grandeur of the Colosseum, the Vatican City, and Florence's artistic treasures. Relax in the
        picturesque
        Tuscany countryside or enjoy the sparkling waters of the Amalfi Coast. Italy’s world-famous cuisine and
        charming
        cities like Rome and Venice make it a must-visit destination.</p>
    </section>

    <!-- Map Section -->
    <section class="map">
      <h2>Location</h2>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6219172.463241799!2d11.255813135781184!3d41.87193885610701!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132b7b82c18d7957%3A0xa041d95722f3aa0!2sItaly!5e0!3m2!1sen!2s!4v1699464039356!5m2!1sen!2s"
        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>

    <!-- Price Section -->
    <section class="price">
      <h2>Price</h2>
      <?php
      $price = 65000;
      ?>
      <p>Price per person: <strong>65K</strong></p>
    </section>

    <!-- Activities Section -->
    <section class="activity">
      <h2>Activities</h2>
      <p>Italy offers a diverse range of activities to suit every traveler. Here are some highlights:</p>
      <ul>
        <li>Explore the ancient ruins of Rome, including the Colosseum and Roman Forum.</li>
        <li>Admire Renaissance art at the Uffizi Gallery in Florence.</li>
        <li>Sail along the canals of Venice on a gondola ride.</li>
        <li>Relax and sip wine in the vineyards of Tuscany.</li>
        <li>Visit the picturesque villages of the Amalfi Coast.</li>
        <li>Indulge in authentic Italian pizza, pasta, and gelato.</li>
      </ul>
    </section>

    <!-- Booking Button -->
    <div class="book-now">
      <button>
        <a href="checkout.php?price=<?php echo $price?>">Book Now</a>
      </button>
    </div>
  </div>
  <!-- Footer Start -->

  <?php
  include('../re_use/footer.php');
  ?>
  <!-- Footer End -->
</body>

</html>