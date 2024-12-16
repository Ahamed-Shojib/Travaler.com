<?php
error_reporting(0);
include('../re_use/session_user_name.php');
include('../re_use/link.php');


$packages = [
    ["name" => "3 Days & 2 Nights","place" => "Ratargul Swamp Forest", "price" => 12000, "image" => "https://www.travelmate.com.bd/wp-content/uploads/2019/07/Ratargul-2.jpg"],
    ["name" => "5 Days & 4 Nights","place" => "Jaflong & Tea Gardens", "price" => 18000, "image" => "https://cdn-gdpal.nitrocdn.com/wYTsNDvTtivyqMQKozkdeShFCCdGExJz/assets/images/optimized/rev-b1c501a/wp-content/uploads/2022/07/1-3-1.jpg"],
    ["name" => "7 Days & 6 Nights", "place" => "Bichanakandi & Lalakhal", "price" => 25000, "image" => "https://dynamic-media-cdn.tripadvisor.com/media/photo-o/10/fd/37/e9/bisnakandi.jpg?w=1200&h=-1&s=1"]
];

$events = [
    ["name" => "Traditional Music Night", "place" => "Sylhet City", "image" => "https://images.stockcake.com/public/b/e/8/be847e71-498a-4e83-9e49-1b6262536ca0_large/festive-music-performance-stockcake.jpg", "type" => "Free"],
    ["name" => "River Cruise", "place" => "Lalakhal", "image" => "https://www.amawaterways.com/Assets/Images/luxury_of_more_17.jpg", "type" => "Paid"],
    ["name" => "Tea Festival", "place" => "Srimangal", "image" => "https://imgstaticcontent.lbb.in/lbbnew/wp-content/uploads/sites/2/2017/01/TeaFestival.jpg", "type" => "Paid"]
];

$hotels = [
    ["name" => "Hotel Grand Sylhet", "place" => "Sylhet City", "image" => "https://cf.bstatic.com/xdata/images/hotel/max1024x768/364031722.jpg?k=8aab6c073cf508a36aebdc48fa0de1dc2391affb3d91f62cea64eb545bff58ff&o=&hp=1", "description" => "A luxury stay with world-class amenities near Sylhet City.", "map" => "https://maps.app.goo.gl/VyRxoZzixJqAHQ7Z8"],
    ["name" => "Nazimgarh Resort", "place" => "Srimangal", "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQw9Cllmq4QAF9R0vjChfJuMI8gPywIx_sylw&s", "description" => "Surrounded by greenery and tea gardens, a perfect getaway.", "map" => "https://maps.app.goo.gl/P1Tj7gbTzfT2xd839"],
    ["name" => "Rose View Hotel", "place" => "Sylhet City", "image" => "https://cf.bstatic.com/xdata/images/hotel/max1024x768/41346736.jpg?k=4e2a3f911d13387c84812ca1ebf1ead6208935d44790ea6d5670a9ec9ffee967&o=&hp=1", "description" => "Experience luxury and comfort at Rose View Hotel.", "map" => "https://maps.app.goo.gl/PHy36xZxDhSNLCwf6"]
];

$activities = [
    ["name" => "Explore Ratargul", "place" => "Ratargul", "time" => "8:00-10:00 AM", "image" => "https://upload.wikimedia.org/wikipedia/commons/f/f4/Ratargul_Swamp_Forest%2C_Sylhet_%282%29.jpg", "description" => "Experience the beauty of the only swamp forest in Bangladesh."],
    ["name" => "Visit Jaflong", "place" => "Jaflong", "time" => "11:00 AM-2:00 PM", "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDOiD3UI5bi40_D626coWyXI-y5PsDnGgFyA&s", "description" => "Enjoy the scenic views and crystal-clear river water at Jaflong."],
    ["name" => "Tea Tasting", "place" => "Srimangal", "time" => "4:00-6:00 PM", "image" => "https://cdn.shopify.com/s/files/1/0579/7597/files/tea_tasting_bruu_grande.jpg?v=1472371446", "description" => "Taste the finest teas and learn about tea processing in Srimangal."]
];

$feedbacks = [
    ["name" => "Rahim Uddin", "review" => "Sylhet is stunning! The tea gardens are a must-visit.", "rating" => 5],
    ["name" => "Farzana Akter", "review" => "The swamp forest tour was incredible. Highly recommend!", "rating" => 4.8],
    ["name" => "Habib Khan", "review" => "Wonderful experience at Lalakhal. Great hospitality.", "rating" => 5]
];

