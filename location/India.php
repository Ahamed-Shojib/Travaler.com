<?php
include('session_user_name.php');
// Start the session to manage the cart
// Check if the cart is initialized
if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
}

// Add to cart functionality
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
  $item = [
    'name' => 'India Tour',
    'price' => $_POST['price'],
    'quantity' => 1 // Default quantity is 1 for now
  ];

  // Add the item to the cart
  $_SESSION['cart'][] = $item;
  $add_message = "Cart Added";
  echo $add_message;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>India Travel Details</title>
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

  <header class="head_img_india">
    <h1>Explore India</h1>
  </header>

  <div class="containerX">
    <!-- Info Section -->
    <section class="info">
      <h2>About India</h2>
      <p>India captivates with its vibrant culture, spiritual depth, and breathtaking landscapes. Explore majestic
        landmarks such as the Taj Mahal, Red Fort, and Jaipur's palaces...</p>
    </section>

    <!-- Map Section -->
    <section class="map">
      <h2>Location</h2>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30767694.118830837!2d60.92944751922805!3d19.720199483373122!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2sbd!4v1733083452437!5m2!1sen!2sbd"
        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>

    <!-- Price Section -->
    <section class="price">
      <h2>Price</h2>
      <p>Price per person: <strong>45K</strong></p>
    </section>

    <!-- Activities Section -->
    <section class="activity">
      <h2>Activities</h2>
      <p>India offers an incredible variety of experiences. Here are some must-try activities:</p>
      <ul>
        <li>Marvel at the grandeur of the Taj Mahal in Agra.</li>
        <li>Take a spiritual journey in Varanasi along the Ganges River.</li>
        <li>Explore the palaces and forts of Jaipur, Udaipur, and Jodhpur.</li>
      </ul>
    </section>

    <!-- Add to Cart and Booking Button -->
    <form method="POST">
      <input type="hidden" name="price" value="45000">
      <div class="book-now">
        <button id="addToCartButton" type="submit" name="add_to_cart" class="btn btn-primary">Add to Cart</button>
        <button class="btn btn-outline-success"><a style="text-decoration: none;color:aliceblue;" href="cart.php">View
            Cart</a></button>
      </div>
    </form>
  </div>
  <!-- Initially hidden message <div id="cart_msg" class="alert alert-success" role="alert" style="display: none;">
    echo $add_message; ?>
  </div>

  <script>
    document.getElementById('addToCartButton').onclick = function () {
      // Show the cart message
      document.getElementById('cart_msg').style.display = 'block';

      // Optionally, you can also submit the form here if needed
      // document.querySelector('form').submit();
    };
  </script> -->

  <!-- View Cart Button
              <div class="view-cart">
                <a href="cart.php" class="btn btn-lg btn-success">View Cart</a>
              </div>
            </div> -->
  <!-- Footer Start -->
  <?php
    include('../re_use/footer.php');
    ?>
  <!-- Footer End -->

</body>

</html>