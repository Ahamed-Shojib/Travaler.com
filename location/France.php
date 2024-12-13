<?php
include('session_user_name.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>France Travel Details</title>
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
    <header class="head_img_france">
        <h1>Explore France</h1>
    </header>

    <div class="containerX">
        <!-- Info Section -->
        <section class="info">
            <h2>About France</h2>
            <p>France is a country of romance, culture, and history. Known for its iconic landmarks like the Eiffel
                Tower, Louvre Museum, and Notre Dame Cathedral, it offers unparalleled beauty and sophistication.
                From the vineyards of Bordeaux to the sun-kissed beaches of the French Riviera, France has something for
                every traveler. Indulge in world-class cuisine, explore charming villages, and immerse yourself in the
                art and history of Paris, the City of Light.</p>
        </section>

        <!-- Map Section -->
        <section class="map">
            <h2>Location</h2>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4192278.8139893395!2d1.8883338712837984!3d46.60335411373512!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66d703bd6e33d%3A0x490e7d352b6b1a0!2sFrance!5e0!3m2!1sen!2s!4v1699464039356!5m2!1sen!2s"
                allowfullscreen="" loading="lazy">
            </iframe>
        </section>

        <!-- Price Section -->
        <section class="price">
            <h2>Price</h2>
            <?php
            $price = 50000;
            ?>
            <p>Price per person: <strong>50K</strong></p>
        </section>

        <!-- Activities Section -->
        <section class="activity">
            <h2>Activities</h2>
            <p>France offers a wide variety of activities to suit all interests. Here are some must-do experiences:</p>
            <ul>
                <li>Climb the Eiffel Tower and enjoy breathtaking views of Paris.</li>
                <li>Explore the art and history at the Louvre Museum.</li>
                <li>Stroll along the Champs-Élysées and visit the Arc de Triomphe.</li>
                <li>Relax on the beaches of the French Riviera.</li>
                <li>Savor exquisite wines in the Bordeaux and Burgundy regions.</li>
                <li>Take a scenic cruise along the Seine River.</li>
            </ul>
        </section>

        <!-- Booking Button -->
        <div class="book-now">
            <button><a href="checkout.php?price=<?php echo $price ?>">Book Now</a></button>
        </div>
    </div>
    <!-- Footer Start -->
    <?php
    include('../re_use/footer.php');
    ?>
    <!-- Footer End -->
</body>

</html>