// Check if the cart is initialized
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
  }
  
  // Add to cart functionality
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart']) && isset($_SESSION['user_id'])) {
    $item = [
      'name' => $_POST['package_name'],
      'place' => $_POST['package_place'],
      'price' =>  $_POST['package_price'],
      'quantity' => $_POST['package_quantity'],
      'date'=> $_POST['package_date']
    ];
  
    // Add the item to the cart
    $_SESSION['cart'][] = $item;
    $add_message = "Item added to cart successfully.";
    echo "<script>alert('$add_message');</script>";
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sylhet Tourism</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!--Nev-->
    <?php include('../re_use/nev.php');?>
    <!--Nev-->
    <div class="container mt-5">
        <!-- Packages Section -->
        <section class="mb-5">
            <h3>Tour Packages</h3>
            <div class="row">
                <?php foreach ($packages as $package): ?>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <img width="250px" height="250px" src="<?php echo $package['image']; ?>" class="card-img-top"
                            alt="<?php echo $package['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><b><?php echo $package['name']; ?></b></h5>
                            <p class="card-text"><b>Price: </b><?php echo number_format($package['price']); ?> BDT
                            </p>
                            <p class="card-text"><b>Destination: </b><?php echo $package['place']; ?></p>
                            <form method="POST">
                                <input type="hidden" name="package_name" value="<?php echo $package['name']; ?>">
                                <input type="hidden" name="package_place" value="<?php echo $package['place']; ?>">
                                <input type="hidden" name="package_price" value="<?php echo $package['price']; ?>">
                                <input type="hidden" name="package_quantity" value="1" min="1"
                                    class="form-control mb-2">
                                <input class="btn btn-outline-success" type="date" name="package_date" value="date"
                                    required>
                                <button type="submit" name="add_to_cart" class="btn btn-outline-primary">Add
                                    to Cart</button>

                            </form>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Weather Section -->
        <?php
            $city='Sylhet';
            include('../re_use/weather.php');
        ?>
        <!-- Weather Section -->
        <!-- Events Section -->
        <section class="mb-5">
            <h3>Events</h3>
            <div class="accordion" id="eventsAccordion">
                <?php foreach ($events as $index => $event): ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="eventHeading<?php echo $index; ?>">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#eventCollapse<?php echo $index; ?>" aria-expanded="true"
                            aria-controls="eventCollapse<?php echo $index; ?>">
                            <b><?php echo $event['name']; ?></b>
                        </button>
                    </h2>
                    <div id="eventCollapse<?php echo $index; ?>" class="accordion-collapse collapse"
                        aria-labelledby="eventHeading<?php echo $index; ?>" data-bs-parent="#eventsAccordion">
                        <div class="accordion-body">
                            <img width="250px" height="250px" src="<?php echo $event['image']; ?>"
                                class="img-fluid mb-3 rounded" alt="<?php echo $event['name']; ?>">
                            <p><b>Location: </b> <?php echo $event['place']; ?></p>
                            <p><b>Type: </b> <?php echo $event['type']; ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Hotel Facilities Section -->
        <section class="mb-5">
            <h3>Hotel Facilities</h3>
            <div class="accordion" id="hotelsAccordion">
                <?php foreach ($hotels as $index => $hotel): ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="hotelHeading<?php echo $index; ?>">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#hotelCollapse<?php echo $index; ?>" aria-expanded="true"
                            aria-controls="hotelCollapse<?php echo $index; ?>">
                            <b><?php echo $hotel['name']; ?></b>

                        </button>
                    </h2>
                    <div id="hotelCollapse<?php echo $index; ?>" class="accordion-collapse collapse"
                        aria-labelledby="hotelHeading<?php echo $index; ?>" data-bs-parent="#hotelsAccordion">
                        <div class="accordion-body">
                            <img width="250px" height="250px" src="<?php echo $hotel['image']; ?>"
                                class="img-fluid mb-3 rounded" alt="<?php echo $hotel['name']; ?>">
                            <p><b>Location:</b> <?php echo $hotel['place']; ?></p>
                            <p><b>Map: </b><a href="<?php echo $hotel['map'];?>" target="_blank">Visit Now</a>
                            </p>
                            <p><b>Description:</b> <?php echo $hotel['description']; ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Daily Activities Section -->
        <section class="mb-5">
            <h3>Daily Activities</h3>
            <div class="accordion" id="activitiesAccordion">
                <?php foreach ($activities as $index => $activity): ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="activityHeading<?php echo $index; ?>">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#activityCollapse<?php echo $index; ?>" aria-expanded="true"
                            aria-controls="activityCollapse<?php echo $index; ?>">
                            <b><?php echo $activity['name']; ?></b>
                        </button>
                    </h2>
                    <div id="activityCollapse<?php echo $index; ?>" class="accordion-collapse collapse"
                        aria-labelledby="activityHeading<?php echo $index; ?>" data-bs-parent="#activitiesAccordion">
                        <div class="accordion-body">
                            <img width="250px" height="250px" src="<?php echo $activity['image']; ?>"
                                class="img-fluid mb-3 rounded" alt="<?php echo $activity['name']; ?>">
                            <p><b>Location: </b> <?php echo $activity['place']; ?></p>
                            <p><b>Time: </b> <?php echo $activity['time']; ?></p>
                            <p><b>Description:</b> <?php echo $activity['description']; ?></p>

                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <!-- Feedback and Reviews Section -->
        <section class="mb-5">
            <h3>Feedback & Reviews</h3>
            <div class="row">
                <?php foreach ($feedbacks as $feedback): ?>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $feedback['name']; ?></h5>
                            <p class="card-text">"<?php echo $feedback['review']; ?>"</p>
                            <p class="card-text">Rating: <?php echo $feedback['rating']; ?> &#9733;</p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
    </div>
    <?php include('../re_use/footer.php');?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>