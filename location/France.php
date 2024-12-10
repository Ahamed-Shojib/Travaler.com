<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>France Travel Details</title>
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
    <header class="head_img_france">
        <h1>Explore France</h1>
    </header>

    <div class="containerX">
        <!-- Info Section -->
        <section class="info">
            <h2>About France</h2>
            <p>France is a country of romance, culture, and history. Known for its iconic landmarks like the Eiffel Tower, Louvre Museum, and Notre Dame Cathedral, it offers unparalleled beauty and sophistication.
                From the vineyards of Bordeaux to the sun-kissed beaches of the French Riviera, France has something for every traveler. Indulge in world-class cuisine, explore charming villages, and immerse yourself in the art and history of Paris, the City of Light.</p>
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